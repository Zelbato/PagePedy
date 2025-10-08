<?php
require_once "../DADOS/config.php";

if (isset($_GET['delete_id'])){
    $id_prod = $_GET['delete_id'];
    $stmt = $conexao->prepare("DELETE FROM produto WHERE id_prod = ?");
    $stmt->bind_param("i", $id_prod);
    if ($stmt->execute()) {
        echo "Produto deletado com sucesso!";
    } else {
        echo "Erro ao deletar produto: " . $stmt->error;
    }
}



?>