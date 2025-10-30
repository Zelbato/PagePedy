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
                <h2>Base</h2>
                <p><?= htmlspecialchars($base['nome_prod']) ?> — <span class="preco">R$ <?= number_format($base['preco'], 2, ',', '.') ?></span></p>
            </div>

            <div class="card-produto card-hover">
                <h2>Acompanhamentos</h2>
                <ul>
                <?php
                if (!empty($itens)) {
                    foreach ($itens as $item) {
                        echo "<li>🍧 {$item['nome_mp']} — <span class='preco'>R$ " . number_format($item['preco_unitario'], 2, ',', '.') . "</span></li>";
                    }
                } else {
                    echo "<li>Nenhum acompanhamento selecionado.</li>";
                }
                ?>
                </ul>
            </div>

            <div class="total-card card-hover">
                <h2>Total</h2>
                <p class="total-value">R$ <?= number_format($total, 2, ',', '.') ?></p>
            </div>
        </div>

        <form action="../FUNCAO/ffinalizar_pedido.php" method="POST" class="form-finalizar">
            <input type="hidden" name="base_id" value="<?= $base_id ?>">
            <?php
            foreach ($acompanhamentos as $id_mp) {
                echo "<input type='hidden' name='acompanhamentos[]' value='$id_mp'>";
            }
            ?>
            <input type="hidden" name="total" value="<?= $total ?>">

            <label for="destino">Destino (endereço):</label>
            <input type="text" name="destino" id="destino" required placeholder="Digite seu endereço">

            <button type="submit" class="btn-finalizar">Confirmar Pedido </button>
        </form>
    </div>
</body>
</html>
