<?php
require_once "../DADOS/config.php";
$categoria_despesa = $_POST['categoria_despesa'];
$nome_despesa = $_POST['nome_despesa']; 
$valor_despesa = $_POST['valor_despesa'];
$data_despesa = $_POST['data_despesa'];
$descricao = $_POST['descricao'];   
$stmt = $conexao->prepare("INSERT INTO despesas (categoria_despesa, nome_despesa, valor_despesa, data_despesa, descricao) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdss", $categoria_despesa, $nome_despesa, $valor_despesa, $data_despesa, $descricao);
if ($stmt->execute()) {
    echo "✅ Despesa cadastrada com sucesso!";
} else {
    echo "❌ Erro ao cadastrar despesa: " . $stmt->error;
}
$stmt->close();
$conexao->close();
?>
