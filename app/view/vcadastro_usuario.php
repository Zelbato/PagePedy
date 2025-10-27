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
    <link rel="stylesheet" href="/PAGEPEDY/public/assets/css/cadastro.css"><!--IMPORTANTE -->
    <title>Pagina Principal</title>
</head>

<body>

    <section class="cadastro-container">
        <div class="cadastro-info">
            <h2>Bem-vindo à Pedy<span>Açaí</span></h2>
            <img src="../../public/assets/img/pedyacai.png" alt="acai" class="img-info">
            <p>Cadastre-se e aproveite o melhor do sabor artesanal.</p>
        </div>

        <div class="cadastro-form">
            <form action="../FUNCAO/fcadastro_usuario.php" method="POST" class="formulario">
                <!-- <h2>Cadastro </h2> -->

                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>

                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" placeholder="Rua, número, bairro" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="exemplo@email.com" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Crie uma senha segura" required>

                <button type="submit">Cadastrar</button>

                <p class="login-text">Já tem uma conta? <a href="vlogin_usuario.php">Entrar</a></p>
            </form>
        </div>
    </section>

    <!-- <h1>editar usuario</h1>

   <form action="../FUNCAO/fedite_usuario" method ="POST"></form>
    <label for="usuario_id">ID do Usuário:</label>
    <input type="text" id="usuario_id" name="usuario_id" required>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" required>
    <button type="submit">Atualizar Usuário</button>
   </form>

   <h1>deletar usuario</h1>
    <form action="../FUNCAO/fdelete_usuario.php" method="GET">
     <label for="delete_id">ID do Usuário a ser deletado:</label>
     <input type="text" id="delete_id" name="delete_id" required>
     <button type="submit">Deletar Usuário</button>
    </form> -->




</body>

</html>