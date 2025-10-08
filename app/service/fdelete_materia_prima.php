<?php 
require_once "../DADOS/config.php";
if (isset($_GET['delete_id'])){
    $id_mp = $_GET['delete_id'];
    $stmt = $conexao->prepare("DELETE FROM materia_prima WHERE id_mp = ?");
    $stmt->bind_param("i", $id_mp);
    if($stmt->execute()){
       echo "<script>alert('Matéria-prima deletada com sucesso!'); window.location.href='../PAGINA/materia_prima.php';</script>";   exit();
       
    } else {
        echo "<script>alert('Erro ao deletar matéria-prima: " . $stmt->error . "'); window.location.href='../PAGINA/materia_prima.php';</script>";   exit();    
    }
  

}



?>