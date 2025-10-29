<?php
require_once "../../DADOS/config.php";
session_start();
$empresa_id = $_SESSION['id'] ?? 2; // ID da empresa

// Lista de usuários que enviaram mensagens
$sql = "SELECT DISTINCT u.id, u.nome
        FROM mensagens m
        JOIN usuario u ON (m.remetente_id = u.id OR m.destinatario_id = u.id)
        WHERE u.acesso = 1
        ORDER BY u.nome ASC";
$res = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mensagens Recebidas</title>
</head>
<body>
<h1>📨 Mensagens de Clientes</h1>

<ul>
<?php while ($row = $res->fetch_assoc()): ?>
    <li>
        <a href="vmensagem_empresa_usuario.php?id_cliente=<?= $row['id'] ?>">
            Conversar com <?= htmlspecialchars($row['nome']) ?>
        </a>
    </li>
<?php endwhile; ?>
</ul>
</body>
</html>
