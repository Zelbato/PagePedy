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

    <link rel="stylesheet" href="../../public/assets/css/home.css">
    <title>PedyAçaí</title>
</head>

<body>

    <header class="header" role="banner">

        <div class="menu-mobile">
            <label for="chk1" onclick="menu()">
                <i class="fa-solid fa-bars"></i>
            </label>
        </div>

        <input type="checkbox" name="" id="chk1">

        <div class="logo">
            <h1><a href="home.php" data-message="PedyAçaí">Pedy <span class="gradient">Açaí</span></a></h1>
        </div>

        <ul>
            <li><a id="#home inicio" href="home.php" data-message="Opção de voltar para a pagina inicial">Inicio</a></li>
            <li><a id="#pedidos meupedido" href="#" data-message="Opção de meus pedidos">Meus Pedidos</a></li>
            <li><a id="#vocacional destaque" href="#" data-message=""><span class="teste">Cardápio</span></a></li>
            <li><a id="promo promocao" href="#" data-message="Botão para entrar no catalogo de promoções"><span>Promoção</span></a></li>
            <div class="icons">
                <li><a id="car carrinho" href="#" data-message="meu carrinho de compras"><span><i class="fa-solid fa-cart-shopping"></i></span></a></li>
                <li><a id="notf notificacao" href="#" data-message="minhas notificações"><span><i class="fa-solid fa-bell"></i></span></a></li>
            </div>

        </ul>
    </header>

    <main class="main">
        <section class="inicio">
            <div class="container">

                <a href="#" class="btnCardapio">Cardapio</a>
            </div>
        </section>
    </main>

</body>

</html>


<!-- crie um header com as seguintes informações
o menu deve  ter a opcao de logo com imagem, links para inicio, cardapio, meus pedidos, promoçoes, carrinho, contato/suporte, e um pra notificações -->