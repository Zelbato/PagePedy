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

    <link rel="stylesheet" href="../../public/assets/css/home.css">
    <title>PedyAçaí</title>
</head>

<body>
    <!--Header & NavBar-->
    <header class="header" role="banner">
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
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link">Cardápio<i class="fa-solid fa-chevron-down"></i> </a>

                    <ul class="dropdown-menu">
                        <li class="nav-ms-link"><a href="vcardapio.php#acai" class="nav-link">Açaí</a></li>
                        <li class="nav-ms-link"><a href="vcardapio.php#sorvete" class="nav-link">Sorvetes</a></li>
                        <li class="nav-ms-link"><a href="vcardapio.php#milkshake" class="nav-link">Milk-shake</a></li>
                        <li class="nav-ms-link"><a href="vcardapio.php#balde" class="nav-link">Baldes</a></li>
                        <!-- <li class="nav-ms-link"><a href="#" class="nav-link">Balde de Sorvete</a></li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Promoções</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Meus Pedidos</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
            </ul>
            <button id="menuOpenBtn" class="fas fa-bars"></button>
        </nav>

    </header>

    <main class="main">
        <section class="hero-section">
            <div class="section-content">
                <div class="hero-details">
                    <h2 class="title">Pedy<span>Açaí</span> </h2>
                    <h3 class="subTitle">Mais que sabor, uma explosão de energia em cada copo</h3>
                    <p>Experimente agora e descubra por que todo mundo ama o nosso açaí!</p>
                    <div class="btn">
                        <a href="vcardapio.php" class="btnCadapio order-now">Monte seu Açaí</a>
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
                            <a href="vcardapio.php#acai">
                                <img src="../../public/assets/img/açai-5.png" alt="imagem de açaí" class="card-image">
                                <div class="card-effect">
                                    <h3 class="card-text">Açaí</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="cards">
                            <a href="vcardapio.php#sorvete">
                                <img src="../../public/assets/img/sorvete-1.png" alt="imagem de açaí" class="card-image">
                                <div class="card-effect">
                                    <h3 class="card-text">Sorvetes</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="cards">
                            <a href="vcardapio.php#milkshake">
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Adipisci doloribus, esse laboriosam perferendis molestias
                            consequatur sed hic ex reprehenderit saepe voluptate? Fuga,
                            in quasi. Provident neque harum necessitatibus deserunt repudiandae!
                        </p>
                        <div class="image-sobre">
                            <img src="../../public/assets/img/hrdeacai.png" alt="imagem sobre a empresa" class="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="avaliation-section">
            <div class="avaliation-content">
                <div class="title-avaliation">
                    <h2 class="text-avaliation">Avaliações</h2>
                </div>

                <div class="avaliation-cards" id="avaliationCards">
                    <div class="card" id="card">
                        <img src="#" alt="imagem de avaliações" class="image-avalion">
                       
                    </div>
                </div>
            </div>
        </section> -->
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