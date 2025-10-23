<!-- cardapio , referenciando os produtos cadastrados -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cardápio</h1>
    <div class="cardapio"> 
        <?php
        require_once '../DADOS/config.php';

        $sql = "SELECT id_prod,img_prod, nome_prod, descricao, preco FROM produto";
        
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='produto'>";
                echo "<h2>" . htmlspecialchars($row['nome_prod']) . "</h2>";
                if (!empty($row['img_prod'])) {
                    echo "<img src='" . htmlspecialchars($row['img_prod']) . "' alt='" . htmlspecialchars($row['nome_prod']) . "' style='max-width:100px;'><br>";
                }else{
                    echo "<img src='../DADOS/PRODUTOS/DEFAULT.png' alt='Imagem padrão' style='max-width:100px;'><br>";
                }
                echo "<p>Preço: R$ " . number_format($row['preco'], 2, ',', '.') . "</p>";
                echo "<p>" . htmlspecialchars($row['descricao']) . "</p>";

                echo "</div>";
            }
        } else {
            echo "Nenhum produto encontrado.";
        }
        $conexao->close();
        ?>
    </div>

    
</body>
</html>