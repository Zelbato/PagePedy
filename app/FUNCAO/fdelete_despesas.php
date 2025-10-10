<?php
require_once "../DADOS/config.php";
if (isset($_GET['delete_id'])){
    $id_despesa = $_GET['delete_id'];
    $stmt = $conexao->prepare("DELETE FROM despesas WHERE id_despesas = ?");
    $stmt->bind_param("i", $id_despesa);
    if($stmt->execute()){
       echo "Despesa deletada com sucesso!";   exit();
       
    } else {
        echo "Erro ao deletar despesa: " . $stmt->error;   exit();    
    }
  

}   
?>