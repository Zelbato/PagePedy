<?php require_once '../../FUNCAO/fpedidos_recebidos.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Pedidos Recebidos</title>
</head>
<body>
<h1> Pedidos Recebidos</h1>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Data</th>
    <th>Valor Total</th>
    <th>Status</th>
    <th>Destino</th>
    <th>Ações</th>
</tr>

<?php
if ($res && $res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_pedi']}</td>
                <td>" . htmlspecialchars($row['cliente']) . "</td>
                <td>{$row['data_pedido']}</td>
                <td>R$ " . number_format($row['valor_total'], 2, ',', '.') . "</td>
                <td>{$row['status_pedi']}</td>
                <td>{$row['destino']}</td>
                <td>
                    <form method='POST' style='display:inline'>
                        <input type='hidden' name='id_pedi' value='{$row['id_pedi']}'>
                        <select name='novo_status'>
                            <option value='preparando'>Preparando</option>
                            <option value='a caminho'>A caminho</option>
                            <option value='entregue'>Entregue</option>
                            <option value='cancelado'>Cancelado</option>
                        </select>
                        <button type='submit'>Atualizar</button>
                    </form>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Nenhum pedido encontrado.</td></tr>";
}
?>
</table>
</body>
</html>
