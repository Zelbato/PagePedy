<?php
require_once "../../DADOS/config.php";
session_start();

$empresa_id = $_SESSION['id'] ?? 2;
$cliente_id = intval($_GET['id_cliente']);

// Envio de resposta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conteudo = trim($_POST['conteudo']);
    if (!empty($conteudo)) {
        $stmt = $conexao->prepare("INSERT INTO mensagens (remetente_id, destinatario_id, conteudo) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $empresa_id, $cliente_id, $conteudo);
        $stmt->execute();
    }
}

// Consulta correta (ambos os lados da conversa)
$sql = "SELECT m.*, u.nome AS remetente
        FROM mensagens m
        JOIN usuario u ON m.remetente_id = u.id
        WHERE (m.remetente_id = ? AND m.destinatario_id = ?)
           OR (m.remetente_id = ? AND m.destinatario_id = ?)
        ORDER BY m.data_envio ASC";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("iiii", $cliente_id, $empresa_id, $empresa_id, $cliente_id);
$stmt->execute();
$res = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Chat com Cliente</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .chat { display: flex; flex-direction: column; gap: 10px; }
        .msg { padding: 10px; border-radius: 10px; max-width: 70%; }
        .empresa { background: #d1f5d3; align-self: flex-end; text-align: right; }
        .cliente { background: #eee; align-self: flex-start; }
    </style>
</head>
<body>
<h1>💬 Conversa com Cliente</h1>

<div class="chat">
<?php while ($row = $res->fetch_assoc()): ?>
    <div class="msg <?= ($row['remetente_id'] == $empresa_id) ? 'empresa' : 'cliente' ?>">
        <strong><?= htmlspecialchars($row['remetente']) ?>:</strong><br>
        <?= htmlspecialchars($row['conteudo']) ?><br>
        <small><?= date('d/m H:i', strtotime($row['data_envio'])) ?></small>
    </div>
<?php endwhile; ?>
</div>

<form method="POST" style="margin-top:20px;">
    <textarea name="conteudo" rows="3" cols="50" required placeholder="Responder..."></textarea><br>
    <button type="submit">Enviar resposta</button>
</form>
</body>
</html>
