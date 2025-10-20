<?php
require_once "../DADOS/config.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
}

$tipo_receita = $_POST['tipo_receita'];
$descricao_R  = $_POST['descricao_R'];
$data_venda   = $_POST['data_venda'];
$valor_total  = $_POST['valor_total'];

$stmt = $conexao->prepare("
    INSERT INTO receita (tipo_receita, descricao_R, data_venda, valor_total)
    VALUES (?, ?, ?, ?)
");
$stmt->bind_param("sssd", $tipo_receita, $descricao_R, $data_venda, $valor_total);

if ($stmt->execute()) {
    $receita_id = $conexao->insert_id;

    if ($tipo_receita === 'Produto' && isset($_POST['id_prod'])) {

        $id_produtos = $_POST['id_prod'];
        $quantidades = $_POST['quantidade'];
        $precos      = $_POST['preco_venda'];

        $stmt2 = $conexao->prepare("
            INSERT INTO receita_produto (id_receita, id_prod, quantidade, preco_venda)
            VALUES (?, ?, ?, ?)
        ");

        foreach ($id_produtos as $i => $produto_id) {
            if (!empty($produto_id) && !empty($quantidades[$i]) && !empty($precos[$i])) {
                $qtd = (int)$quantidades[$i];
                $preco = (float)$precos[$i];
                $stmt2->bind_param("iiid", $receita_id, $produto_id, $qtd, $preco);
                $stmt2->execute();
            }
        }
    }

    echo "✅ Receita e produtos cadastrados com sucesso!";
} else {
    echo "❌ Erro ao cadastrar receita: " . $stmt->error;
}
?>
