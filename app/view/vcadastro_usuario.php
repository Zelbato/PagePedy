<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PAGEPEDY/public/assets/scss/style.css"><!--IMPORTANTE -->
    <title>Pagina Principal</title>
</head>

<body>

    <section class="back">
        <form action="../FUNCAO/fcadastro_usuario.php" method="POST" class="formulario">
            <h2>Cadastro de Usuário</h2>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>

            <button type="submit">Cadastrar</button>
        </form>
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