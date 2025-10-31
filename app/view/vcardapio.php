<?php require_once '../DADOS/config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PedyAçaí - Cardápio</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../../public/assets/css/cardapio.css">
</head>

<body>


<?php
function slugify(string $str): string {
    $s = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str);
    if ($s === false) $s = $str;
    $s = strtolower($s);
    $s = preg_replace('/[^a-z0-9]+/', '', $s);
    return trim($s);
}

$allowed = [
    'acai' => ['label' => 'Açaí', 'icon' => 'fa-bowl-food'],
    'sorvete' => ['label' => 'Sorvetes', 'icon' => 'fa-ice-cream'],
    'milkshake' => ['label' => 'Milkshakes', 'icon' => 'fa-mug-hot'],
    'baldes' => ['label' => 'Baldes', 'icon' => 'fa-cookie-bite'],
];
?>

<header class="header">
    <nav class="navbar section-content">
        <a href="home.php" class="nav-logo"><h2 class="txt-logo">Pedy<span class="txt-gradient">Açaí</span></h2></a>
        <ul class="nav-menu">
            <li class="nav-item"><a href="home.php" class="nav-link primary">Início</a></li>
            <li class="nav-item"><a href="vpromocao.php" class="nav-link">Promoções</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Meus Pedidos</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="banner-cardapio">
        <div class="overlay"></div>
        <div class="banner-text">
            <h1>Cardápio</h1>
            <p>Descubra o sabor perfeito: açaí, sorvetes e muito mais</p>
        </div>
    </section>

        <section class="monteOseu">
            <form class="form-pedido" action="../view/vfinalizar_pedido.php" method="POST">
                <h1 class="titulo-pedido">Monte seu Pedido</h1>
                <p class="descricao-pedido">Escolha a base e os acompanhamentos do seu açaí do seu jeito!</p>

          
                <div class="tamanhos-copo card">
                    <h2>Escolha o tamanho da base:</h2>
                    <?php
                    require_once '../DADOS/config.php';
                    $sql = "SELECT id_prod, nome_prod, preco FROM produto 
                JOIN categoria ON produto.categoria_id = categoria.id_cat 
                WHERE categoria.nome_cat = 'Base'";
                    $res = $conexao->query($sql);
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            echo "<label class='opcao'>
                        <input type='radio' name='base_id' value='{$row['id_prod']}' required> 
                        <span><b>{$row['nome_prod']}</b> - R$ " . number_format($row['preco'], 2, ',', '.') . "</span>
                      </label>";
                        }
                    } else {
                        echo "<p>Nenhuma base disponível.</p>";
                    }
                    ?>
                </div>

                <div class="acompanhamentos card oculto" id="acompanhamentos">
                    <h2>Escolha seus acompanhamentos:</h2>
                    <div class="acomp-list">
                        <?php
                        $sql = "SELECT id_mp, nome_mp, preco_unitario FROM materia_prima WHERE tipo_mp = 'acompanhamento'";
                        $res = $conexao->query($sql);
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                echo "<label class='opcao'>
                        <input type='checkbox' name='acompanhamentos[{$row['id_mp']}]' value='{$row['id_mp']}'>
                        <span>{$row['nome_mp']} - R$ " . number_format($row['preco_unitario'], 2, ',', '.') . "</span>
                      </label>";
                            }
                        } else {
                            echo "<p>Nenhum acompanhamento disponível.</p>";
                        }
                        ?>
                    </div>
                </div>

                <button type="submit" class="btn-finalizar">➡️ Finalizar Pedido</button>
            </form>
        </section>
        </main>

<main>

    <section class="categorias">
        <h2>Escolha sua categoria</h2>
        <div class="btnCategoria">
            <button data-categoria="todos" class="ativo"><i class="fa-solid fa-layer-group"></i> Todos</button>
            <?php foreach ($allowed as $slug => $info): ?>
                <button data-categoria="<?= htmlspecialchars($slug) ?>">
                    <i class="fa-solid <?= htmlspecialchars($info['icon']) ?>"></i>
                    <?= htmlspecialchars($info['label']) ?>
                </button>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="produtos">
        <?php
        $sql = "SELECT p.id_prod, p.nome_prod, p.descricao, p.preco, p.img_prod, COALESCE(c.nome_cat, '') AS nome_cat
                FROM produto p
                LEFT JOIN categoria c ON p.categoria_id = c.id_cat
                ORDER BY c.nome_cat, p.nome_prod";
        $res = $conexao->query($sql);

        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $categoriaNome = $row['nome_cat'] ?? '';
                $slugCat = slugify($categoriaNome);

                if (!array_key_exists($slugCat, $allowed)) {
                    continue;
                }

                $imagem = !empty($row['img_prod']) ? "../PRODUTOS/{$row['img_prod']}" : '../../public/assets/img/acai-6-teste.png';
                $nome = htmlspecialchars($row['nome_prod']);
                $desc = htmlspecialchars($row['descricao'] ?: 'Delicioso e feito na hora!');
                $preco = number_format($row['preco'], 2, ',', '.');

                echo "
                <div class='card-produto {$slugCat}'>
                    <img src='{$imagem}' alt='{$nome}'>
                    <h3>{$nome}</h3>
                    <p class='descricao'>{$desc}</p>
                    <span class='preco'>R$ {$preco}</span>

                    <!-- Botão de pedido corrigido -->
                    <form action='vfinalizar_pedido.php' method='POST'>
                        <input type='hidden' name='base_id' value='{$row['id_prod']}'>
                        <input type='hidden' name='preco_base' value='{$row['preco']}'>
                        <button type='submit' class='btn-add'>
                            <i class='fa-solid fa-cart-plus'></i> Pedir
                        </button>
                    </form>
                </div>";
            }
        } else {
            echo "<p class='sem-produtos'>Nenhum produto disponível no momento.</p>";
        }
        ?>
    </section>
</main>

<footer class="footer">
    <p>&copy; <span id="year"></span> PedyAçaí - Todos os direitos reservados.</p>
</footer>

<script>
document.getElementById("year").textContent = new Date().getFullYear();

document.addEventListener('DOMContentLoaded', () => {
    const botoes = document.querySelectorAll('.btnCategoria button');
    const produtos = document.querySelectorAll('.card-produto');

    botoes.forEach(btn => {
        btn.addEventListener('click', () => {
            botoes.forEach(b => b.classList.remove('ativo'));
            btn.classList.add('ativo');
            const categoria = btn.dataset.categoria;

            produtos.forEach(prod => {
                prod.style.display = (categoria === 'todos' || prod.classList.contains(categoria)) ? '' : 'none';
            });
        });
    });
});
</script>
<script src="/public/assets/js/cardapio.js"></script>
 
</body>
</html>
