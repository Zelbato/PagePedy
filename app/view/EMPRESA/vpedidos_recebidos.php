<?php
require_once '../../../app/DADOS/config.php';

// Consulta para pegar o admin
$stmt = $conexao->prepare("SELECT nome FROM usuario WHERE acesso = 2 LIMIT 1");
$stmt->execute();
$stmt->bind_result($nomeAdmin);
$stmt->fetch();
$stmt->close();

$nomeAdmin = $nomeAdmin ?: 'Administrador';

// Carrega pedidos
require_once '../../FUNCAO/fpedidos_recebidos.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>PedyAçaí - Pedidos Recebidos</title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logoOficialTransparentRecortada.png">

    <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/pedidos_recebidos.css">

    <style>
        /* Modal */
        #modalPedido {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,.65);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 99999;
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
            from { opacity: 0; transform: scale(.9);}
            to { opacity: 1; transform: scale(1);}
        }
    </style>

</head>

<body>

<header id="header" class="header" role="banner">
    <nav class="navbar section-content">
        <a href="home_adm.php" class="nav-logo" style="display: flex; align-items: center; gap: 10px;">
            <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo">
        </a>
        <ul class="nav-menu">
            <span class="admin-nome"><span class="online"> ● </span>Painel: <?= $nomeAdmin ?></span>
            <li><a class="nav-link" href="home_adm.php">Início</a></li>
            <li><a class="nav-link logout" href="../vlogin_usuario.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
        </ul>
        <button id="menuOpenBtn" class="fas fa-bars"></button>
    </nav>
</header>

<main class="main-content">
    <section class="section section-listar">
        <h1>Pedidos Recebidos</h1>

        <div class="table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                <tr>
                    <th>Nº Pedido</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Destino</th>
                    <th>Ações</th>
                </tr>
                </thead><tbody>
<?php
if ($res && $res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        echo "
        <tr>
            <td><b>{$row['id_pedi']}</b></td>

            <td>{$row['cliente']}</td>
            <td>".date('d/m/Y H:i', strtotime($row['data_pedido']))."</td>
            <td>R$ ".number_format($row['valor_total'], 2, ',', '.')."</td>
            <td>{$row['status_pedi']}</td>
            <td>{$row['destino']}</td>

            <td>
                <!-- BOTÃO PARA ABRIR O MODAL -->
                <button class='btn btn-primary abrir-modal' data-id='{$row['id_pedi']}'>
                    Visualizar Pedido
                </button>

                <form method='POST' style='display:inline-block; margin-left:6px;'>
                    <input type='hidden' name='id_pedi' value='{$row['id_pedi']}'>
                    <select name='novo_status'>
                        <option value='preparando'>Preparando</option>
                        <option value='a caminho'>A caminho</option>
                        <option value='entregue'>Entregue</option>
                        <option value='cancelado'>Cancelado</option>
                    </select>
                    <button type='submit'>Atualizar</button>
                </form>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Nenhum pedido encontrado.</td></tr>";
}
?>
</tbody>

            </table>
        </div>
    </section>
</main>


<!-- MODAL -->
<div id="modalPedido">
    <div id="modalContent">
        <span id="closeModalBtn">&times;</span>
        <h2>Detalhes do Pedido</h2>
        <div id="modalBody">Carregando...</div>
    </div>
</div>


<script>
// Fecha modal
document.getElementById('closeModalBtn').onclick = () => {
    document.getElementById('modalPedido').style.display = "none";
};

// Abrir modal
document.querySelectorAll(".abrir-modal").forEach(btn => {
    btn.addEventListener("click", () => {
        const id = btn.dataset.id;
        document.getElementById('modalPedido').style.display = "flex";

    fetch("../../FUNCAO/fdetalhes_pedido.php?id=" + id)
    .then(res => res.json())
    .then(data => {

        let html = `
            <p><b>Nº Pedido:</b> ${data.pedido.id_pedi}</p>
            <p><b>Cliente:</b> ${data.pedido.cliente}</p>
            <p><b>Data:</b> ${data.pedido.data_pedido}</p>
            <p><b>Status:</b> ${data.pedido.status_pedi}</p>
            <p><b>Destino:</b> ${data.pedido.destino}</p>

            <hr>

            <h3>Produto Base</h3>
            <p><b>${data.base.nome_prod}</b> - R$ ${parseFloat(data.base.preco).toFixed(2)}</p>

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
</script>

</body>
</html>
