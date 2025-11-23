<?php
require_once '../FUNCAO/fmeus_pedidos.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Ícones -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>PedyAçaí - Meus Pedidos</title>
    <link rel="icon" type="image/png" href="../../public/assets/img/logoOficialTransparentRecortada.png">
    <link rel="stylesheet" href="../../public/assets/css/meus_pedidos.css">
</head>

<body>

    <!-- Header -->
    <header id="header" class="header" role="banner">
        <nav class="navbar section-content">
            <a href="home.php" class="nav-logo">
                <img src="../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
            </a>

            <ul class="nav-menu">
                <button id="menuCloseBtn" class="fas fa-times"></button>
                <li><a href="home.php" class="nav-link primary">Início</a></li>
                <li><a href="vcardapio.php#categorias" class="nav-link">Cardápio</a></li>
                <li><a href="vmeus_pedidos.php" class="nav-link">Meus Pedidos</a></li>
                <li><a href="vhistorico_pedidos_usuario.php" class="nav-link">Histórico</a></li>
            </ul>

            <button id="menuOpenBtn" class="fas fa-bars"></button>
        </nav>
    </header>

    <!-- Conteúdo -->
    <main class="container">
        <h1>Meus Pedidos</h1>

        <?php if ($res && $res->num_rows > 0): ?>
            <div class="tabela-container">
                <table class="tabela-pedidos">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Valor Total</th>
                            <th>Status</th>
                            <th>Destino</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = $res->fetch_assoc()): ?>
                            <tr>
                                <td data-label="ID"><?= $row['id_pedi'] ?></td>
                                <td data-label="Data"><?= date('d/m/Y H:i', strtotime($row['data_pedido'])) ?></td>
                                <td data-label="Valor Total">R$ <?= number_format($row['valor_total'], 2, ',', '.') ?></td>

                                <td data-label="Status" class="status <?= strtolower(str_replace(' ', '-', $row['status_pedi'])) ?>">
                                    <?= $row['status_pedi'] ?>
                                </td>

                                <td data-label="Destino"><?= htmlspecialchars($row['destino']) ?></td>

                                <td>
                                    <button class="btn visualizar-btn" data-id="<?= $row['id_pedi'] ?>">
                                        Visualizar
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        <?php else: ?>
            <p class="sem-pedidos">Você ainda não fez nenhum pedido.</p>
        <?php endif; ?>
    </main>

    <!-- Modal -->
    <div id="modalPedido">
        <div id="modalContent">
            <span id="closeModalBtn">&times;</span>

            <h2>Detalhes do Pedido</h2>
            <div id="modalBody">Carregando...</div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
                <!-- <h2 class="txt-logo">Pedy<span class="txt-gradient">Açaí</span></h2> -->
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
                    <a href="https://www.instagram.com/pedy_acai?igsh=d25hN3lieHhreGRt"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/share/19xxsjamdX/"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://wa.me/5517997669330"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <span id="year"></span> PedyAçaí - Todos os direitos reservados.</p>
        </div>
    </footer>


    <script src="../../public/assets/js/meus_pedidos.js"></script>
    <script src="../../public/assets/js/script.js"></script>
</body>

</html>