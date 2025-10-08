<?php

require_once "../DADOS/config.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome_cat = $_POST['nome_cat'];
    $descricao = $_POST['descricao'];   
    $stmt = $conexao->prepare("INSERT INTO categoria (nome_cat, descricao) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome_cat, $descricao);
    if ($stmt->execute()) {
        $_SESSION['msg'] = 'Categoria cadastrada com sucesso!';

    } else {
        $_SESSION['msg'] = 'Erro ao cadastrar categoria: ' . $stmt->error;

    }

    $stmt->close();
   
}

if (isset($_GET['delete_id'])){
    $id_cat = $_GET['delete_id'];
    $stmt = $conexao->prepare("DELETE FROM categoria WHERE id_cat = ?");
    $stmt->bind_param("i", $id_cat);
    if($stmt->execute()){
       echo "<script>alert('Categoria deletada com sucesso!'); window.location.href='../PAGINA/categoria.php';</script>";   exit();
       
    } else {
        echo "<script>alert('Erro ao deletar categoria: " . $stmt->error . "'); window.location.href='../PAGINA/categoria.php';</script>";   exit();    
    }
}
?>
