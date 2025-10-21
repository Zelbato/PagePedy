<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>cadastro produção</h1>
    <form action="../FUNCAO/fcadastro_producao.php" method="POST">
  <label>Produto:</label>
  <select name="produto_id">
    <?php
      require_once '../DADOS/config.php';
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


<h1>deletar produção</h1>
<form action="../FUNCAO/fdelete_producao.php" method="POST">
  <label>ID da Produção:</label>
  <input type="number" name="producao_id" required><br>
  <button type="submit">Deletar Produção</button>
</form>


<h1>editar produção</h1>

<form action="../FUNCAO/fedite_producao.php" method="POST">
  <label>ID da Produção:</label>
  <input type="number" name="producao_id" required><br>

  <label>Produto:</label>
  <select name="produto_id">
    <?php
      require_once '../DADOS/config.php';
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

  <button type="submit">Editar Produção</button>  
</form>

<h1>toda produção</h1>


<?php
require_once '../DADOS/config.php';
$res = $conexao->query("SELECT p.id_producao, pr.nome_prod, p.quantidade_produzida, p.data_producao
                        FROM producao p
                        JOIN produto pr ON p.produto_id = pr.id_prod");
while ($row = $res->fetch_assoc()) {
  echo "<table border='2' style='border-collapse: collapse;' width='50%'>";  
   echo "<tr>
                <th>ID Produção</th>
                <th>Produto</th>
                <th>Quantidade Produzida</th>
                <th>Data da Produção</th>
              </tr>";
   echo "<tr style='text-align: center;'>
                <td>{$row['id_producao']}</td>
                <td>{$row['nome_prod']}</td>
                <td>{$row['quantidade_produzida']}</td>
                <td>{$row['data_producao']}</td>
              </tr>";
echo "</table><br>";
}
?>
</body>
</html>