<!-- CREATE TABLE receita (
    id_receita INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     tipo_receita ENUM ('Produto','outro'),
     descricao_R TEXT,
    receita_prod_id INT,
    data_venda DATE NOT NULL,
    valor_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (receita_prod_id) REFERENCES produto(id_prod)
); -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Cadastro de Receita</h1>
    <form action="../FUNCAO/fcadastro_receita.php" method="POST">
        <label for="receita_prod_id">ID do Produto:</label>
        <input type="number" id="receita_prod_id" name="receita_prod_id" required><br><br>

        <label for="tipo_receita">Tipo de Receita:</label>
        <select id="tipo_receita" name="tipo_receita" required>
            <option value="Produto">Produto</option>
            <option value="outro">Outro</option>
        </select><br><br>

        <label for="descricao_R">Descrição:</label>
        <textarea id="descricao_R" name="descricao_R" required></textarea><br><br>

        <label for="data_venda">Data da Venda:</label>
        <input type="date" id="data_venda" name="data_venda" required><br><br>

        <label for="valor_total">Valor Total:</label>
        <input type="text" id="valor_total" name="valor_total" required><br><br>

        <input type="submit" value="Cadastrar Receita">
    </form> 
    <br>
    <h1>editar receitas </h1>
    <form action="../FUNCAO/fedite_receita.php" method="POST">
        <label for="id_receita">ID da Receita:</label>
        <input type="number" id="id_receita" name="id_receita" required><br><br>

        <label for="receita_prod_id">ID do Produto:</label>
        <input type="number" id="receita_prod_id" name="receita_prod_id" required><br><br>

        <label for="tipo_receita">Tipo de Receita:</label>
        <select id="tipo_receita" name="tipo_receita" required>
            <option value="Produto">Produto</option>
            <option value="outro">Outro</option>
        </select><br><br>

        <label for="descricao_R">Descrição:</label>
        <textarea id="descricao_R" name="descricao_R" required></textarea><br><br>

        <label for="data_venda">Data da Venda:</label>
        <input type="date" id="data_venda" name="data_venda" required><br><br>

        <label for="valor_total">Valor Total:</label>
        <input type="text" id="valor_total" name="valor_total" required><br><br>

        <input type="submit" value="Editar Receita">    
    </form>
    <br>
    <h1>Deletar Receita</h1>

    <form action="../FUNCAO/fdelete_receita.php" method="GET">
        <label for="id_receita">ID da Receita:</label>
        <input type="number" id="id_receita" name="id_receita" required><br><br>
        <input type="submit" value="Deletar Receita">
    </form>
    

</body>
</html>