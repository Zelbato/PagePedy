<!DOCTYPE html>
<html lang="pt-br">
<head>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!--Icones Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--Icones Bootstrap-->

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Google Fonts-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Bootstrap-->

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <!--Font Awesome-->
    <title>Document</title>
    <link rel="stylesheet" href="../../public/assets/css/cadastro_produto.css"><!--IMPORTANTE -->
    <meta charset="UTF-8">
    <title>Gerenciar Produtos</title>
</head>
<body>

    <h1>Cadastro de Produto</h1>
    <form action="../../FUNCAO/fcadastro_produto.php" method="POST" enctype="multipart/form-data" class="Formulario_produto">

        <label for="img_prod">Imagem do Produto:</label><br>
        <input type="file" id="img_prod" name="img_prod" accept="image/*"><br><br>

        <label for="categoria_id">Categoria:</label><br>
        <select id="categoria_id" name="categoria_id" required>
            <option value="">Selecione...</option>
            <?php
            require_once '../../DADOS/config.php';
            $sql = "SELECT id_cat, nome_cat FROM categoria ORDER BY nome_cat ASC";
            $res = $conexao->query($sql);
            while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['id_cat']}'>{$row['nome_cat']}</option>";
            }
            ?>
        </select><br><br>
        
    
        <label for="nome_prod">Nome do Produto:</label><br>
        <input type="text" id="nome_prod" name="nome_prod" required><br><br>

        <label for="preco">Preço:</label><br>
        <input type="number" step="0.01" id="preco" name="preco" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" required></textarea><br><br>

        <label for="data_cadastro">Data de Cadastro:</label><br>
        <input type="date" id="data_cadastro" name="data_cadastro" required><br><br>

        <button type="submit">Cadastrar Produto</button>
    </form>

    <hr>

    <h1>Editar Produto</h1>
    <form action="../../FUNCAO/fedite_produto.php" method="POST" enctype="multipart/form-data" class="Form2_produto">

        <label for="id_prod">Selecione o Produto:</label><br>
        <select id="id_prod" name="id_prod" required>
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

        <label for="img_prod_edit">Nova Imagem (opcional):</label><br>
        <input type="file" id="img_prod_edit" name="img_prod" accept="image/*"><br><br>

        <label for="nome_prod">Nome:</label><br>
        <input type="text" id="nome_prod" name="nome_prod" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" required></textarea><br><br>

        <label for="preco">Preço:</label><br>
        <input type="number" step="0.01" id="preco" name="preco" required><br><br>

        <label for="quantidade_estoque">Quantidade em Estoque:</label><br>
        <input type="number" id="quantidade_estoque" name="quantidade_estoque" required><br><br>

        <button type="submit">Editar Produto</button>
    </form>

    <hr>

    <h1>Deletar Produto</h1>
    <form action="../../FUNCAO/fdelete_produto.php" method="GET" class="form3_produto">
        <label for="id_prod_delete">Selecione o Produto:</label><br>
        <select id="id_prod_delete" name="id_prod" required>
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

        <button type="submit">Excluir Produto</button>
    </form>

    <hr>

    <h1>Lista de Produtos</h1>
    <?php
    $sql = "SELECT p.id_prod,p.img_prod, p.nome_prod, p.preco, p.descricao, p.data_cadastro, c.nome_cat 
            FROM produto p 
            JOIN categoria c ON p.categoria_id = c.id_cat
            ORDER BY p.nome_prod ASC";
    $res = $conexao->query($sql);

    if ($res->num_rows > 0) {
        echo "<table border='1' cellpadding='5'>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Data de Cadastro</th>
                </tr>";
        while ($row = $res->fetch_assoc()) {
            $imgTag = !empty($row['img_prod']) ? "<img src='{$row['img_prod']}' width='60'>" : "—";
            echo "<tr>
                    <td>{$row['id_prod']}</td>
                    <td>$imgTag</td>
                    <td>{$row['nome_prod']}</td>
                    <td>{$row['nome_cat']}</td>
                    <td>R$ {$row['preco']}</td>
                    <td>{$row['descricao']}</td>
                    <td>{$row['data_cadastro']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum produto cadastrado.</p>";
    }
    ?>

</body>
</html>
