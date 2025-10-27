<?php require_once '../FUNCAO/fhistorico_pedidos.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Histórico de Pedidos</title>
</head>
<body>
<h1>📜 Histórico de Pedidos</h1>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Data</th>
    <th>Valor Total</th>
    <th>Status</th>
    <th>Destino</th>
</tr>

<?php
if ($res && $res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_pedi']}</td>
                <td>{$row['data_pedido']}</td>
                <td>R$ " . number_format($row['valor_total'], 2, ',', '.') . "</td>
                <td>{$row['status_pedi']}</td>
                <td>{$row['destino']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhum pedido finalizado ou cancelado.</td></tr>";
}
?>
</table>
</body>
</html>
