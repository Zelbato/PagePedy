<?php 
require_once "../DADOS/config.php";
if (isset($_POST['id_forn']) && isset($_POST['nome_forn']) && isset($_POST['cnpj']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['endereco'])) {
    $id_forn = $_POST['id_forn'];
    $nome_forn = $_POST['nome_forn'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    $stmt = $conexao->prepare("UPDATE fornecedor SET nome_forn = ?, cnpj = ?, telefone = ?, email = ?, endereco = ? WHERE id_forn = ?");
    $stmt->bind_param("sssssi", $nome_forn, $cnpj, $telefone, $email, $endereco, $id_forn);
    
    if ($stmt->execute()) {
        echo "Fornecedor atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar fornecedor: " . $stmt->error;
    } 
} else {
    echo "Dados incompletos para atualização.";
}


?>