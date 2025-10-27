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
    <link rel="stylesheet" href="../../public/assets/css/cardapio.css">
    <title>PedyAçaí</title>
</head>

<body>
    <!--Header & NavBar-->
    <header class="header" role="banner">
        <nav class="navbar section-content">
            <a href="home.php" class="nav-logo">
                <h2 class="txt-logo">Pedy<span class="txt-gradient">Açaí</span></h2>
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
                    <a href="vpromocao.php" class="nav-link">Promoções</a>
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

        <!-- Banner -->
        <section class="banner-cardapio">
            <div class="overlay"></div>
            
<div class="overlay"></div>

<form class="form-pedido" action="../view/vfinalizar_pedido.php" method="POST">
    <h1 class="titulo-pedido">Monte seu Pedido 🍧</h1>
    <p class="descricao-pedido">Escolha a base e os acompanhamentos do seu açaí do seu jeito!</p>

    <!-- ESCOLHER BASE -->
    <div class="section">
        <h2>1️⃣ Escolha o tamanho da base:</h2>
        <?php
        require_once '../DADOS/config.php';
        $sql = "SELECT id_prod, nome_prod, preco FROM produto 
                JOIN categoria ON produto.categoria_id = categoria.id_cat 
                WHERE categoria.nome_cat = 'Base'";
        $res = $conexao->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<label class='opcao'>
                        <input type='radio' name='base_id' value='{$row['id_prod']}' required> 
                        <span><b>{$row['nome_prod']}</b> - R$ " . number_format($row['preco'], 2, ',', '.') . "</span>
                      </label>";
            }
        } else {
            echo "<p>Nenhuma base disponível.</p>";
        }
        ?>
    </div>

    <!-- ESCOLHER ACOMPANHAMENTOS -->
    <div class="section">
        <h2>2️⃣ Escolha seus acompanhamentos:</h2>
        <div class="acomp-list">
        <?php
        $sql = "SELECT id_mp, nome_mp, preco_unitario FROM materia_prima WHERE tipo_mp = 'acompanhamento'";
        $res = $conexao->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<label class='opcao'>
                        <input type='checkbox' name='acompanhamentos[{$row['id_mp']}]' value='{$row['id_mp']}'>
                        <span>{$row['nome_mp']} - R$ " . number_format($row['preco_unitario'], 2, ',', '.') . "</span>
                      </label>";
            }
        } else {
            echo "<p>Nenhum acompanhamento disponível.</p>";
        }
        ?>
        </div>
    </div>

    <button type="submit" class="btn-finalizar">➡️ Finalizar Pedido</button>
</form>



            
            <!-- <div class="banner-text">
                <h1>Cardápio</h1>
                <p>Descubra o sabor perfeito: açaí, sorvetes e muito mais</p>
            </div> -->
        </section>

        <!-- Categorias -->
        <section class="categorias">
            <h2>Escolha sua categoria</h2>
            <div class="btnCategoria">
                <button id="todos" class="ativo" data-categoria="todos"><i class="fa-solid fa-layer-group"></i> Todos</button>
                <button id="acai" data-categoria="acai"><i class="fa-solid fa-bowl-food"></i> Açaí</button>
                <button id="sovete" data-categoria="sorvete"><i class="fa-solid fa-ice-cream"></i> Sorvetes</button>
                <button id="milkshake" data-categoria="milkshake"><i class="fa-solid fa-mug-hot"></i> Milkshakes</button>
                <button id="baldes" data-categoria="complemento"><i class="fa-solid fa-cookie-bite"></i> Baldes</button>
            </div>
        </section>

        <!-- Produtos -->
        <section class="produtos">
            <div class="card-produto acai">
                <img src="../../public/assets/img/acai-6-teste.png" alt="Açaí Tradicional">
                <h3>Açaí Tradicional</h3>
                <p class="descricao">Cremoso e gelado, feito na hora!</p>
                <span class="preco">R$ 12,00</span>
                <button class="btn-add">Adicionar</button>
            </div>

            <div class="card-produto acai">
                <img src="../../public/assets/img/acai-6-teste.png" alt="Açaí com Frutas">
                <h3>Açaí com Frutas</h3>
                <p class="descricao">Banana, morango e granola.</p>
                <span class="preco">R$ 15,00</span>
                <button class="btn-add">Adicionar</button>
            </div>

            <div class="card-produto sorvete">
                <img src="../../public/assets/img/acai-6-teste.png" alt="Sorvete na Casquinha">
                <h3>Sorvete na Casquinha</h3>
                <p class="descricao">Baunilha, chocolate ou morango.</p>
                <span class="preco">R$ 5,00</span>
                <button class="btn-add">Adicionar</button>
            </div>

            <div class="card-produto sorvete">
                <img src="../../public/assets/img/acai-6-teste.png" alt="Sorvete no Copo">
                <h3>Sorvete no Copo</h3>
                <p class="descricao">Escolha até 3 sabores!</p>
                <span class="preco">R$ 8,00</span>
                <button class="btn-add">Adicionar</button>
            </div>

            <div class="card-produto milkshake">
                <img src="../../public/assets/img/acai-6-teste.png" alt="Milkshake de Chocolate">
                <h3>Milkshake de Chocolate</h3>
                <p class="descricao">Gelado, doce e delicioso.</p>
                <span class="preco">R$ 10,00</span>
                <button class="btn-add">Adicionar</button>
            </div>

            <div class="card-produto complemento">
                <img src="../../public/assets/img/acai-6-teste.png" alt="Leite Ninho">
                <h3>Leite Ninho</h3>
                <p class="descricao">O toque especial para seu açaí.</p>
                <span class="preco">R$ 4,00</span>
                <button class="btn-add">Adicionar</button>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <h2 class="txt-logo">Pedy<span class="txt-gradient">Açaí</span></h2>
                <p>Mais que sabor, uma explosão de energia em cada copo!</p>
            </div>

            <div class="footer-links">
                <h3>Links Rápidos</h3>
                <ul>
                    <li><a href="home.php">Início</a></li>
                    <li><a href="vcardapio.php">Cardápio</a></li>
                    <li><a href="vpromocao.php">Promoções</a></li>
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
        window.addEventListener("load", () => {
            const hash = window.location.hash; // pega #sorvete ou qualquer outra seção
            if (hash) {
                const section = document.querySelector(hash);
                if (section) {
                    // rolar suavemente para a seção
                    section.scrollIntoView({
                        behavior: "smooth"
                    });

                    // executa JS específico da seção
                    switch (hash) {
                        case "#sorvete":
                            initSorveteSection();
                            break;
                        case "#acai":
                            initAcaiSection();
                            break;
                            // adicione mais seções aqui
                    }
                }
            }
        });

        // Exemplo de função para a seção Sorvete
        function initSorveteSection() {
            console.log("JS da seção Sorvete executado!");
            // Coloque aqui todo o JS que precisa rodar na seção Sorvete
        }

        // Exemplo de função para a seção Açaí
        function initAcaiSection() {
            console.log("JS da seção Açaí executado!");
        }
    </script>

    <script src="../../public/assets/js/cardápio.js"></script>
    <script src="../../public/assets/js/script.js"></script>
</body>

</html>