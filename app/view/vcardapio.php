<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cardápio</title>
</head>
<body>
    <h1>Cardápio de Produtos</h1>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Produto</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Categoria</th>
        </tr>
        <?php
        require_once '../DADOS/config.php';

        $sql = "SELECT p.id_prod, p.nome_prod, p.descricao, p.preco, p.img_prod, c.nome_cat AS categoria
                FROM produto p
                JOIN categoria c ON p.categoria_id = c.id_cat
                ORDER BY c.nome_cat ASC";

        $res = $conexao->query($sql);

        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $id = $row['id_prod'];
                $nome = htmlspecialchars($row['nome_prod'] ?? '');
                $descricao = htmlspecialchars($row['descricao'] ?? '');
                $categoria = htmlspecialchars($row['categoria'] ?? '');
                $preco = number_format($row['preco'] ?? 0, 2, ',', '.');
                $img = $row['img_prod'] ?? '';

                echo "<tr>";
                echo "<td>$id</td>";

                // ✅ Caminho da imagem com fallback
                $imgPath = "../PRODUTOS/" . $img;
                if (!empty($img) && file_exists($imgPath)) {
                    echo "<td><img src='$imgPath' width='80' height='80'></td>";
                } else {
                    echo "<td><img src='../DADOS/PRODUTOS/DEFAULT.png' alt='Imagem padrão' width='80' height='80'></td>";
                }

                echo "<td>$nome</td>";
                echo "<td>$descricao</td>";
                echo "<td>R$ $preco</td>";
                echo "<td>$categoria</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Nenhum produto encontrado.</td></tr>";
        }
        ?>
    </table>        
</body>
</html>
