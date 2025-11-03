<?php
require_once "../DADOS/config.php";

header('Content-Type: application/json'); // indica que vamos retornar JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $forn_id = $_POST['forn_id'];
    $nome_mp = $_POST['nome_mp'];
    $tipo_mp = $_POST['tipo_mp'];
    $unidade = $_POST['unidade'];
    $quantidade = $_POST['quantidade'];
    $preco_unitario = $_POST['preco_unitario'];
    $data_compra = $_POST['data_compra'];

    $stmt = $conexao->prepare("INSERT INTO materia_prima (forn_id, nome_mp, unidade, tipo_mp , quantidade, preco_unitario, data_compra) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssdds", $forn_id, $nome_mp, $unidade, $tipo_mp, $quantidade, $preco_unitario, $data_compra);

    if ($stmt->execute()) {
        // sucesso
        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "msg" => "Matéria-prima cadastrada com sucesso!"
        ]);
    } else {
        // erro
        http_response_code(500);
        echo json_encode([
            "status" => "error",
            "msg" => "Erro ao cadastrar: " . $stmt->error
        ]);
    }

    exit();
}
?>