<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
        <link rel="stylesheet" href="../../CSS/cprincipal.css">
    
</head>
<body>
   <section class="back" >
    <form action="../FUNCAO/fcadastro_usuario.php" method="POST" class="formulario">
        <h2>Cadastro de Usuário</h2>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        
        <button type="submit">Cadastrar</button>
</body>
</html>
