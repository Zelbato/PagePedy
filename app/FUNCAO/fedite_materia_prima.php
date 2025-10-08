<?php
require_once "../DADOS/config.php";

if (isset($_POST['id_mp']) && isset($_POST['nome_mp']) && isset($_POST['qtd_mp']) && isset($_POST['fornecedor_id_forn'])) {
    $id_mp = $_POST['id_mp'];
    $nome_mp = $_POST['nome_mp'];
    $unidade = $_POST['unid_mp'];
    
    $quantidade = $_POST['qtd_mp'];
    $forn_id = $_POST['fornecedor_id_forn'];

    $stmt = $conexao->prepare("UPDATE materia_prima SET nome_mp = ?, quantidade = ?, forn_id = ?, unidade = ? WHERE id_mp = ?");
    $stmt->bind_param("sdisi", $nome_mp, $quantidade, $forn_id, $id_mp);
    
    if ($stmt->execute()) {
        echo "Matéria-prima atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar matéria-prima: " . $stmt->error;
    } 
} else {
    echo "Dados incompletos para atualização.";
}
?>