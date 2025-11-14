<?php
require_once '../../../app/DADOS/config.php';

// Consulta para pegar o admin
$stmt = $conexao->prepare("SELECT nome FROM usuario WHERE acesso = 2 LIMIT 1");
$stmt->execute();
$stmt->bind_result($nomeAdmin);
$stmt->fetch();
$stmt->close();

// Fallback caso não encontre
$nomeAdmin = 'Administrador';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PedyAçaí - Histórico Empresa</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="../../../public/assets/img/logoOficialTransparentRecortada.png">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/historicoPedidos_empresa.css">
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

    <!-- Conteúdo Principal -->
    <main class="historico-container">
        <section class="section-historico">
            <h1>Histórico de Pedidos - Empresa</h1>

            <div class="pedidos-container">
                <?php include "../../FUNCAO/fhistorico_pedidos_empresa.php"; ?>
            </div>

            <a href="home_adm.php" class="voltar">
                <i class="fa-solid fa-left-long"></i>
                Voltar
            </a>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content container">
            <section class="footer-logo">
                <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
                <p>Mais que sabor, uma explosão de energia em cada copo!</p>
            </section>

            <section class="footer-links">
                <h3>Links Rápidos</h3>
                <ul>
                    <li><a href="home_adm.php">Início</a></li>
                    <li><a href="../vlogin_usuario.php">Sair</a></li>
                </ul>
            </section>

            <section class="footer-social">
                <h3>Siga-nos</h3>
                <div class="social-icons">
                    <a href="https://www.instagram.com/pedy_acai?igsh=d25hN3lieHhreGRt"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/share/19xxsjamdX/"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://wa.me/5517997669330"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </section>
        </div>

        <div class="footer-bottom">
            <p>&copy; <span id="year"></span> PedyAçaí - Todos os direitos reservados.</p>
        </div>

        <small class="creditos">
            Desenvolvido por Calebe | Heitor & João Pedro © 2025
        </small>

    </footer>

    <!-- Scripts -->
    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>

    <script src="../../../public/assets/js/script.js"></script>
    <script src="../../../public/assets/js/homeAdm.js"></script>
    <script src="../../public/assets/js/historico_pedido.js"></script>
</body>

</html>