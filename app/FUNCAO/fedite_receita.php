<?php
require_once '../DADOS/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_receita = $_POST['id_receita'];
    $receita_prod_id = $_POST['receita_prod_id'];
    $tipo_receita = $_POST['tipo_receita'];
    $descricao_R = $_POST['descricao_R'];
    $data_venda = $_POST['data_venda'];
    $valor_total = $_POST['valor_total'];

    
    $conexao= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Verifica conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara e vincula
    $stmt = $conexao->prepare("UPDATE receita SET receita_prod_id=?, tipo_receita=?, descricao_R=?, data_venda=?, valor_total=? WHERE id_receita=?");
    $stmt->bind_param("issssi", $receita_prod_id, $tipo_receita, $descricao_R, $data_venda, $valor_total, $id_receita);

    // Executa a declaração
    if ($stmt->execute()) {
        echo "Receita atualizada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conexao->close();
}