<?php
require_once '../FUNCAO/fhistorico_pedidos.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PedyAçaí - Histórico</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="../../public/assets/img/logoOficialTransparentRecortada.png">
    <link rel="stylesheet" href="../../public/assets/css/historico_pedidos.css">
</head>

<body>

    <header id="header" class="header" role="banner">
        <nav class="navbar section-content">
            <a href="home.php" class="nav-logo">
                <img src="../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
            </a>

            <ul class="nav-menu">
                <button id="menuCloseBtn" class="fas fa-times"></button>

                <li><a href="home.php" class="nav-link primary">Inicio</a></li>
                <li><a href="vcardapio.php#categorias" class="nav-link">Cardápio</a></li>
                <li><a href="vmeus_pedidos.php" class="nav-link">Meus Pedidos</a></li>
                <li><a href="vhistorico_pedidos_usuario.php" class="nav-link">Histórico</a></li>
            </ul>

            <button id="menuOpenBtn" class="fas fa-bars"></button>
        </nav>
    </header>

    <main class="main">
        <section class="historicoPedido">
            <div class="historico-container">
                <h1>Histórico de Pedidos</h1>

                <div class="barra-pesquisa">
                    <input type="text" id="busca" placeholder="Buscar por data, status, destino...">
                </div>

                <div class="tabela-wrapper">
                    <table id="tabelaPedidos">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Valor Total</th>
                                <th>Status</th>
                                <th>Destino</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($res && $res->num_rows > 0) {
                                while ($row = $res->fetch_assoc()) {

                                    $classe = "";
                                    if ($row['status_pedi'] === "entregue") {
                                        $classe = "status-entregue";
                                    } elseif ($row['status_pedi'] === "cancelado") {
                                        $classe = "status-cancelado";
                                    }

                                    echo "
                                <tr>
                                    <td data-label='Data'>" . date('d/m/Y H:i', strtotime($row['data_pedido'])) . "</td>
                                    <td data-label='Valor Total'>R$ " . number_format($row['valor_total'], 2, ',', '.') . "</td>
                                    <td data-label='Status'><span class='$classe'>{$row['status_pedi']}</span></td>
                                    <td data-label='Destino'>" . htmlspecialchars($row['destino']) . "</td>
                                    <td>
                                        <button class='btn visualizarPedido' data-id='{$row['id_pedi']}'>
                                            Visualizar
                                        </button>
                                    </td>
                                </tr>
                                ";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='sem-pedidos'>Nenhum pedido encontrado.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal -->
    <div id="modalPedido">
        <div id="modalContent">
            <span id="closeModalBtn">&times;</span>

            <h2>Detalhes do Pedido</h2>
            <div id="modalBody">Carregando...</div>
        </div>
    </div>


    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
                <p>Mais que sabor, uma explosão de energia em cada copo!</p>
            </div>

            <div class="footer-links">
                <h3>Links Rápidos</h3>
                <ul>
                    <li><a href="home.php">Início</a></li>
                    <li><a href="vcardapio.php">Cardápio</a></li>
                    <li><a href="vmeus_pedidos.php">Meus Pedidos</a></li>
                    <li><a href="vhistorico_pedidos_usuario.php">Histórico</a></li>
                </ul>
            </div>

            <div class="footer-social">
                <h3>Siga-nos</h3>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <span id="year"></span> PedyAçaí - Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="../../public/assets/js/historico_pedido.js"></script>
    <script src="../../public/assets/js/script.js"></script>

</body>

</html>