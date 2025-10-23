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
</head>
<body>
<h1>Resumo do Pedido</h1>

<p><strong>Base:</strong> <?= htmlspecialchars($base['nome_prod']) ?> — R$ <?= number_format($base['preco'], 2, ',', '.') ?></p>

<h3>Acompanhamentos:</h3>
<ul>
    <?php
    if (!empty($itens)) {
        foreach ($itens as $item) {
            echo "<li>{$item['nome_mp']} — R$ " . number_format($item['preco_unitario'], 2, ',', '.') . "</li>";
        }
    } else {
        echo "<li>Nenhum acompanhamento selecionado.</li>";
    }
    ?>
</ul>

<h2>Total: R$ <?= number_format($total, 2, ',', '.') ?></h2>

<form action="../FUNCAO/ffinalizar_pedido.php" method="POST">
    <input type="hidden" name="base_id" value="<?= $base_id ?>">
    <?php
    foreach ($acompanhamentos as $id_mp) {
        echo "<input type='hidden' name='acompanhamentos[]' value='$id_mp'>";
    }
    ?>
    <input type="hidden" name="total" value="<?= $total ?>">
    <label>Destino (endereço):</label><br>
    <input type="text" name="destino" required><br><br>
    <button type="submit">Confirmar Pedido ✅</button>
</form>

</body>
</html>
