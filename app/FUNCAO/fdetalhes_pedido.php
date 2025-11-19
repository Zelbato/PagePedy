<?php
require_once '../DADOS/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(['erro' => 'ID inválido']);
    exit;
}

$idPedido = intval($_GET['id']);

/* ===============================
    1) BUSCA DADOS GERAIS DO PEDIDO
   =============================== */
$sqlPedido = "
    SELECT p.id_pedi, p.data_pedido, p.valor_total, p.destino, p.status_pedi,
           u.nome AS cliente
    FROM pedido p
    JOIN usuario u ON p.usuario_id = u.id
    WHERE p.id_pedi = ?
";
$stmt = $conexao->prepare($sqlPedido);
$stmt->bind_param("i", $idPedido);
$stmt->execute();
$pedido = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$pedido) {
    echo json_encode(['erro' => 'Pedido não encontrado']);
    exit;
}

/* ===============================
    2) BUSCA O PRODUTO BASE
   =============================== */
$sqlBase = "
    SELECT pr.nome_prod, pr.preco
    FROM pedido_produto pp
    JOIN produto pr ON pp.id_prod = pr.id_prod
    WHERE pp.id_pedi = ?
";
$stmt = $conexao->prepare($sqlBase);
$stmt->bind_param("i", $idPedido);
$stmt->execute();
$base = $stmt->get_result()->fetch_assoc();
$stmt->close();

/* ===============================
    3) BUSCA ACOMPANHAMENTOS
   =============================== */
$sqlAcomp = "
    SELECT mp.nome_mp, mp.preco_unitario
    FROM pedido_materiaprima pm
    JOIN materia_prima mp ON pm.id_matepri = mp.id_mp
    WHERE pm.id_pedi = ?
";

$stmt = $conexao->prepare($sqlAcomp);
$stmt->bind_param("i", $idPedido);
$stmt->execute();

$resultAcomp = $stmt->get_result();
$acompanhamentos = [];

while ($row = $resultAcomp->fetch_assoc()) {
    $acompanhamentos[] = $row;
}

$stmt->close();

/* ===============================
    4) RETORNO EM JSON
   =============================== */
echo json_encode([
    'pedido' => $pedido,
    'base' => $base,
    'acompanhamentos' => $acompanhamentos
]);
