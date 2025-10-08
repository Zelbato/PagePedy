<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Estoque - Açaí</title>
</head>
<body>
    <h2>Cadastro de Movimentação de Estoque</h2>

    <form action="../FUNCAO/fcadastro_estoque.php" method="POST">
        <label>Tipo de Estoque:</label><br>
        <select name="estoque_tipo" id="estoque_tipo" onchange="mostrarCampos()" required>
            <option value="">Selecione...</option>
            <option value="Matéria Prima">Matéria Prima</option>
            <option value="Produto">Produto</option>
        </select><br><br>

        <div id="materia_prima_div" style="display:none;">
            <label>Matéria-prima:</label><br>
            <select name="estoque_matp_id">
                <?php
                include '../DADOS/config.php';
                $sql = "SELECT id_mp, nome_mp FROM materia_prima";
                $res = $conexao->query($sql);
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_mp']}'>{$row['nome_mp']}</option>";
                }
                ?>
            </select><br><br>
        </div>

        <div id="produto_div" style="display:none;">
            <label>Produto:</label><br>
            <select name="estoque_produto_id">
                <?php
                include '../DADOS/config.php';
                $sql = "SELECT id_prod, nome_prod FROM produto";
                $res = $conexao->query($sql);
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_prod']}'>{$row['nome_prod']}</option>";
                }
                ?>
            </select><br><br>
        </div>

        <label>Quantidade:</label><br>
        <input type="number" name="estoque_quantidade" step="1" required><br><br>

        <label>Status:</label><br>
        <select name="estoque_status">
            <option value="Disponivel">Disponível</option>
            <option value="Esgotado">Esgotado</option>
        </select><br><br>

        <label>Data de Entrada:</label><br>
        <input type="date" name="data_entrada"><br><br>

        <label>Data de Saída (opcional):</label><br>
        <input type="date" name="data_saida"><br><br>

        <button type="submit">Salvar Estoque</button>
    </form>

    <script>
    function mostrarCampos() {
        var tipo = document.getElementById("estoque_tipo").value;
        document.getElementById("materia_prima_div").style.display = (tipo === "Matéria Prima") ? "block" : "none";
        document.getElementById("produto_div").style.display = (tipo === "Produto") ? "block" : "none";
    }
    </script>
</body>
</html>

</body>
</html>