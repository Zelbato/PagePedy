<?php
require_once "../DADOS/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
    $acesso = 1; 
    $stmt = $conexao->prepare("INSERT INTO usuario (nome, email, senha, acesso) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $nome, $email, $senhaHash, $acesso);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }   
    $stmt->close();
    $conexao->close();
}
?>  

