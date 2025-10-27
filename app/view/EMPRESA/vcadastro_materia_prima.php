<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../../FUNCAO/fcadastro_materia_prima.php" method="POST">
  <label>Nome da Matéria-prima:</label>
  <input type="text" name="nome_mp" required><br>

   <label>Tipo da Matéria-prima:</label>
  <select name="tipo_mp" required>
    <option value="producao">Produção</option>
    <option value="acompanhamento">Acompanhamento</option>
  </select><br>

  <label>Fornecedor:</label>
  <select name="forn_id" required>
    <?php
      require_once '../../DADOS/config.php';
      $sql = "SELECT id_forn, nome_forn FROM fornecedor";
      $res = $conexao->query($sql);
      while ($row = $res->fetch_assoc()) {
        echo "<option value='{$row['id_forn']}'>{$row['nome_forn']}</option>";
      }
    ?> 
  </select><br>

  <label>Unidade:</label>
  <select name="unidade">
    <option value="quilograma">Quilograma</option>
    <option value="gramas">Gramas</option>
    <option value="litros">Litros</option>
    <option value="mililitros">Mililitros</option>
    <option value="metros">Metros</option>
    <option value="centimetros">Centímetros</option>
    <option value="tempo">Tempo</option>
    <option value="unidade">Unidade</option>
  </select><br>

  <label>Quantidade:</label>
  <input type="number" step="0.01" name="quantidade"><br>

  <label>Preço Unitário:</label>
  <input type="number" step="0.01" name="preco_unitario"><br>

  <label>Data da Compra:</label>
  <input type="date" name="data_compra" required><br>

  <button type="submit">Salvar</button>
</form>

<form action="../../FUNCAO/fedite_materia_prima.php" method="POST">
    <h2>Editar Matéria-prima</h2>
    <label for="id_mp">ID da Matéria-prima:</label>
    <input type="text" id="id_mp" name="id_mp" required>
    <label for="nome_mp">Nome da Matéria-prima:</label>
    <input type="text" id="nome_mp" name="nome_mp" required>
    <label for="tipo_mp">Tipo da Matéria-prima:</label>
    <input type="text" id="tipo_mp" name="tipo_mp" required>
    <label for="unid_mp">Unidade:</label>
    <input type="text" id="unid_mp" name="unid_mp" required>
    <label for="qtd_mp">Quantidade:</label>
    <input type="number" id="qtd_mp" name="qtd_mp" required>
    <label for="fornecedor_id_forn">ID do Fornecedor:</label> 
    <input type="text" id="fornecedor_id_forn" name="fornecedor_id_forn" required>
    <button type="submit">Editar Matéria-prima</button>
</form>


    <h2>Deletar Matéria-prima</h2>

<form action="../../FUNCAO/fdelete_materia_prima.php" method="GET">
        <label for="delete_id">ID da Matéria-prima a ser deletada:</label>
        <select id="delete_id" name="delete_id" required>
            <?php
            require_once '../../DADOS/config.php';
            $sql = "SELECT id_mp, nome_mp FROM materia_prima";
            $res = $conexao->query($sql);
            while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['id_mp']}'>{$row['nome_mp']} (ID: {$row['id_mp']})</option>";
            }
            ?>
        </select>
        <button type="submit">Deletar Matéria-prima</button>
    </form>


<h1>todas as matérias primas</h1>
<table border="1">
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Fornecedor</th>
    <th>Tipo</th>
    <th>Unidade</th>
    <th>Quantidade</th>
    <th>Preço Unitário</th>
    <th>Data da Compra</th>
  </tr>
  <?php
    require_once '../../DADOS/config.php';
    $sql = "SELECT * FROM materia_prima";
    $res = $conexao->query($sql);
    if ($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
        echo "<tr>"; echo "<td>" . $row['id_mp'] . "</td>";
        echo "<td>" . $row['nome_mp'] . "</td>";
        echo "<td>" . $row['forn_id'] . "</td>";
        echo "<td>" . $row['tipo_mp'] . "</td>";
        echo "<td>" . $row['unidade'] . "</td>";
        echo "<td>" . $row['quantidade'] . "</td>";
        echo "<td>" . $row['preco_unitario'] . "</td>"; echo "<td>" . $row['data_compra'] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='8'>Nenhuma matéria-prima cadastrada</td></tr>";
    }
    $conexao->close();
  ?>
</table>



</body>
</html>
