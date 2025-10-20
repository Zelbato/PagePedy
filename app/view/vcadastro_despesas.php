<!-- CREATE TABLE despesas (
    id_despesas INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoria_despesa ENUM('Fixa','Variável') NOT NULL,
    nome_despesa VARCHAR(50) NOT NULL,
    valor_despesa DECIMAL(10, 2) NOT NULL,
    data_despesa DATE NOT NULL,
    descricao TEXT
); -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Cadastro de Despesas</h1>
    <form action="../FUNCAO/fcadastro_despesas.php" method="POST">
     <label for="categoria_despesa">Categoria da Despesa:</label>
     <select id="categoria_despesa" name="categoria_despesa" required>
          <option value="Fixa">Fixa</option>
          <option value="Variável">Variável</option>
     </select><br>
    
     <label for="nome_despesa">Nome da Despesa:</label>
     <input type="text" id="nome_despesa" name="nome_despesa" required><br>
    
     <label for="valor_despesa">Valor da Despesa:</label>
     <input type="number" step="0.01" id="valor_despesa" name="valor_despesa" required><br>
    
     <label for="data_despesa">Data da Despesa:</label>
     <input type="date" id="data_despesa" name="data_despesa" required><br>
    
     <label for="descricao">Descrição:</label>
     <textarea id="descricao" name="descricao"></textarea><br>
    
     <button type="submit">Cadastrar Despesa</button>
    </form>

    <h1>deletar despesa</h1>
    <form action="../FUNCAO/fdelete_despesas.php" method="GET">
        <label for="delete_id">ID da Despesa a ser deletada:</label>
        <input type="text" id="delete_id" name="delete_id" required>
        <button type="submit">Deletar Despesa</button>
    </form>
    
    <h1>editar despesas</h1>
    <form action="../FUNCAO/fedite_despesas.php" method="POST">
        <label for="id_despesas">ID da Despesa a ser editada:</label>
        <input type="text" id="id_despesas" name="id_despesas" required><br>

        <label for="categoria_despesa">Categoria da Despesa:</label>
        <select id="categoria_despesa" name="categoria_despesa" required>
            <option value="Fixa">Fixa</option>
            <option value="Variável">Variável</option>
        </select><br>

        <label for="nome_despesa">Nome da Despesa:</label>
        <input type="text" id="nome_despesa" name="nome_despesa" required><br>

        <label for="valor_despesa">Valor da Despesa:</label>
        <input type="number" step="0.01" id="valor_despesa" name="valor_despesa" required><br>

        <label for="data_despesa">Data da Despesa:</label>
        <input type="date" id="data_despesa" name="data_despesa" required><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"></textarea><br>

        <button type="submit">Editar Despesa</button>
    </form>
    


    <h1>todas as despesas</h1>
   <?php require_once "../DADOS/config.php";
    $sql = "SELECT * FROM despesas";
    $res = $conexao->query($sql);
    if ($res->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Categoria</th><th>Nome</th><th>Valor</th><th>Data</th><th>Descrição</th></tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_despesas']}</td>
                    <td>{$row['categoria_despesa']}</td>
                    <td>{$row['nome_despesa']}</td>
                    <td>{$row['valor_despesa']}</td>
                    <td>{$row['data_despesa']}</td>
                    <td>{$row['descricao']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma despesa cadastrada.";
    }
    $conexao->close();

?>
</body>
</html>