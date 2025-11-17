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
    <title>Login Usuário</title>
    <link rel="icon" type="image/png" href="../../public/assets/img/logoOficialTransparentRecortada.png">
    <link rel="stylesheet" href="../../public/assets/css/login.css"><!--IMPORTANTE -->
</head>

<body>

    <section class="Login-container">
        <div class="login_usuario_info">
            <h2>Bem-vindo à Pedy<span>Açaí</span></h2>
            <img src="../../public/assets/img/pedyacai.png" alt="acai" class="img-info">
            <p>Cadastre-se e aproveite o melhor do sabor artesanal.</p>
        </div>

        <div class="Login-form">
            <form action="../FUNCAO/flogin_usuario.php" method="POST" class="Formulario_Login">
                <h2>Login de Usuário</h2>
                <label for="nome">Nome</label>
                <input type="nome" id="nome" name="nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <button type="submit">Entrar</button>
            </form>
        </div>
    </section>

</body>

</html>