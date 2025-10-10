//edite usuario
<!-- CREATE TABLE usuario (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    endereco TEXT,
    acesso INT NOT NULL DEFAULT 1
); -->
<?php
require_once "../DADOS/config.php";
$usuario_id = $_POST['usuario_id'];
$nome = $_POST['nome']; 
$email = $_POST['email'];
$endereco = $_POST['endereco']; 

$stmt = $conexao->prepare("UPDATE usuario SET nome = ?, email = ?, endereco = ? WHERE id = ?");
$stmt->bind_param("sssi", $nome, $email, $endereco, $usuario_id);
if ($stmt->execute()) {
    echo "✅ Usuário atualizado com sucesso!";
} else {
    echo "❌ Erro ao atualizar usuário: " . $stmt->error;
}
$stmt->close();
$conexao->close();




?>