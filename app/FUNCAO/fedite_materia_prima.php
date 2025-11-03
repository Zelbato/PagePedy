<?php
require_once "../DADOS/config.php";

header('Content-Type: application/json');

if (isset($_POST['id_mp'], $_POST['nome_mp'], $_POST['qtd_mp'], $_POST['fornecedor_id_forn'], $_POST['unid_mp'])) {
    $id_mp = $_POST['id_mp'];
    $nome_mp = $_POST['nome_mp'];
    $quantidade = $_POST['qtd_mp'];
    $forn_id = $_POST['fornecedor_id_forn'];
    $unidade = $_POST['unid_mp'];

    $stmt = $conexao->prepare("UPDATE materia_prima SET nome_mp = ?, quantidade = ?, forn_id = ?, unidade = ? WHERE id_mp = ?");
    $stmt->bind_param("sdisi", $nome_mp, $quantidade, $forn_id, $unidade, $id_mp);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "msg" => "Matéria-prima atualizada com sucesso!"
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            "status" => "error",
            "msg" => "Erro ao atualizar matéria-prima: " . $stmt->error
        ]);
    }
} else {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "msg" => "Dados incompletos para atualização."
    ]);
}
exit();
?>
