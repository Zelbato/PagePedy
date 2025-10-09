<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Cadastro de Movimentação de Estoque</h2>

    <form action="../FUNCAO/fcadastro_estoque.php" method="POST">
        <label>Tipo de Estoque:</label><br>
        <select name="estoque_tipo" id="estoque_tipo" onchange="mostrarCampos()" required>
            <option value="">Selecione...</option>
            <option value="Matéria Prima">Matéria Prima</option>
            <option value="Produto">Produto</option>
        </select><br>

        <div id="materia_prima_div" style="display:none;">
            <label>Matéria-prima:</label><br>
            <select name="estoque_matp_id">
                <?php
                include '../DADOS/config.php';
                $sql = "SELECT id_mp, nome_mp FROM materia_prima ORDER BY nome_mp";
                $res = $conexao->query($sql);
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_mp']}'>{$row['nome_mp']}</option>";
                }
                ?>
            </select><br>
        </div>

        <div id="produto_div" style="display:none;">
            <label>Produto:</label><br>
            <select name="estoque_produto_id">
                <?php
                $sql = "SELECT id_prod, nome_prod FROM produto ORDER BY nome_prod";
                $res = $conexao->query($sql);
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_prod']}'>{$row['nome_prod']}</option>";
                }
                ?>
            </select><br>
        </div>

        <label>Quantidade:</label><br>
        <input type="number" name="estoque_quantidade" step="1" required><br>

        <label>Data de Entrada:</label><br>
        <input type="date" name="data_entrada" required><br>

        <label>Data de Saída (opcional):</label><br>
        <input type="date" name="data_saida"><br>

        <button type="submit">Salvar Estoque</button>
    </form>

    <script>
    function mostrarCampos() {
        var tipo = document.getElementById("estoque_tipo").value;
        document.getElementById("materia_prima_div").style.display = (tipo === "Matéria Prima") ? "block" : "none";
        document.getElementById("produto_div").style.display = (tipo === "Produto") ? "block" : "none";
    }
    </script>

    <h1>deletar intem de estoque</h1>
    <form action="../FUNCAO/fdelete_estoque.php" method="GET">
        <label>ID do item estocado a ser deletado:</label><br>
        <input type="number" name="delete_id" required><br>
        <button type="submit">Deletar Item</button>
    </form>

    <h1>editar estoque</h1>
    <form action="../FUNCAO/fedite_estoque.php" method="POST">
        <label>ID do item estocado a ser editado:</label><br>
        <input type="number" name="id_estoque" required><br>

        <label>Tipo de Estoque:</label><br>
        <select name="estoque_tipo" id="edit_estoque_tipo" onchange="mostrarCamposEdit()" required>
            <option value="">Selecione...</option>
            <option value="Matéria Prima">Matéria Prima</option>
            <option value="Produto">Produto</option>
        </select><br>

        <div id="edit_materia_prima_div" style="display:none;">
            <label>Matéria-prima:</label><br>
            <select name="estoque_matp_id">
                <?php
                include '../DADOS/config.php';
                $sql = "SELECT id_mp, nome_mp FROM materia_prima ORDER BY nome_mp";
                $res = $conexao->query($sql);
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_mp']}'>{$row['nome_mp']}</option>";
                }
                ?>
            </select><br>
        </div>

        <div id="edit_produto_div" style="display:none;">
            <label>Produto:</label><br>
            <select name="estoque_produto_id">
                <?php
                $sql = "SELECT id_prod, nome_prod FROM produto ORDER BY nome_prod";
                $res = $conexao->query($sql);
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_prod']}'>{$row['nome_prod']}</option>";
                }
                ?>
            </select><br>
        </div>

        <label>Quantidade:</label><br>
        <input type="number" name="estoque_quantidade" step="1" required><br>

      
        <label>Data de Entrada:</label><br>
        <input type="date" name="data_entrada" required><br>
        <label>Data de Saída (opcional):</label><br>
        <input type="date" name="data_saida"><br>
        <button type="submit">Editar Estoque</button>
    </form>
    <script>
    function mostrarCamposEdit() {
        var tipo = document.getElementById("edit_estoque_tipo").value;
        document.getElementById("edit_materia_prima_div").style.display = (tipo === "Matéria Prima") ? "block" : "none";
        document.getElementById("edit_produto_div").style.display = (tipo === "Produto") ? "block" : "none";
    }
    </script>
    
    <h1> estoque </h1>
    <?php
    include '../DADOS/config.php';

    //join para trazer o nome do produto ou matéria prima
    $sql = "
        SELECT 
            e.id_estoque,
            e.estoque_tipo,
            COALESCE(p.nome_prod, m.nome_mp) AS nome_item,
            e.estoque_quantidade,
            e.data_entrada,
            e.data_saida
        FROM estoque e
        LEFT JOIN produto p ON e.estoque_produto_id = p.id_prod
        LEFT JOIN materia_prima m ON e.estoque_matp_id = m.id_mp
        ORDER BY nome_item ASC 
    ";

    $res = $conexao->query($sql);

    if ($res && $res->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Data de Entrada</th>
                    <th>Data de Saída</th>
                </tr>";

        while ($row = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_estoque']}</td>
                    <td>{$row['nome_item']}</td>
                    <td>{$row['estoque_tipo']}</td>
                    <td>{$row['estoque_quantidade']}</td>
                    <td>{$row['data_entrada']}</td>
                    <td>{$row['data_saida']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhum registro encontrado.</p>";
    }
    ?>
</body>
</html>