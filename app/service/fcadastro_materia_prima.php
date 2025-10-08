
<?php
require_once "../DADOS/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $forn_id = $_POST['forn_id'];
    $nome_mp = $_POST['nome_mp'];
    $unidade = $_POST['unidade'];
    $quantidade = $_POST['quantidade'];
    $preco_unitario = $_POST['preco_unitario'];
    $data_compra = $_POST['data_compra'];

    $stmt = $conexao->prepare("INSERT INTO materia_prima (forn_id, nome_mp, unidade, quantidade, preco_unitario, data_compra) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdds", $forn_id, $nome_mp, $unidade, $quantidade, $preco_unitario, $data_compra);
    
    if ($stmt->execute()) {
        echo "Matéria-prima cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar matéria-prima: " . $stmt->error;
    }   


}
   

?>