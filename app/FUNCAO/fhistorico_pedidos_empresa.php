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
        WHERE p.status_pedi IN ('entregue', 'cancelado', 'a caminho', 'preparando')
        ORDER BY p.data_pedido DESC";

$res = $conexao->query($sql);

if ($res && $res->num_rows > 0) {

    echo "<table class='table table-striped tabela-historico'>
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Valor Total</th>
                    <th>Status</th>
                    <th>Destino</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $res->fetch_assoc()) {

        // Classe visual do status
        $classe = "";
        if ($row['status_pedi'] === "entregue") {
            $classe = "status-entregue";
        } elseif ($row['status_pedi'] === "cancelado") {
            $classe = "status-cancelado";
        } elseif ($row['status_pedi'] === "a caminho") {
            $classe = "status-caminho";
        } elseif ($row['status_pedi'] === "preparando") {
            $classe = "status-preparando";
        }

        // Data correta
        $dataFormatada = date('d/m/Y H:i', strtotime($row['data_pedido']));

        echo "
        <tr>
            <td>{$row['id_pedi']}</td>
            <td>" . htmlspecialchars($row['cliente']) . "</td>
            <td>{$dataFormatada}</td>
            <td>R$ " . number_format($row['valor_total'], 2, ',', '.') . "</td>
            <td><span class='$classe'>{$row['status_pedi']}</span></td>
            <td>" . htmlspecialchars($row['destino']) . "</td>
            <td>
                <button class='btn-visualizar btn btn-primary btn-sm' data-id='{$row['id_pedi']}'>
                    Visualizar Pedido
                </button>
            </td>
        </tr>";
    }

    echo "</tbody></table>";

} else {
    echo "<p>Nenhum pedido encontrado.</p>";
}
