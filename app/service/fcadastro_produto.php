<?php
require_once "../DADOS/config.php";

$categoria_id = $_POST['categoria_id'];
$nome_prod = $_POST['nome_prod'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$data_cadastro = $_POST['data_cadastro'];

$sql_produto = "INSERT INTO produto (categoria_id, nome_prod, preco, descricao, data_cadastro)
                VALUES ('$categoria_id', '$nome_prod', '$preco', '$descricao', '$data_cadastro')";

if ($conexao->query($sql_produto) === TRUE) {
    $produto_id = $conexao->insert_id;

    if (isset($_POST['materia_prima'])) {
        foreach ($_POST['materia_prima'] as $id_mp => $checked) {
            $quantidade = $_POST['quantidade_mp'][$id_mp];
            $sql_relacao = "INSERT INTO produto_materiaprima (id_prod, id_mp, quantidade_materia)
                            VALUES ('$produto_id', '$id_mp', '$quantidade')";
            $conexao->query($sql_relacao);
        }
    }

    echo "Produto e matérias-primas cadastrados com sucesso!";
} else {
    echo "Erro: " . $conexao->error;
}
?>
