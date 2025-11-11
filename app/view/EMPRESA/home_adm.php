<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
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
    <title>Home da Empresa</title>
    <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/homeAdm.css">
</head>

<body>
    <!--Header & NavBar-->
    <header id="header" class="header" role="banner">
        <nav class="navbar section-content">
            <a href="home.php" class="nav-logo">
                <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
                <!-- <h2 class="txt-logo">Pedy<span class="txt-gradient">Açaí</span></h2> -->
            </a>

            <ul class="nav-menu">
                <button id="menuCloseBtn" class="fas fa-times"></button>
                <li class="nav-item">
                    <a href="home.php" class="nav-link primary">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="vcardapio.php#categorias" class="nav-link">Cardápio</a>
                </li>
                <li class="nav-item">
                    <a href="vmeus_pedidos.php" class="nav-link">Meus Pedidos</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
            </ul>
            <button id="menuOpenBtn" class="fas fa-bars"></button>
        </nav>
    </header>
    <main class="main">

        <div class="logo-text">
            <h1>Painel da Empresa</h1>
            <p>Bem-vindo(a), <?php echo $_SESSION['empresa_nome'] ?? 'Empresa'; ?>!</p>
        </div>
        </div>

        <div class="home-grid">

            <a href="pedidos_recebidos.php" class="home-block pedidos">
                <i class="fas fa-cart-shopping icon"></i>
                <h3>Pedidos Recebidos</h3>
                <p>Gerencie os pedidos ativos em tempo real.</p>
            </a>

            <a href="vhistorico_pedidos_empresa.php" class="home-block historico">
                <i class="fas fa-scroll icon"></i>
                <h3>Histórico de Pedidos</h3>
                <p>Veja pedidos antigos e seus detalhes.</p>
            </a>

            <a href="cadastro_produtos.php" class="home-block produtos">
                <i class="fas fa-boxes-stacked icon"></i>
                <h3>Produtos</h3>
                <p>Cadastre e edite seus produtos facilmente.</p>
            </a>

            <a href="relatorios_vendas.php" class="home-block relatorios">
                <i class="fas fa-chart-line icon"></i>
                <h3>Relatórios</h3>
                <p>Acompanhe suas vendas e resultados.</p>
            </a>

            <a href="config_empresa.php" class="home-block config">
                <i class="fas fa-gear icon"></i>
                <h3>Configurações</h3>
                <p>Atualize informações da sua empresa.</p>
            </a>
        </div>
    </main>

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
                    <li><a href="#">Promoções</a></li>
                    <li><a href="#">Meus Pedidos</a></li>
                </ul>
            </div>

            <div class="footer-social">
                <h3>Siga-nos</h3>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <span id="year"></span> PedyAçaí - Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>


    <script src="../../public/assets/js/script.js"></script>

</body>

</html>