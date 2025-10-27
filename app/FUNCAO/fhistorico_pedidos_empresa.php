<?php
require_once "../../DADOS/config.php";
session_start();


$sql = "SELECT 
            p.id_pedi, 
            u.nome AS cliente,
            p.data_pedido, 
            p.valor_total, 
            p.status_pedi, 
            p.destino
        FROM pedido p
        JOIN usuario u ON p.usuario_id = u.id
        WHERE p.status_pedi IN ('entregue', 'cancelado')
        ORDER BY p.data_pedido DESC";

$res = $conexao->query($sql);


if ($res && $res->num_rows > 0) {
    echo "<table border='1' cellpadding='6'>
            <tr>
                <th>ID Pedido</th>
                <th>Cliente</th>
                <th>Data</th>
                <th>Valor Total</th>
                <th>Status</th>
                <th>Destino</th>
            </tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_pedi']}</td>
                <td>" . htmlspecialchars($row['cliente']) . "</td>
                <td>{$row['data_pedido']}</td>
                <td>R$ " . number_format($row['valor_total'], 2, ',', '.') . "</td>
                <td>{$row['status_pedi']}</td>
                <td>" . htmlspecialchars($row['destino']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum pedido finalizado encontrado.</p>";
}
?>
