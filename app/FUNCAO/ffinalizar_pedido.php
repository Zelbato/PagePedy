<?php
require_once "../DADOS/config.php";
session_start(); // não mecha, esse é pra ver se o usuario ta logado

if ($_SERVER['REQUEST_METHOD'] !== 'POST') exit('Acesso inválido.');

$usuario_id = $_SESSION['id'] ?? 1; // esse é um usuario aleatorio depois vou refazer/ continuar 
$base_id = $_POST['base_id'];
$acompanhamentos = $_POST['acompanhamentos'] ?? [];
$total = $_POST['total'];
$destino = $_POST['destino'];

// aqui cadastra o pedido no banco de dados
$stmt = $conexao->prepare("INSERT INTO pedido (usuario_id, valor_total, destino) VALUES (?, ?, ?)");
$stmt->bind_param("ids", $usuario_id, $total, $destino);
$stmt->execute();
$id_pedido = $conexao->insert_id;

// esse vai cadastrar a base que o usuario escolheu
$stmt2 = $conexao->prepare("INSERT INTO pedido_produto (id_pedi, id_prod, quantidade, preco_unitario) VALUES (?, ?, 1, ?)");
$stmt2->bind_param("iid", $id_pedido, $base_id, $total);
$stmt2->execute();

// agora cadastra os acompanhamentos escolhidos
if (!empty($acompanhamentos)) {
    foreach ($acompanhamentos as $id_mp) {
        $stmt3 = $conexao->prepare("INSERT INTO pedido_materiaprima (id_pedi, id_matepri, id_prod, quantidade) VALUES (?, ?, ?, 1)");
        $stmt3->bind_param("iii", $id_pedido, $id_mp, $base_id);
        $stmt3->execute();
    }
}

echo "<h2>Pedido realizado com sucesso! 🎉</h2>";
echo "<a href='../view/vcardapio.php'>Voltar ao cardápio</a>";
?>
