<?php
require_once "../DADOS/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $remetente_id = intval($_POST['remetente_id']);
    $destinatario_id = intval($_POST['destinatario_id']);
    $conteudo = trim($_POST['conteudo']);

    if (!empty($conteudo)) {
        $sql = "INSERT INTO mensagens (remetente_id, destinatario_id, conteudo) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("iis", $remetente_id, $destinatario_id, $conteudo);
        $stmt->execute();

        echo "<script>alert('Mensagem enviada com sucesso!');history.back();</script>";
    } else {
        echo "<script>alert('A mensagem não pode estar vazia.');history.back();</script>";
    }
}
?>