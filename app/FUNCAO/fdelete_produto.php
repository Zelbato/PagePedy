<?php
require_once "../DADOS/config.php";

if (isset($_GET['delete_id'])){
    $id_prod = $_GET['delete_id'];
    $stmt = $conexao->prepare("DELETE FROM produto WHERE id_prod = ?");
    $stmt->bind_param("i", $id_prod);

    if ($stmt->execute()) {
        // sucesso
        http_response_code(200);
        echo json_encode(["status" => "success", "msg" => "Produto deletada com sucesso!"]);
    } else {
        // erro
        http_response_code(500);
        echo json_encode(["status" => "error", "msg" => "Erro ao deletar: " . $stmt->error]);
    }
    exit();
}

?>