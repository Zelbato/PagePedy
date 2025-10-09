<?php
require_once "../DADOS/config.php";


$estoque_tipo = $_POST['estoque_tipo'];
$estoque_quantidade = $_POST['estoque_quantidade'];
$data_entrada = $_POST['data_entrada'];
$data_saida = $_POST['data_saida'] ?? null; 


if ($estoque_tipo === 'Matéria Prima') {
    $estoque_matp_id = $_POST['estoque_matp_id'];

    $sql = "INSERT INTO estoque (estoque_matp_id, estoque_tipo, estoque_quantidade, data_entrada, data_saida)
            VALUES ('$estoque_matp_id', '$estoque_tipo', '$estoque_quantidade',  '$data_entrada', '$data_saida')";
} 
elseif ($estoque_tipo === 'Produto') {
    $estoque_produto_id = $_POST['estoque_produto_id'];

    $sql = "INSERT INTO estoque (estoque_produto_id, estoque_tipo, estoque_quantidade, estoque_status, data_entrada, data_saida)
            VALUES ('$estoque_produto_id', '$estoque_tipo', '$estoque_quantidade', '$estoque_status', '$data_entrada', '$data_saida')";
} 
else {
    die("Tipo de estoque inválido.");
}

if ($conexao->query($sql) === TRUE) {
    echo "<h3>✅ Registro de estoque salvo com sucesso!</h3>";
    echo "<a href='../view/vcadastro_estoque.php'>Voltar</a>";
} else {
    echo "<h3>❌ Erro ao salvar: " . $conexao->error . "</h3>";
}
?>
