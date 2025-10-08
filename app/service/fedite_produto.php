<?php  
require_once "../DADOS/config.php";
if (isset($_POST['id_prod']) && isset($_POST['nome_prod']) && isset($_POST['descricao']) && isset($_POST['preco']) && isset($_POST['qtd_estoque'])) {
    $id_prod = $_POST['id_prod'];
    $nome_prod = $_POST['nome_prod'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $qtd_estoque = $_POST['qtd_estoque'];

    $stmt = $conexao->prepare("UPDATE produto SET nome_prod = ?, descricao = ?, preco = ?, qtd_estoque = ? WHERE id_prod = ?");
    $stmt->bind_param("ssdii", $nome_prod, $descricao, $preco, $qtd_estoque, $id_prod);
    
    if ($stmt->execute()) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar produto: " . $stmt->error;
    } 
} else {
    echo "Dados incompletos para atualização.";
}



?>