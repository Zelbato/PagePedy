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
        WHERE p.status_pedi IN ('entregue', 'cancelado', 'em andamento')
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

        // Define classe pela situação:
        $classe = "";
        if ($row['status_pedi'] === "entregue") {
            $classe = "status-entregue";
        } elseif ($row['status_pedi'] === "cancelado") {
            $classe = "status-cancelado";
        }


        $dataFormatada = date('d/m/Y', strtotime($row['data_pedido']));


        echo "<tr>
        <td data-label='ID Pedido'>{$row['id_pedi']}</td>
        <td data-label='Cliente'>" . htmlspecialchars($row['cliente']) . "</td>
        <td data-label='Hora'>" . date('s/m/Y', strtotime($row['data_pedido'])) . "</td>
        <td data-label='Valor Total'>R$ " . number_format($row['valor_total'], 2, ',', '.') . "</td>
        <td data-label='Status'><span class='$classe'>{$row['status_pedi']}</span></td>
        <td data-label='Destino'>" . htmlspecialchars($row['destino']) . "</td>
      </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum pedido finalizado encontrado.</p>";
}
