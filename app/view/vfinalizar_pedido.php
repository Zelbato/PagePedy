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
                            <li>🍧 <?= htmlspecialchars($item['nome_mp']) ?> — 
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

            <button type="submit" class="btn-finalizar">Confirmar Pedido </button>
        </form>
<button type="submit" class="btn-cancelar"><a href="vcardapio.php">Cancelar Pedido</a></button>
    </div>
</body>
</html>
