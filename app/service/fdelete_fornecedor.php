<?php 
require_once "../DADOS/config.php";


if (isset($_GET['delete_id'])){
    $id_forn = $_GET['delete_id'];
    $stmt = $conexao->prepare("DELETE FROM fornecedor WHERE id_forn = ?");
    $stmt->bind_param("i", $id_forn);
    if ($stmt->execute()) {
        echo "Fornecedor deletado com sucesso!";
    } else {
        echo "Erro ao deletar fornecedor: " . $stmt->error;
    }
}


?>