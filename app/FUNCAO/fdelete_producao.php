// delete producao
<?php
require_once "../DADOS/config.php";
$producao_id = $_POST['producao_id'];
$conexao->query("DELETE FROM producao WHERE id_producao='$producao_id'");
$conexao->query("DELETE FROM producao_materiaprima WHERE id_producao='$producao_id'");
$conexao->query("DELETE FROM estoque WHERE estoque_tipo='Matéria Prima' AND estoque_quantidade IN (SELECT quantidade_usada FROM producao_materiaprima WHERE id_producao='$producao_id')");
$conexao->query("DELETE FROM estoque WHERE estoque_tipo='Produto' AND estoque_quantidade IN (SELECT quantidade_produzida FROM producao WHERE id_producao='$producao_id')"); 
echo "✅ Produção deletada e estoque atualizado!";
?>
