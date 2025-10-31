<?php require_once '../DADOS/config.php'; ?>
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
    <title>PedyAçaí - Cardápio</title>
    <link rel="stylesheet" href="../../public/assets/css/cardapio.css">
</head>

<body>

    <?php
    function slugify(string $str): string
    {
        $s = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str);
        if ($s === false) $s = $str;
        $s = strtolower($s);
        $s = preg_replace('/[^a-z0-9]+/', '', $s);
        return trim($s);
    }

    $allowed = [
        'acai' => ['label' => 'Açaí', 'icon' => 'fa-bowl-food'],
        'sorvete' => ['label' => 'Sorvetes', 'icon' => 'fa-ice-cream'],
        'milkshake' => ['label' => 'Milkshakes', 'icon' => 'fa-mug-hot'],
        'baldes' => ['label' => 'Baldes', 'icon' => 'fa-cookie-bite'],
    ];
    ?>
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

    <main>
        <section class="banner-cardapio">
            <div class="overlay"></div>
            <!-- <div class="banner-text">
                <h1>Cardápio</h1>
                <p>Descubra o sabor perfeito: açaí, sorvetes e muito mais</p>
            </div> -->
        </section>

        <section class="monteOseu">
            <form class="form-pedido" action="../view/vfinalizar_pedido.php" method="POST">
                <h1 class="titulo-pedido">Monte seu Pedido</h1>
                <p class="descricao-pedido">Escolha a base e os acompanhamentos do seu açaí do seu jeito!</p>
                <div class="tamanhos-copo card">
                    <h2>Escolha o tamanho da base:</h2>
                    <div class="opcoes-container">
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
                </div>


                <div class="acompanhamentos card oculto" id="acompanhamentos">
                    <h2>Escolha seus acompanhamentos:</h2>
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
                <button type="submit" class="btn-finalizar">Finalizar Pedido</button>

            </form>
        </section>
    </main>

    <main>

        <section class="categorias">
            <h2>Escolha sua categoria</h2>
            <div class="btnCategoria">
                <button data-categoria="todos" class="ativo"><i class="fa-solid fa-layer-group"></i> Todos</button>
                <?php foreach ($allowed as $slug => $info): ?>
                    <button data-categoria="<?= htmlspecialchars($slug) ?>">
                        <i class="fa-solid <?= htmlspecialchars($info['icon']) ?>"></i>
                        <?= htmlspecialchars($info['label']) ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="produtos">
            <?php
            $sql = "SELECT p.id_prod, p.nome_prod, p.descricao, p.preco, p.img_prod, COALESCE(c.nome_cat, '') AS nome_cat
                FROM produto p
                LEFT JOIN categoria c ON p.categoria_id = c.id_cat
                ORDER BY c.nome_cat, p.nome_prod";
            $res = $conexao->query($sql);

            if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $categoriaNome = $row['nome_cat'] ?? '';
                    $slugCat = slugify($categoriaNome);

                    if (!array_key_exists($slugCat, $allowed)) {
                        continue;
                    }

                    $imagem = !empty($row['img_prod']) ? "../PRODUTOS/{$row['img_prod']}" : '../../public/assets/img/acai-6-teste.png';
                    $nome = htmlspecialchars($row['nome_prod']);
                    $desc = htmlspecialchars($row['descricao'] ?: 'Delicioso e feito na hora!');
                    $preco = number_format($row['preco'], 2, ',', '.');

                    echo "
                <div class='card-produto {$slugCat}'>
                    <img src='{$imagem}' alt='{$nome}'>
                    <h3>{$nome}</h3>
                    <p class='descricao'>{$desc}</p>
                    <span class='preco'>R$ {$preco}</span>

                    <!-- Botão de pedido corrigido -->
                    <form action='vfinalizar_pedido.php' method='POST'>
                        <input type='hidden' name='base_id' value='{$row['id_prod']}'>
                        <input type='hidden' name='preco_base' value='{$row['preco']}'>
                        <button type='submit' class='btn-add'>
                            <i class='fa-solid fa-cart-plus'></i> Pedir
                        </button>
                    </form>
                </div>";
                }
            } else {
                echo "<p class='sem-produtos'>Nenhum produto disponível no momento.</p>";
            }
            ?>
        </section>
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

        document.addEventListener('DOMContentLoaded', () => {
            const botoes = document.querySelectorAll('.btnCategoria button');
            const produtos = document.querySelectorAll('.card-produto');

            botoes.forEach(btn => {
                btn.addEventListener('click', () => {
                    botoes.forEach(b => b.classList.remove('ativo'));
                    btn.classList.add('ativo');
                    const categoria = btn.dataset.categoria;

                    produtos.forEach(prod => {
                        prod.style.display = (categoria === 'todos' || prod.classList.contains(categoria)) ? '' : 'none';
                    });
                });
            });
        });
    </script>

    <script src="../../public/assets/js/script.js"></script>
    <script src="../../public/assets/js/cardápio.js"></script>

</body>

</html>