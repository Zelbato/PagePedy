<!-- CREATE TABLE receita (
    id_receita INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     tipo_receita ENUM ('Produto','outro'),
     descricao_R TEXT,
    receita_prod_id INT,
    data_venda DATE NOT NULL,
    valor_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (receita_prod_id) REFERENCES produto(id_prod)
); -->

<?php
require_once '../DADOS/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receita_prod_id = $_POST['receita_prod_id'];
    $tipo_receita = $_POST['tipo_receita'];
    $descricao_R = $_POST['descricao_R'];
    $data_venda = $_POST['data_venda'];
    $valor_total = $_POST['valor_total'];

   
    $conexao= new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conexao>connect_error) {
        die("Conexão falhou: " . $conexao>connect_error);
    }

  
    $stmt = $conexao>prepare("INSERT INTO receita (receita_prod_id, tipo_receita,descricao_R, data_venda, valor_total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issss", $receita_prod_id, $tipo_receita, $descricao_R, $data_venda, $valor_total);


    if ($stmt->execute()) {
        echo "Nova receita cadastrada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

   
    $stmt->close();
    $conexao>close();
}   
?>