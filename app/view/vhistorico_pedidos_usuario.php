<?php require_once '../FUNCAO/fhistorico_pedidos.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Pedidos</title>
    <link rel="stylesheet" href="../../public/assets/css/historico_pedidos.css">
</head>
<body>
    <div class="historico-container">
        <h1>📜 Histórico de Pedidos</h1>

        <div class="barra-pesquisa">
            <input type="text" id="busca" placeholder="🔍 Buscar por data, status, destino...">
        </div>

        <div class="tabela-wrapper">
            <table id="tabelaPedidos">
                <thead>
                    <tr>
         
                        <th>Data</th>
                        <th>Valor Total</th>
                        <th>Status</th>
                        <th>Destino</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($res && $res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            echo "<tr>
                                    
                                    <td>{$row['data_pedido']}</td>
                                    <td>R$ " . number_format($row['valor_total'], 2, ',', '.') . "</td>
                                    <td class='status'>{$row['status_pedi']}</td>
                                    <td>{$row['destino']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='sem-pedidos'>Nenhum pedido encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../../public/assets/js/historico_pedido.js"></script>
</body>
</html>
