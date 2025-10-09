<?php 
require_once "../DADOS/config.php";
if (isset($_GET['delete_id'])){
    $id_estoque = $_GET['delete_id'];
    $stmt = $conexao->prepare("DELETE FROM estoque WHERE id_estoque = ?");
    $stmt->bind_param("i", $id_estoque);
    if($stmt->execute()){
       echo "Estoque deletado com sucesso!";   exit();
       
    } else {
        echo "Erro ao deletar estoque: " . $stmt->error;   exit();    
    }
  

}
?>