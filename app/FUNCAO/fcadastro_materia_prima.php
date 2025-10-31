
<?php
require_once "../DADOS/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $forn_id = $_POST['forn_id'];
    $nome_mp = $_POST['nome_mp'];
    $tipo_mp = $_POST['tipo_mp'];
    $unidade = $_POST['unidade'];
    $quantidade = $_POST['quantidade'];
    $preco_unitario = $_POST['preco_unitario'];
    $data_compra = $_POST['data_compra'];

    $stmt = $conexao->prepare("INSERT INTO materia_prima (forn_id, nome_mp, unidade, tipo_mp , quantidade, preco_unitario, data_compra) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssdds", $forn_id, $nome_mp, $unidade,$tipo_mp, $quantidade, $preco_unitario, $data_compra);
    
    if ($stmt->execute()) {
        header("Location: ");
    } else {
        echo "Erro ao cadastrar matéria-prima: " . $stmt->error;
    }   


}
   

?>