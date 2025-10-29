<!-- 
CREATE TABLE receita (
    id_receita INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo_receita ENUM('Produto', 'Outro') DEFAULT 'Produto',
    descricao_R TEXT,
    data_venda DATE NOT NULL,
    valor_total DECIMAL(10, 2),
    observacao TEXT
);

CREATE TABLE receita_produto (
    id_receita INT NOT NULL,
    id_prod INT NOT NULL,
    quantidade INT NOT NULL,
    preco_venda DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (id_receita, id_prod),
    FOREIGN KEY (id_receita) REFERENCES receita(id_receita),
    FOREIGN KEY (id_prod) REFERENCES produto(id_prod)
);deletar -->

<?php
require_once "../DADOS/config.php"; 
if (isset($_GET['id_receita'])) {
    $id_receita = $_GET['id_receita'];

    // Deleta os registros relacionados na tabela receita_produto primeiro
    $stmt_rel = $conexao->prepare("DELETE FROM receita_produto WHERE id_receita = ?");
    $stmt_rel->bind_param("i", $id_receita);
    $stmt_rel->execute();

    // Agora deleta o registro na tabela receita
    $stmt = $conexao->prepare("DELETE FROM receita WHERE id_receita = ?");
    $stmt->bind_param("i", $id_receita);

    if ($stmt->execute()) {
        echo "Receita deletada com sucesso!";
    } else {
        echo "Erro ao deletar receita: " . $stmt->error;
    }
} else {
    echo "ID da receita não fornecido.";
}   
?>
