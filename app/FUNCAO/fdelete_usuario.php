//deletar usuario
<?php
require_once "../DADOS/config.php";
$usuario_id = $_GET['delete_id'];
$conexao->query("DELETE FROM usuario WHERE id='$usuario_id'");
echo "✅ Usuário deletado com sucesso!";
?>  