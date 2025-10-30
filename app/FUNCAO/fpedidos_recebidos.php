<?php
require_once "../../DADOS/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_pedi'], $_POST['novo_status'])) {
    $id_pedi = intval($_POST['id_pedi']);
    $novo_status = $_POST['novo_status'];

    $sql_update = "UPDATE pedido SET status_pedi = ? WHERE id_pedi = ?";
    $stmt = $conexao->prepare($sql_update);
    $stmt->bind_param("si", $novo_status, $id_pedi);
    $stmt->execute();

    echo "<p>Status do pedido #$id_pedi atualizado para <b>$novo_status</b>!</p>";
}

// Filtra pedidos pela data atual (sem hora)
$sql = "SELECT p.id_pedi, u.nome AS cliente, p.data_pedido, p.valor_total, p.status_pedi, p.destino
        FROM pedido p
        JOIN usuario u ON p.usuario_id = u.id
        WHERE DATE(p.data_pedido) = CURDATE()
        ORDER BY p.data_pedido DESC";

$res = $conexao->query($sql);
?>
