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
    <link rel="icon" type="image/png" href="../../public/assets/img/logoOficialTransparentRecortada.png">
    <link rel="stylesheet" href="../../public/assets/css/home.css">
    <title>PedyAçaí</title>
</head>

<body>
    <!--Header & NavBar-->
    <header id="header" class="header" role="banner">
        <nav class="navbar section-content">
            <a href="home.php" class="nav-logo">
                <img src="../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
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
                    <a href="vhistorico_pedidos_usuario.php" class="nav-link">Histórico</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>-->
            </ul>
                <button id="menuOpenBtn" class="fas fa-bars"></button>
        </nav>
    </header>

    <main class="main">
        <section class="hero-section">
            <div class="section-content">
                <div class="hero-details">
                    <h2 class="title">Pedy<span>Açaí</span> </h2>
                    <h3 class="subTitle">O sabor que recarrega o seu dia!</h3>
                    <p>Açaí cremoso, irresistível e feito na medida certa pra quem ama energia e prazer em cada colher.
                        <span class="subTitle-negrito"> Monte o seu e descubra o porquê do nosso sucesso!</span>
                    </p>
                    <p></p>
                    <div class="btn">
                        <a href="vcardapio.php#monteOseu" class="btnCadapio order-now">Monte seu Açaí</a>
                    </div><!--Btn-->
                </div><!--Hero-details-->

                <div class="hero-img-wrapper">
                    <img src="../../public/assets/img/acai-6.png" alt="imagem de açai" class="hero-img">
                </div>
            </div><!--Section-Content-->
        </section><!--Section-->

        <section class="products-section">
            <div class="section-types">
                <div class="title-product">
                    <h2 class="title">Nossos Produtos</h2>
                </div>
                <div class="product-content">
                    <div class="card-product">
                        <div class="cards">
                            <a href="vcardapio.php#categorias">
                                <img src="../../public/assets/img/açai-5.png" alt="imagem de açaí" class="card-image">
                                <div class="card-effect">
                                    <h3 class="card-text">Açaí</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="cards">
                            <a href="vcardapio.php#categorias">
                                <img src="../../public/assets/img/sorvete-1.png" alt="imagem de açaí" class="card-image">
                                <div class="card-effect">
                                    <h3 class="card-text">Sorvetes</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="cards">
                            <a href="vcardapio.php#categorias">
                                <img src="../../public/assets/img/download__1_-removebg-preview.png" alt="imagem de açaí" class="card-image">
                                <div class="card-effect">
                                    <h3 class="card-text">Milk-Shake</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sobre-section">
            <div class="sobre-content">
                <div class="title-sobre">
                    <h2 class="title">Sobre a Empresa</h2>
                </div>

                <div class="sobre-default">
                    <div class="sobre-text">
                        <p class="txt-sobre">
                            A PedyAçaí nasceu com o propósito de oferecer o verdadeiro
                            sabor do açaí, combinando qualidade, frescor e dedicação
                            em cada detalhe. Nosso compromisso é proporcionar uma experiência única,
                            feita com ingredientes selecionados e preparo cuidadoso, para garantir
                            o equilíbrio perfeito entre sabor e energia.
                            Aqui, cada copo representa o nosso amor pelo que fazemos e o desejo de
                            entregar sempre o melhor aos nossos clientes.
                            <span class="txt-finaly">PedyAçaí — qualidade e sabor em cada momento.</span>
                        </p>
                        <!-- <div class="image-sobre">
                            <img src="../../public/assets/img/pedyacai.png" alt="imagem sobre a empresa" class="image">
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
    </main><!--Main-->

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
        <small class="creditos">
            Desenvolvido por Calebe | Heitor & João Pedro © 2025
        </small>
    </footer>

    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>


    <script src="../../public/assets/js/script.js"></script>
</body>

</html>