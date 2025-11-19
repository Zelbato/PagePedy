<?php 
require_once '../FUNCAO/fmeus_pedidos.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Ícones -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>PedyAçaí - Meus Pedidos</title>
    <link rel="icon" type="image/png" href="../../public/assets/img/logoOficialTransparentRecortada.png">
    <link rel="stylesheet" href="../../public/assets/css/meus_pedidos.css">

    <style>
        /* Modal */
        #modalPedido {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,.70);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        #modalContent {
            background: #fff;
            width: 90%;
            max-width: 550px;
            padding: 25px;
            border-radius: 12px;
            animation: fadeIn .3s;
        }

        #closeModalBtn {
            float: right;
            cursor: pointer;
            font-size: 22px;
            font-weight: bold;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body>

<!-- Header -->
<header id="header" class="header" role="banner">
    <nav class="navbar section-content">
        <a href="home.php" class="nav-logo">
            <img src="../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
        </a>

        <ul class="nav-menu">
            <button id="menuCloseBtn" class="fas fa-times"></button>
            <li><a href="home.php" class="nav-link primary">Início</a></li>
            <li><a href="vcardapio.php#categorias" class="nav-link">Cardápio</a></li>
            <li><a href="vmeus_pedidos.php" class="nav-link">Meus Pedidos</a></li>
            <li><a href="vhistorico_pedidos_usuario.php" class="nav-link">Histórico</a></li>
        </ul>

        <button id="menuOpenBtn" class="fas fa-bars"></button>
    </nav>
</header>

<!-- Conteúdo -->
<main class="container">
    <h1>Meus Pedidos</h1>

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
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = $res->fetch_assoc()): ?>
                        <tr>
                            <td data-label="ID"><?= $row['id_pedi'] ?></td>
                            <td data-label="Data"><?= date('d/m/Y H:i', strtotime($row['data_pedido'])) ?></td>
                            <td data-label="Valor Total">R$ <?= number_format($row['valor_total'], 2, ',', '.') ?></td>

                            <td data-label="Status" class="status <?= strtolower(str_replace(' ', '-', $row['status_pedi'])) ?>">
                                <?= $row['status_pedi'] ?>
                            </td>

                            <td data-label="Destino"><?= htmlspecialchars($row['destino']) ?></td>

                            <td>
                                <button class="btn btn-primary visualizar-btn" data-id="<?= $row['id_pedi'] ?>">
                                    Visualizar
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <p class="sem-pedidos">Você ainda não fez nenhum pedido.</p>
    <?php endif; ?>
</main>

<!-- Modal -->
<div id="modalPedido">
    <div id="modalContent">
        <span id="closeModalBtn">&times;</span>
        <h2>Detalhes do Pedido</h2>
        <div id="modalBody">Carregando...</div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-logo">
            <img src="../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo">
            <p>Mais que sabor, uma explosão de energia em cada copo!</p>
        </div>

        <div class="footer-links">
            <h3>Links Rápidos</h3>
            <ul>
                <li><a href="home.php">Início</a></li>
                <li><a href="vcardapio.php">Cardápio</a></li>
                <li><a href="vmeus_pedidos.php">Meus Pedidos</a></li>
                <li><a href="vhistorico_pedidos_usuario.php">Histórico</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; <span id="year"></span> PedyAçaí - Todos os direitos reservados.</p>
    </div>
</footer>

<script>
document.getElementById("year").textContent = new Date().getFullYear();

// Abrir modal
document.querySelectorAll(".visualizar-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        const id = btn.dataset.id;
        document.getElementById("modalPedido").style.display = "flex";

        fetch("../FUNCAO/fdetalhes_pedido.php?id=" + id)
            .then(res => res.json())
            .then(data => {
                let html = `
                    <p><b>Nº Pedido:</b> ${data.pedido.id_pedi}</p>
                    <p><b>Data:</b> ${data.pedido.data_pedido}</p>
                    <p><b>Status:</b> ${data.pedido.status_pedi}</p>
                    <p><b>Destino:</b> ${data.pedido.destino}</p>

                    <hr>

                    <h3>Produto Base</h3>
                    <p><b>${data.base.nome_prod}</b> — R$ ${parseFloat(data.base.preco).toFixed(2)}</p>

                    <hr>

                    <h3>Acompanhamentos</h3>
                `;

                if (data.acompanhamentos.length > 0) {
                    html += "<ul>";
                    data.acompanhamentos.forEach(a => {
                        html += `<li>${a.nome_mp} — R$ ${parseFloat(a.preco_unitario).toFixed(2)}</li>`;
                    });
                    html += "</ul>";
                } else {
                    html += "<p>Nenhum acompanhamento.</p>";
                }

                html += `
                    <hr>
                    <h3>Total</h3>
                    <p><b>R$ ${parseFloat(data.pedido.valor_total).toFixed(2)}</b></p>
                `;

                document.getElementById("modalBody").innerHTML = html;
            })
            .catch(() => {
                document.getElementById("modalBody").innerHTML = "<p>Erro ao carregar detalhes.</p>";
            });
    });
});

// Fechar modal
document.getElementById("closeModalBtn").onclick = () => {
    document.getElementById("modalPedido").style.display = "none";
};
</script>

</body>
</html>
