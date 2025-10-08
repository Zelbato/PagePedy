
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>
<form action="../FUNCAO/fcadastro_produto.php" method="POST">
  <label>Nome do Produto:</label>
  <input type="text" name="nome_prod" required><br>

  <label>Categoria:</label>
  <select name="categoria_id">
    <?php
      include '../DADOS/config.php';
      $sql = "SELECT id_cat, nome_cat FROM categoria";
      $res = $conexao->query($sql);
      while ($row = $res->fetch_assoc()) {
        echo "<option value='{$row['id_cat']}'>{$row['nome_cat']}</option>";
      }
    ?>
  </select><br>

  <label>Preço:</label>
  <input type="number" step="0.01" name="preco"><br>

  <label>Descrição:</label>
  <textarea name="descricao"></textarea><br>

  <label>Data de Cadastro:</label>
  <input type="date" name="data_cadastro" required><br>

  <h3>Selecione as matérias-primas usadas:</h3>
  <?php
    $sql = "SELECT id_mp, nome_mp FROM materia_prima";
    $res = $conexao->query($sql);
    while ($row = $res->fetch_assoc()) {
      echo "<input type='checkbox' name='materia_prima[{$row['id_mp']}]' value='1'> {$row['nome_mp']} 
            Quantidade: <input type='number' step='0.01' name='quantidade_mp[{$row['id_mp']}]'><br>";
    }
  ?>

  <button type="submit">Cadastrar Produto</button>
</form>

<form action="../FUNCAO/fedite_produto.php" method="POST">
    <h2>Editar Produto</h2>
    <label for="id_prod">ID do Produto:</label>
    <input type="text" id="id_prod" name="id_prod" required>
    <label for="nome_prod">Nome do Produto:</label>
    <input type="text" id="nome_prod" name="nome_prod" required>
    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descricao" required>
    <label for="preco">Preço:</label>
    <input type="number" step="0.01" id="preco" name="preco" required>
    <label for="qtd_estoque">Quantidade em Estoque:</label>
    <input type="number" id="qtd_estoque" name="qtd_estoque" required>
    <button type="submit">Salvar Alterações</button>
    </form>

    <form action ="../FUNCAO/fdelete_produto.php" method="GET">
    <h2>Deletar Produto</h2>
    <label for="delete_id">ID do Produto a ser deletado:</label>
        <select id="delete_id" name="delete_id" required>
          <?php
      include '../DADOS/config.php';
      $sql = "SELECT id_prod, nome_prod FROM produto";
      $res = $conexao->query($sql);
      while ($row = $res->fetch_assoc()) {
        echo "<option value='{$row['id_prod']}'>{$row['nome_prod']}</option>";
      }
    ?>
        </select>
    <button type="submit">Deletar Produto</button>
    

</body>
</html>