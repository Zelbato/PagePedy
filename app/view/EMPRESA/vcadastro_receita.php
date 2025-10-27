
RECEITA.PHP

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Receitas</title>
    <style>
        .produto-item { margin-bottom: 10px; border: 1px solid #ccc; padding: 10px; }
        button { margin-top: 10px; }
    </style>
</head>
<body>

<h1>Cadastrar Receita</h1>

<form action="../../FUNCAO/fcadastro_receita.php" method="POST" id="formReceita">
    <label for="tipo_receita">Tipo de Receita:</label>
    <select name="tipo_receita" id="tipo_receita" onchange="mostrarProdutos()">
        <option value="Produto">Produto</option>
        <option value="Outro">Outro</option>
    </select><br><br>

    <label for="descricao_R">Descrição:</label><br>
    <textarea name="descricao_R" id="descricao_R" required></textarea><br><br>

    <label for="data_venda">Data da Venda:</label><br>
    <input type="date" name="data_venda" id="data_venda" required><br><br>

    <label for="valor_total">Valor Total:</label><br>
    <input type="number" step="0.01" name="valor_total" id="valor_total" required><br><br>

    <!-- Div para produtos -->
    <div id="produtos_div">
        <h3>Produtos vendidos</h3>
        <div id="produtos_container">
            <div class="produto-item">
                <label>Produto:</label><br>
                <!-- note: removed 'required' from the select here -->
                <select name="id_prod[]">
                    <option value="">Selecione...</option>
                    <?php
                    require_once '../../DADOS/config.php';
                    $sql = "SELECT id_prod, nome_prod FROM produto ORDER BY nome_prod ASC";
                    $res = $conexao->query($sql);
                    while ($row = $res->fetch_assoc()) {
                        echo "<option value='{$row['id_prod']}'>{$row['nome_prod']}</option>";
                    }
                    ?>
                </select><br><br>

                <!-- removed 'required' from these inputs too; we'll toggle via JS -->
                <label>Quantidade:</label>
                <input type="number" name="quantidade[]" min="1"><br><br>

                <label>Preço de Venda:</label>
                <input type="number" step="0.01" name="preco_venda[]"><br><br>
            </div>
        </div>

        <button type="button" onclick="adicionarProduto()">+ Adicionar outro produto</button><br><br>
    </div>

    <button type="submit">Cadastrar Receita</button>
</form>

<script>

document.addEventListener('DOMContentLoaded', function() {
    mostrarProdutos();
});

function mostrarProdutos() {
    const tipo = document.getElementById('tipo_receita').value;
    const produtosDiv = document.getElementById('produtos_div');
    const selects = document.querySelectorAll('#produtos_container select[name="id_prod[]"]');
    const quantInputs = document.querySelectorAll('#produtos_container input[name="quantidade[]"]');
    const precoInputs = document.querySelectorAll('#produtos_container input[name="preco_venda[]"]');

    if (tipo === 'Produto') {
        produtosDiv.style.display = 'block';
        // ativar e tornar required
        selects.forEach(s => { s.disabled = false; s.required = true; });
        quantInputs.forEach(i => { i.disabled = false; i.required = true; });
        precoInputs.forEach(i => { i.disabled = false; i.required = true; });
    } else {
        produtosDiv.style.display = 'none';
        // desabilitar e remover required; limpar valores
        selects.forEach(s => { s.disabled = true; s.required = false; s.selectedIndex = 0; });
        quantInputs.forEach(i => { i.disabled = true; i.required = false; i.value = ''; });
        precoInputs.forEach(i => { i.disabled = true; i.required = false; i.value = ''; });
    }
}

// Clonar o campo de produto
function adicionarProduto() {
    const container = document.getElementById('produtos_container');
    const novoProduto = container.firstElementChild.cloneNode(true);

    // Limpa os valores do clone
    novoProduto.querySelectorAll('input').forEach(input => input.value = '');
    const sel = novoProduto.querySelector('select');
    if (sel) sel.selectedIndex = 0;

    container.appendChild(novoProduto);

    mostrarProdutos();
}
</script>

<hr>

<h1>Todas as Receitas</h1>
<?php
require_once '../../DADOS/config.php';

$sql = "
    SELECT
        r.id_receita,
        r.tipo_receita,
        r.descricao_R,
        r.data_venda,
        r.valor_total,
        rp.id_prod,
        p.nome_prod,
        rp.quantidade,
        rp.preco_venda
    FROM receita r
    LEFT JOIN receita_produto rp ON r.id_receita = rp.id_receita
    LEFT JOIN produto p ON rp.id_prod = p.id_prod
    ORDER BY r.data_venda DESC, r.id_receita DESC, p.nome_prod
";

$res = $conexao->query($sql);

if (!$res) {
    echo "<p>Erro na consulta: " . $conexao->error . "</p>";
    exit;
}

echo "<table border='1' cellpadding='6' cellspacing='0'>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Valor Total</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Subtotal</th>
        </tr>";

$current_receita = null;
$has_products = false;

while ($row = $res->fetch_assoc()) {
    // se mudou a receita, resetamos o flag
    if ($current_receita !== $row['id_receita']) {
        $current_receita = $row['id_receita'];
        $has_products = false;
    }

    if (!empty($row['id_prod'])) {
        $has_products = true;
        $subtotal = (float)$row['quantidade'] * (float)$row['preco_venda'];

        static $last_displayed_receita = null;
        if ($last_displayed_receita !== $row['id_receita']) {
            echo "<tr>
                    <td>{$row['id_receita']}</td>
                    <td>{$row['tipo_receita']}</td>
                    <td>" . htmlspecialchars($row['descricao_R']) . "</td>
                    <td>{$row['data_venda']}</td>
                    <td>{$row['valor_total']}</td>
                    <td>" . htmlspecialchars($row['nome_prod']) . "</td>
                    <td>{$row['quantidade']}</td>
                    <td>{$row['preco_venda']}</td>
                    <td>" . number_format($subtotal, 2, ',', '.') . "</td>
                  </tr>";
            $last_displayed_receita = $row['id_receita'];
        } else {
            echo "<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>" . htmlspecialchars($row['nome_prod']) . "</td>
                    <td>{$row['quantidade']}</td>	
                    <td>{$row['preco_venda']}</td>
                    <td>" . number_format($subtotal, 2, ',', '.') . "</td>
                  </tr>";
        }
    } else {
        echo "<tr>
                <td>{$row['id_receita']}</td>
                <td>{$row['tipo_receita']}</td>
                <td>" . htmlspecialchars($row['descricao_R']) . "</td>
                <td>{$row['data_venda']}</td>
                <td>{$row['valor_total']}</td>
                <td colspan='4' style='text-align:center'>-- Sem produtos vinculados --</td>
              </tr>";
        $last_displayed_receita = $row['id_receita'];
    }
}

echo "</table>";
?>

</body>
</html>
