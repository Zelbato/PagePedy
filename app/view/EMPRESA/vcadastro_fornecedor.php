<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../../FUNCAO/fcadastro_fornecedor.php" method="POST">
        <h2>Cadastro de Fornecedor</h2>
        
        <label for="nome_forn">Nome do Fornecedor:</label>
        <input type="text" id="nome_forn" name="nome_forn" required>
        
        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj">
        
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco">
        
        <button type="submit">Cadastrar Fornecedor</button>
    </form>

 

    <h2>Deletar Fornecedor</h2>
    <form action="../../FUNCAO/fdelete_fornecedor.php" method="GET">
        <label for="delete_id">ID do Fornecedor:</label>
        <input type="text" id="delete_id" name="delete_id" required>
        <button type="submit">Deletar Fornecedor</button>

        

    </form>

    <h2>Editar Fornecedor</h2>
    <form action="../../FUNCAO/fedite_fornecedor.php" method="POST">
        <label for="id_forn">ID do Fornecedor:</label>
        <input type="text" id="id_forn" name="id_forn" required>

        <label for="nome_forn">Nome do Fornecedor:</label>
        <input type="text" id="nome_forn" name="nome_forn" required>
        
        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj">
        
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco">
        
        <button type="submit">Editar Fornecedor</button>
    </form>



<?php

    require_once '../../DADOS/config.php';


    $sql = "SELECT * FROM fornecedor";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Lista de Fornecedores</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Endereço</th>
                </tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_forn"] . "</td>
                    <td>" . $row["nome_forn"] . "</td>
                    <td>" . $row["cnpj"] . "</td>
                    <td>" . $row["telefone"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["endereco"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum fornecedor encontrado.";
    }
    $conexao->close();
    ?>
</body>
</html>