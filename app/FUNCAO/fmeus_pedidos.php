<?php
require_once "../DADOS/config.php";
session_start();

$usuario_id = $_SESSION['id'] ?? 1; // so pra teste 

$sql = "SELECT id_pedi, data_pedido, valor_total, status_pedi, destino
        FROM pedido
        WHERE usuario_id = ?
        ORDER BY data_pedido DESC";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$res = $stmt->get_result();
?>
