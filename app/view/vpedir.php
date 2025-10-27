<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Monte seu Açaí</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        .section { margin-bottom: 25px; }
        .acomp-list { columns: 2; }
        button { padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>

<h1>Monte seu Açaí 🍧</h1>

<form action="../view/vfinalizar_pedido.php" method="POST">

   
    <div class="section">
        <h2>1️⃣ Escolha o tamanho da base:</h2>
        <?php
        require_once '../DADOS/config.php';
        $sql = "SELECT id_prod, nome_prod, preco FROM produto 
                JOIN categoria ON produto.categoria_id = categoria.id_cat 
                WHERE categoria.nome_cat = 'Base'";
        $res = $conexao->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<label>
                        <input type='radio' name='base_id' value='{$row['id_prod']}' required> 
                        <b>{$row['nome_prod']}</b> - R$ " . number_format($row['preco'], 2, ',', '.') . "<br>
      
                      </label><br><br>";
            }
        } else {
            echo "<p>Nenhuma base disponível.</p>";
        }
        ?>
    </div>

   
    <div class="section">
        <h2>2️⃣ Escolha seus acompanhamentos:</h2>
        <div class="acomp-list">
        <?php
        $sql = "SELECT id_mp, nome_mp, preco_unitario FROM materia_prima WHERE tipo_mp = 'acompanhamento'";
        $res = $conexao->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<label>
                        <input type='checkbox' name='acompanhamentos[{$row['id_mp']}]' value='{$row['id_mp']}'>
                        {$row['nome_mp']} - R$ " . number_format($row['preco_unitario'], 2, ',', '.') . "
                      </label><br>";
            }
        } else {
            echo "<p>Nenhum acompanhamento disponível.</p>";
        }
        ?>
        </div>
    </div>

    <button type="submit">➡️ Finalizar Pedido</button>
</form>

</body>
</html>
