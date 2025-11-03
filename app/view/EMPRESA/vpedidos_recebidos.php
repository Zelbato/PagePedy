<?php require_once '../../FUNCAO/fpedidos_recebidos.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!--Icones Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--Icones Bootstrap-->

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Google Fonts-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Bootstrap-->

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <!--Font Awesome-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Pedidos Recebidos</title>
    <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/pedidos_recebidos.css">
</head>

<body>
    <h1> Pedidos Recebidos</h1>

    <table border="1" cellpadding="5">
        <tr>
            <th>Numero do pedido</th>
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