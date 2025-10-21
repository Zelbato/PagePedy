<?php
require_once '../DADOS/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/scss/style.css"><!--IMPORTANTE -->
</head>

<body>

    <section class="Login">
        <form action="../FUNCAO/flogin_usuario.php" method="POST" class="Formulario_Login">
            <h2>Login de Usuário</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Entrar</button>
            <a href="vcadastro_usuario.php">Cadastrar</a>
        </form>
    </section>
</body>

</html>