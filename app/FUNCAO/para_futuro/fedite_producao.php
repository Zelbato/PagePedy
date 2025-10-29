
<?php
require_once "../DADOS/config.php";

$producao_id = $_POST['producao_id'];
$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade_produzida'];
$data = $_POST['data_producao'];
$sql = "UPDATE producao SET produto_id='$produto_id', quantidade_produzida='$quantidade', data_producao='$data' WHERE id_producao='$producao_id'";
$conexao->query($sql);
$conexao->query("DELETE FROM producao_materiaprima WHERE id_producao='$producao_id'");
$conexao->query("DELETE FROM estoque WHERE estoque_tipo='Matéria Prima' AND estoque_quantidade IN (SELECT quantidade_usada FROM producao_materiaprima WHERE id_producao='$producao_id')");
$conexao->query("DELETE FROM estoque WHERE estoque_tipo='Produto' AND estoque_quantidade IN (SELECT quantidade_produzida FROM producao WHERE id_producao='$producao_id')");     
$sql_mp = "SELECT id_mp, quantidade_materia FROM produto_materiaprima WHERE id_prod = '$produto_id'";
$res = $conexao->query($sql_mp);
while ($mp = $res->fetch_assoc()) {
    $quant_usada = $mp['quantidade_materia'] * $quantidade;
    $conexao->query("INSERT INTO producao_materiaprima (id_producao, id_mp, quantidade_usada)
                  VALUES ('$producao_id', '{$mp['id_mp']}', '$quant_usada')");
    $conexao->query("INSERT INTO estoque (estoque_matp_id, estoque_tipo, estoque_quantidade,  data_saida)
                  VALUES ('{$mp['id_mp']}', 'Matéria Prima', '$quant_usada', '$data')");
}
$conexao->query("INSERT INTO estoque (estoque_produto_id, estoque_tipo, estoque_quantidade, data_entrada)
              VALUES ('$produto_id', 'Produto', '$quantidade', '$data')");
echo "✅ Produção editada e estoque atualizado!";
?>