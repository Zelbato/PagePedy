<?php require_once '../FUNCAO/fmeus_pedidos.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Meus Pedidos</title>
</head>
<body>
<h1>🧾 Meus Pedidos</h1>

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
    echo "<tr><td colspan='5'>Você ainda não fez nenhum pedido.</td></tr>";
}
?>
</table>
</body>
</html>
