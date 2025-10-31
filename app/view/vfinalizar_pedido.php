<?php
require_once '../DADOS/config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') exit('Acesso inválido.');

$base_id = $_POST['base_id'];
$acompanhamentos = $_POST['acompanhamentos'] ?? [];

$sqlBase = "SELECT nome_prod, preco FROM produto WHERE id_prod = $base_id";
$base = $conexao->query($sqlBase)->fetch_assoc();

$total = $base['preco'];
$itens = [];

if (!empty($acompanhamentos)) {
    $ids = implode(',', array_map('intval', $acompanhamentos));
    $sqlAcomp = "SELECT id_mp, nome_mp, preco_unitario FROM materia_prima WHERE id_mp IN ($ids)";
    $res = $conexao->query($sqlAcomp);
    while ($row = $res->fetch_assoc()) {
        $itens[] = $row;
        $total += $row['preco_unitario'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Finalizar Pedido</title>
    <link rel="stylesheet" href="../../public/assets/css/finalizar_pedido.css">
</head>

<body>
    <div class="resumo-container">
        <h1 class="titulo-pedido">Resumo do Pedido</h1>

        <div class="cards-wrapper">
            <div class="card-produto card-hover">
                <h2>Produto</h2>
                <p><?= htmlspecialchars($base['nome_prod']) ?> —
                    <span class="preco">R$ <?= number_format($base['preco'], 2, ',', '.') ?></span>
                </p>
            </div>

            <?php if (!empty($itens)) : ?>
                <div class="card-produto card-hover">
                    <h2>Acompanhamentos</h2>
                    <ul>
                        <?php foreach ($itens as $item): ?>
                            <li><?= htmlspecialchars($item['nome_mp']) ?>:
                                <span class="preco">R$ <?= number_format($item['preco_unitario'], 2, ',', '.') ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="total-card card-hover">
                <h2>Total</h2>
                <p class="total-value">R$ <?= number_format($total, 2, ',', '.') ?></p>
            </div>
        </div>

        <form action="../FUNCAO/ffinalizar_pedido.php" method="POST" class="form-finalizar">
            <input type="hidden" name="base_id" value="<?= $base_id ?>">
            <?php foreach ($acompanhamentos as $id_mp): ?>
                <input type="hidden" name="acompanhamentos[]" value="<?= $id_mp ?>">
            <?php endforeach; ?>
            <input type="hidden" name="total" value="<?= $total ?>">

            <label for="destino">Destino (endereço):</label>
            <input type="text" name="destino" id="destino" required placeholder="Digite seu endereço">
            <div class="botao-wrapper">
                <button type="submit" class="btn-finalizar">Confirmar Pedido </button>
                <button type="submit" class="btn-cancelar"><a href="vcardapio.php">Cancelar Pedido</a></button>
            </div>  
        </form>
    </div>
</body>

</html>