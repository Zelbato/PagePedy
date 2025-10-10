// deletar receita,  get
<?php
require_once '../DADOS/config.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_receita = $_GET['id_receita'];

  
    $conexao= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    $stmt = $conexao->prepare("DELETE FROM receita WHERE id_receita = ?");
    $stmt->bind_param("i", $id_receita);


    if ($stmt->execute()) {
        echo "Receita deletada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

   
    $stmt->close();
    $conexao->close();
}   





?>