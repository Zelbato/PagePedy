<?php
require_once "../DADOS/config.php";

header('Content-Type: application/json');

if (isset($_GET['delete_id'])) {
    $id_mp = $_GET['delete_id'];
    $stmt = $conexao->prepare("DELETE FROM materia_prima WHERE id_mp = ?");
    $stmt->bind_param("i", $id_mp);

    if ($stmt->execute()) {
        // sucesso
        http_response_code(200);
        echo json_encode(["status" => "success", "msg" => "Matéria-prima deletada com sucesso!"]);
    } else {
        // erro
        http_response_code(500);
        echo json_encode(["status" => "error", "msg" => "Erro ao deletar: ".$stmt->error]);
    }
    exit();
}
?>
