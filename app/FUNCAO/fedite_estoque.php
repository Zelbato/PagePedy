//editar itens de estoque , editar
<?php
require_once "../DADOS/config.php";
if (isset($_POST['id_estoque']) && isset($_POST['estoque_tipo']) && isset($_POST['estoque_quantidade']) && isset($_POST['estoque_status']) && isset($_POST['data_entrada'])) {
    $id_estoque = $_POST['id_estoque'];
    $estoque_tipo = $_POST['estoque_tipo'];
    $estoque_quantidade = $_POST['estoque_quantidade'];
    $estoque_status = $_POST['estoque_status'];
    $data_entrada = $_POST['data_entrada'];
    $data_saida = isset($_POST['data_saida']) ? $_POST['data_saida'] : null;

    if ($estoque_tipo === "Matéria Prima" && isset($_POST['estoque_matp_id'])) {
        $estoque_matp_id = $_POST['estoque_matp_id'];
        $stmt = $conexao->prepare("UPDATE estoque SET estoque_tipo = ?, estoque_matp_id = ?, estoque_produto_id = NULL, estoque_quantidade = ?, estoque_status = ?, data_entrada = ?, data_saida = ? WHERE id_estoque = ?");
        $stmt->bind_param("sisissi", $estoque_tipo, $estoque_matp_id, $estoque_quantidade, $estoque_status, $data_entrada, $data_saida, $id_estoque);
    } elseif ($estoque_tipo === "Produto" && isset($_POST['estoque_produto_id'])) {
        $estoque_produto_id = $_POST['estoque_produto_id'];
        $stmt = $conexao->prepare("UPDATE estoque SET estoque_tipo = ?, estoque_matp_id = NULL, estoque_produto_id = ?, estoque_quantidade = ?, estoque_status = ?, data_entrada = ?, data_saida = ? WHERE id_estoque = ?");
        $stmt->bind_param("siisisi", $estoque_tipo, $estoque_produto_id, $estoque_quantidade, $estoque_status, $data_entrada, $data_saida, $id_estoque);
    } else {
        echo "Dados incompletos para atualização.";
        exit();
    }

    if ($stmt->execute()) {
        echo "Estoque atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar estoque: " . $stmt->error;
    } 
} else {
    echo "Dados incompletos para atualização.";
}       


?>