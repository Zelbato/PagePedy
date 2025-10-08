<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../FUNCAO/fcadastro_producao.php" method="POST">
  <label>Produto:</label>
  <select name="produto_id">
    <?php
      include '../DADOS/config.php';
      $res = $conexao->query("SELECT id_prod, nome_prod FROM produto");
      while ($row = $res->fetch_assoc()) {
        echo "<option value='{$row['id_prod']}'>{$row['nome_prod']}</option>";
      }
    ?>
  </select><br>

  <label>Quantidade produzida:</label>
  <input type="number" name="quantidade_produzida" required><br>

  <label>Data da produção:</label>
  <input type="date" name="data_producao" required><br>

  <button type="submit">Registrar Produção</button>
</form>

</body>
</html>