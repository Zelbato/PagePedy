<?php
require_once "../DADOS/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
    $acesso = 1; 
    $stmt = $conexao->prepare("INSERT INTO usuario (nome, email, senha, endereco, acesso) VALUES (?, ?, ?, ?,?)");
    $stmt->bind_param("ssssi", $nome, $email, $senhaHash,$endereco, $acesso);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }   
    $stmt->close();
    $conexao->close();
}
?>  

