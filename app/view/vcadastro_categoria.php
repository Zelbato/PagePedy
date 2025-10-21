<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Categoria de Produtos</h1>
    <form action="../FUNCAO/fcadastro_categoria.php" method="POST">
        <label for="nome_cat">Nome da Categoria:</label>
        <input type="text" id="nome_cat" name="nome_cat" required>
        
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>
        
        <button type="submit">Adicionar Categoria</button>
    </form>

    <h1>deletar Categoria
    de Produtos
    </h1>
    <form action="../FUNCAO/fcadastro_categoria.php" method="GET">
        <label for="delete_id">ID da Categoria a ser deletada:</label>
        <select id="delete_id" name="delete_id" required>
            <?php
            require_once '../DADOS/config.php';
            $sql = "SELECT id_cat, nome_cat FROM categoria";
            $res = $conexao->query($sql);
            while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['id_cat']}'>{$row['nome_cat']} (ID: {$row['id_cat']})</option>";
            }
            ?>
        </select>
        <button type="submit">Deletar Categoria</button>
    </form>

    <table border="1"   style="margin-top:20px;"     >
        <tr>
            <th>ID</th>
            <th>Nome da Categoria</th>
            <th>Descrição</th>
        </tr>
        <?php
        require_once '../FUNCAO/fcadastro_categoria.php';
         $todas = $conexao->query("SELECT * FROM categoria");
        if ($todas->num_rows > 0) {
            while($row = $todas->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_cat'] . "</td>";
                echo "<td>" . $row['nome_cat'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhuma categoria encontrada.</td></tr>";
        }
        ?>
  </table>
</body>
</html>