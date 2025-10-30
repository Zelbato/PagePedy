<?php require_once '../FUNCAO/fmeus_pedidos.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="../../public/assets/css/meus_pedidos.css">
</head>
<body>
    <main class="container">
        <h1>🧾 Meus Pedidos</h1>

        <?php if ($res && $res->num_rows > 0): ?>
        <div class="tabela-container">
            <table class="tabela-pedidos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Valor Total</th>
                        <th>Status</th>
                        <th>Destino</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $res->fetch_assoc()): ?>
                    <tr>
                        <td data-label="ID"><?= $row['id_pedi'] ?></td>
                        <td data-label="Data"><?= $row['data_pedido'] ?></td>
                        <td data-label="Valor Total">R$ <?= number_format($row['valor_total'], 2, ',', '.') ?></td>
                        <td data-label="Status" class="status 
                            <?= strtolower(str_replace(' ', '-', $row['status_pedi'])) ?>">
                            <?= $row['status_pedi'] ?>
                        </td>
                        <td data-label="Destino"><?= $row['destino'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p class="sem-pedidos">Você ainda não fez nenhum pedido.</p>
        <?php endif; ?>
    </main>
</body>
</html>
