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
); editar update -->

<?php 
require_once "../DADOS/config.php";
if (isset($_POST['id_receita']) && isset($_POST['tipo_receita']) && isset($_POST['descricao_R']) && isset($_POST['data_venda']) && isset($_POST['valor_total'])) {
    $id_receita = $_POST['id_receita'];
    $tipo_receita = $_POST['tipo_receita'];
    $descricao_R = $_POST['descricao_R'];
    $data_venda = $_POST['data_venda'];
    $valor_total = $_POST['valor_total'];

    $stmt = $conexao->prepare("UPDATE receita SET tipo_receita = ?, descricao_R = ?, data_venda = ?, valor_total = ? WHERE id_receita = ?");
    $stmt->bind_param("sssdi", $tipo_receita, $descricao_R, $data_venda, $valor_total, $id_receita);
    //quantidade update quantidade preco_venda
      if ($stmt->execute()) {

        // Se for uma receita de produto, atualiza também a tabela receita_produto
        if ($tipo_receita === 'Produto' && isset($_POST['id_prod']) && isset($_POST['quantidade']) && isset($_POST['preco_venda'])) {

            $id_prod = $_POST['id_prod'];
            $quantidade = $_POST['quantidade'];
            $preco_venda = $_POST['preco_venda'];

            // Verifica se já existe o registro para essa receita + produto
            $check = $conexao->prepare("
                SELECT * FROM receita_produto WHERE id_receita = ? AND id_prod = ?
            ");
            $check->bind_param("ii", $id_receita, $id_prod);
            $check->execute();
            $result = $check->get_result();

            if ($result->num_rows > 0) {
                // Atualiza se já existir
                $update = $conexao->prepare("
                    UPDATE receita_produto 
                    SET quantidade = ?, preco_venda = ? 
                    WHERE id_receita = ? AND id_prod = ?
                ");
                $update->bind_param("ddii", $quantidade, $preco_venda, $id_receita, $id_prod);
                $update->execute();
            } else {
                // Insere se não existir
                $insert = $conexao->prepare("
                    INSERT INTO receita_produto (id_receita, id_prod, quantidade, preco_venda) 
                    VALUES (?, ?, ?, ?)
                ");
                $insert->bind_param("iiid", $id_receita, $id_prod, $quantidade, $preco_venda);
                $insert->execute();
            }
        }

        echo "✅ Receita atualizada com sucesso!";

    } else {
        echo "❌ Erro ao atualizar receita: " . $stmt->error;
    }

} else {
    echo "⚠️ Dados incompletos para atualização.";
}
?>