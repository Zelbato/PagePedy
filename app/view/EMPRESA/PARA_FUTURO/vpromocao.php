<!-- cardapio , referenciando os produtos cadastrados -->
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
        <link rel="stylesheet" href="../../public/assets/css/promocao.css">
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
    <h1>Cardápio</h1>
    <div class="cardapio">
        <?php
        require_once '../DADOS/config.php';

        $sql = "SELECT id_prod,img_prod, nome_prod, descricao, preco FROM produto";

        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='produto'>";
                echo "<h2>" . htmlspecialchars($row['nome_prod']) . "</h2>";
                if (!empty($row['img_prod'])) {
                    echo "<img src='" . htmlspecialchars($row['img_prod']) . "' alt='" . htmlspecialchars($row['nome_prod']) . "' style='max-width:100px;'><br>";
                } else {
                    echo "<img src='../DADOS/PRODUTOS/DEFAULT.png' alt='Imagem padrão' style='max-width:100px;'><br>";
                }
                echo "<p>Preço: R$ " . number_format($row['preco'], 2, ',', '.') . "</p>";
                echo "<p>" . htmlspecialchars($row['descricao']) . "</p>";

                echo "</div>";
            }
        } else {
            echo "Nenhum produto encontrado.";
        }
        $conexao->close();
        ?>
    </div>


</body>

</html>