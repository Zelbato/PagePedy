<?php
require_once '../../../app/DADOS/config.php';

// Consulta para pegar o admin
$stmt = $conexao->prepare("SELECT nome FROM usuario WHERE acesso = 2 LIMIT 1");
$stmt->execute();
$stmt->bind_result($nomeAdmin);
$stmt->fetch();
$stmt->close();

$nomeAdmin = 'Administrador';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet" />
    <!--Icones Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <title>PedyAçaí - Administrativo </title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logoOficialTransparentRecortada.png">
    <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/homeAdm.css" />
</head>

<body>
    <!--Header & NavBar-->
    <header id="header" class="header" role="banner">
        <nav class="navbar section-content">
            <a href="home_adm.php" class="nav-logo" style="display: flex; align-items: center; gap: 10px;">
                <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
                <!-- <span class="painel-texto">Painel Administrativo</span> -->
            </a>


            <ul class="nav-menu">
                <button id="menuCloseBtn" class="fas fa-times"></button>
                <span class="admin-nome"><span class="online"> ● </span>Painel: <?php echo $nomeAdmin; ?></span>
                <span class="divider">&#x2502;</span>
                <li class="nav-item">
                    <a href="home_adm.php" class="nav-link primary"> Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="../vlogin_usuario.php" class="nav-link logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
                </li>
                <li class="nav-item">
                    <a href="vmeus_pedidos.php" class="nav-link"></a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
                </li> -->
            </ul>
            <button id="menuOpenBtn" class="fas fa-bars"></button>
        </nav>
    </header>

    <main class="main">
        <section class="welcome">
            <h1>Painel da Empresa</h1>
            <!-- <p>Bem-vindo(a), <strong></strong>!</p> -->
        </section>

        <section class="dashboard-grid">
            <!-- ===== Blocos do Painel Administrativo ===== -->
            <a href="vcadastro_categoria.php" class="dashboard-card">
                <i class="fas fa-layer-group icon"></i>
                <h3>Cadastro de Categoria</h3>
                <p>Gerencie e edite as categorias dos produtos.</p>
            </a>

            <a href="vcadastro_fornecedor.php" class="dashboard-card">
                <i class="fas fa-truck-field icon"></i>
                <h3>Cadastro de Fornecedores</h3>
                <p>Cadastre ou atualize seus fornecedores.</p>
            </a>

            <a href="vcadastro_materia_prima.php" class="dashboard-card">
                <i class="fas fa-boxes-stacked icon"></i>
                <h3>Cadastro de Matéria-Prima</h3>
                <p>Gerencie seu estoque de insumos e ingredientes.</p>
            </a>

            <a href="vcadastro_produto.php" class="dashboard-card">
                <i class="fas fa-ice-cream icon"></i>
                <h3>Cadastro de Produto</h3>
                <p>Adicione e atualize seus produtos do cardápio.</p>
            </a>

            <a href="vpedidos_recebidos.php" class="dashboard-card">
                <i class="fas fa-receipt icon"></i>
                <h3>Pedidos Pendentes</h3>
                <p>Acompanhe pedidos em aberto em tempo real.</p>
            </a>

            <a href="vhistorico_pedidos_empresa.php" class="dashboard-card">
                <i class="fas fa-clock-rotate-left icon"></i>
                <h3>Histórico de Pedidos</h3>
                <p>Veja todos os pedidos finalizados e entregues.</p>
            </a>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
                <!-- <h2 class="txt-logo">Pedy<span class="txt-gradient">Açaí</span></h2> -->
                <p>Mais que sabor, uma explosão de energia em cada copo!</p>
            </div>

            <div class="footer-links">
                <h3>Links Rápidos</h3>
                <ul>
                    <li><a href="home_adm.php">Início</a></li>
                    <li><a href="../vlogin_usuario.php">Sair</a></li>
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


    <script src="../../../public/assets/js/script.js"></script>
    <script src="../../../public/assets/js/homeAdm.js"></script>
</body>

</html>