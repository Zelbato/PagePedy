<!-- CREATE TABLE despesas (
    id_despesas INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoria_despesa ENUM('Fixa','Variável') NOT NULL,
    nome_despesa VARCHAR(50) NOT NULL,
    valor_despesa DECIMAL(10, 2) NOT NULL,
    data_despesa DATE NOT NULL,
    descricao TEXT
); editar -->
<?php
require_once '../DADOS/config.php';
if (isset($_POST['id_despesas'])) {
    $id_despesas = $_POST['id_despesas'];
    $categoria_despesa = $_POST['categoria_despesa'];
    $nome_despesa = $_POST['nome_despesa'];
    $valor_despesa = $_POST['valor_despesa'];
    $data_despesa = $_POST['data_despesa'];
    $descricao = $_POST['descricao'];

    $conexao = new mysqli($host, $user, $pass, $dbname);

    // Verifica conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Prepara e vincula
    $stmt = $conexao->prepare("UPDATE despesas SET categoria_despesa=?, nome_despesa=?, valor_despesa=?, data_despesa=?, descricao=? WHERE id_despesas=?");
    $stmt->bind_param("ssdssi", $categoria_despesa, $nome_despesa, $valor_despesa, $data_despesa, $descricao, $id_despesas);

    // Executa a declaração
    if ($stmt->execute()) {
        echo "Despesa atualizada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conexao->close();
}
