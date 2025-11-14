<?php

require_once "../DADOS/config.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT id, senha, acesso FROM usuario WHERE email = ? and nome = ?");
    $stmt->bind_param("ss", $email, $nome);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $senhaHash, $acesso);
        $stmt->fetch();

        if (password_verify($senha, $senhaHash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $nome;
            $_SESSION['user_access'] = $acesso;

            if ($acesso === 2) {
                header("Location: ../view/EMPRESA/home_adm.php");
                exit();
            }else {
                header("Location: ../view/home.php");
                exit();
            }
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