<!-- 

CREATE TABLE pedido (
    id_pedi INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    data_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    status_pedi ENUM('preparando', 'a caminho', 'entregue', 'cancelado') DEFAULT 'preparando',
    valor_total DECIMAL(10, 2) DEFAULT 0.00,
    destino VARCHAR(255),
    observacoes TEXT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

CREATE TABLE pedido_produto (
    id_pedi INT NOT NULL,
    id_prod INT NOT NULL,
    quantidade INT NOT NULL DEFAULT 1,
    preco_unitario DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_pedi, id_prod),
    FOREIGN KEY (id_pedi) REFERENCES pedido(id_pedi),
    FOREIGN KEY (id_prod) REFERENCES produto(id_prod)
);

CREATE TABLE pedido_materiaprima (
    id_pedi INT NOT NULL,
    id_matepri INT NOT NULL,
    id_prod INT NOT NULL,
    quantidade INT DEFAULT 1,
    PRIMARY KEY (id_pedi, id_matepri, id_prod),
    FOREIGN KEY (id_pedi) REFERENCES pedido(id_pedi),
    FOREIGN KEY (id_matepri) REFERENCES materia_prima(id_mp),
    FOREIGN KEY (id_prod) REFERENCES produto(id_prod)
); -->


<?php
require_once '../DADOS/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}
$usuario_id   = $_POST['usuario_id'];
$data_pedido  = $_POST['data_pedido'];
$status_pedi  = $_POST['status_pedi'];
$valor_total  = $_POST['valor_total'];
$destino      = $_POST['destino'];
$observacoes  = $_POST['observacoes'];
$stmt = $conexao->prepare("
    INSERT INTO pedido (usuario_id, data_pedido, status_pedi, valor_total, destino, observacoes)
    VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->bind_param("issdss", $usuario_id, $data_pedido, $status_pedi, $valor_total, $destino, $observacoes);

if ($stmt->execute()) {
    echo "Pedido cadastrado com sucesso!";
    header("Location: ../view/home.php");
} else {
    echo "Erro ao cadastrar pedido: " . $stmt->error;
}
$stmt->close();
$conexao->close();
?>

