<!-- CREATE TABLE orcamento (
    id_orc INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    empresa_id INT NOT NULL,
    periodo_inicio DATE NOT NULL,
    periodo_fim DATE NOT NULL,
    receita_total DECIMAL(12, 2) DEFAULT 0.00,
    despesa_total DECIMAL(12, 2) DEFAULT 0.00,
    lucro_liquido DECIMAL(12, 2) GENERATED ALWAYS AS (receita_total - despesa_total) STORED,
    valor_a_pagar DECIMAL(12, 2) DEFAULT 0.00,
    status ENUM('Atualizado', 'Em Análise', 'Fechado') DEFAULT 'Atualizado',
    ultima_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (empresa_id) REFERENCES empresa(id_empr)
); -->

<?php
require_once '../DADOS/conexao.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $empresa_id = $_POST['empresa_id'];
    $periodo_inicio = $_POST['periodo_inicio'];
    $periodo_fim = $_POST['periodo_fim'];
    $receita_total = $_POST['receita_total'];
    $despesa_total = $_POST['despesa_total'];
    $valor_a_pagar = $_POST['valor_a_pagar'];
    $status = $_POST['status'];
    $stmt = $conexao->prepare("INSERT INTO orcamento (empresa_id, periodo_inicio, periodo_fim, receita_total, despesa_total, valor_a_pagar, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issddds", $empresa_id, $periodo_inicio, $periodo_fim, $receita_total, $despesa_total, $valor_a_pagar, $status);      
    if ($stmt->execute()) {
        echo "Orçamento cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar orçamento: " . $stmt->error;
    }   
}
?>
