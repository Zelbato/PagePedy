<?php
require_once "../DADOS/config.php";

$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade_produzida'];
$data = $_POST['data_producao'];


$sql = "INSERT INTO producao (produto_id, quantidade_produzida, data_producao)
        VALUES ('$produto_id', '$quantidade', '$data')";
$conexao->query($sql);
$id_producao = $conexao->insert_id;


$sql_mp = "SELECT id_mp, quantidade_materia FROM produto_materiaprima WHERE id_prod = '$produto_id'";
$res = $conexao->query($sql_mp);


while ($mp = $res->fetch_assoc()) {
    $quant_usada = $mp['quantidade_materia'] * $quantidade;
    $conexao->query("INSERT INTO producao_materiaprima (id_producao, id_mp, quantidade_usada)
                  VALUES ('$id_producao', '{$mp['id_mp']}', '$quant_usada')");


    $conexao->query("INSERT INTO estoque (estoque_matp_id, estoque_tipo, estoque_quantidade, estoque_status, data_saida)
                  VALUES ('{$mp['id_mp']}', 'Matéria Prima', '$quant_usada', 'Disponivel', '$data')");
}


$conexao->query("INSERT INTO estoque (estoque_produto_id, estoque_tipo, estoque_quantidade, estoque_status, data_entrada)
              VALUES ('$produto_id', 'Produto', '$quantidade', 'Disponivel', '$data')");

echo "✅ Produção registrada e estoque atualizado!";
?>
