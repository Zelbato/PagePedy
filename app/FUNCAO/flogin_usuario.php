<?php

require_once "../DADOS/config.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT id, nome, senha, acesso FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nome, $senhaHash, $acesso);
        $stmt->fetch();

        if (password_verify($senha, $senhaHash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $nome;
            $_SESSION['user_access'] = $acesso;

            echo "Login bem-sucedido! Bem-vindo, " . htmlspecialchars($nome) . ".";
                  header("Location: ../view/home.php");
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
    $conexao->close();
}
?>