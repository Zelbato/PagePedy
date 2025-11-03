<?php  
require_once "../DADOS/config.php";
if (isset($_POST['id_prod']) && isset($_POST['nome_prod']) && isset($_POST['descricao']) && isset($_POST['preco']) && isset($_POST['qtd_estoque'])) {
    $id_prod = $_POST['id_prod'];
    $img_prod = $_POST['img_prod'];
    $nome_prod = $_POST['nome_prod'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $qtd_estoque = $_POST['qtd_estoque'];

    $stmt = $conexao->prepare("UPDATE produto SET img_prod = ?, nome_prod = ?, descricao = ?, preco = ?, qtd_estoque = ? WHERE id_prod = ?");
    $stmt->bind_param("sssdii",  $img_prod ,$nome_prod, $descricao, $preco, $qtd_estoque, $id_prod);
    
    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode([
            "status" => "success",
            "msg" => "Produto atualizada com sucesso!"
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            "status" => "error",
            "msg" => "Erro ao atualizar produto: " . $stmt->error
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