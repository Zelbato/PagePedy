<?php
require_once "../DADOS/config.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}


$img_nome = $_FILES['img_prod']['name'];
$img_tmp = $_FILES['img_prod']['tmp_name'];
$caminho = "../DADOS/PRODUTOS/" . basename($img_nome);
$semfto = "../DADOS/PRODUTOS/" . 'DEFAULT.png';

if (move_uploaded_file($img_tmp, $caminho)) {
    $img_prod = $caminho;
} else {
    $img_prod = $semfto;
}

$categoria_id = $_POST['categoria_id'];
$nome_prod = $_POST['nome_prod'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$data_cadastro = $_POST['data_cadastro'];


$stmt = $conexao->prepare("INSERT INTO produto (img_prod, categoria_id, nome_prod, preco, descricao, data_cadastro)
                           VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisdss", $img_prod, $categoria_id, $nome_prod, $preco, $descricao, $data_cadastro);

if ($stmt->execute()) {
    $produto_id = $stmt->insert_id;


    if (isset($_POST['materia_prima'])) {
        $stmt_mp = $conexao->prepare("INSERT INTO produto_materiaprima (id_prod, id_mp, quantidade_materia)
                                      VALUES (?, ?, ?)");
        foreach ($_POST['materia_prima'] as $id_mp => $checked) {
            $quantidade = $_POST['quantidade_mp'][$id_mp];
            $stmt_mp->bind_param("iid", $produto_id, $id_mp, $quantidade);
            $stmt_mp->execute();
        }
    }

    echo "✅ Produto e matérias-primas cadastrados com sucesso!";
} else {
    echo "❌ Erro ao cadastrar produto: " . $stmt->error;
}
?>
