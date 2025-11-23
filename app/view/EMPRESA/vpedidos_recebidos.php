<?php
require_once '../../../app/DADOS/config.php';

// Consulta para pegar o admin
$stmt = $conexao->prepare("SELECT nome FROM usuario WHERE acesso = 2 LIMIT 1");
$stmt->execute();
$stmt->bind_result($nomeAdmin);
$stmt->fetch();
$stmt->close();

$nomeAdmin = $nomeAdmin;
$nomeAdmin = 'Administrador';

// Carrega pedidos
require_once '../../FUNCAO/fpedidos_recebidos.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet" />
    <!--Icones Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <title>PedyAçaí - Pedidos Recebidos</title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logoOficialTransparentRecortada.png">
    <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/pedidos_recebidos.css">
</head>

<body>

    <header id="header" class="header" role="banner">
        <nav class="navbar section-content">
            <a href="home_adm.php" class="nav-logo" style="display: flex; align-items: center; gap: 10px;">
                <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo">
            </a>
            <ul class="nav-menu">
                <button id="menuCloseBtn" class="fas fa-times"></button>
                <span class="admin-nome"><span class="online"> ● </span>Painel: <?php echo $nomeAdmin; ?></span>
                <span class="divider">&#x2502;</span>
                <li class="nav-item">
                    <a href="home_adm.php" class="nav-link primary"> Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="../vlogin_usuario.php" class="nav-link logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
                </li>
                <li class="nav-item">
                    <a href="vmeus_pedidos.php" class="nav-link"></a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
                </li> -->
            </ul>
            <button id="menuOpenBtn" class="fas fa-bars"></button>
        </nav>
    </header>

    <main class="main-content">
        <section class="section section-listar">
            <h1>Pedidos Recebidos</h1>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nº Pedido</th>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Destino</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if ($res && $res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                echo "
            <tr>
                <td><b>{$row['id_pedi']}</b></td>

                <td>{$row['cliente']}</td>
                <td>" . date('d/m/Y H:i', strtotime($row['data_pedido'])) . "</td>
                <td>R$ " . number_format($row['valor_total'], 2, ',', '.') . "</td>
                <td>{$row['status_pedi']}</td>
                <td>{$row['destino']}</td>

                <td>

                    <!-- BOTÃO DO MODAL -->
                    <button class='abrir-modal' data-id='{$row['id_pedi']}' style='margin-bottom:6px; padding:6px 12px; border:none; border-radius:6px; background:var(--roxoclaro); color:white; cursor:pointer;'>
                        Visualizar
                    </button>

                    <!-- FORM INLINE PARA STATUS -->
                    <form method='POST' class='form-inline'>
                        <input type='hidden' name='id_pedi' value='{$row['id_pedi']}'>
                        
                        <select name='novo_status'>
                            <option value='preparando'>Preparando</option>
                            <option value='a caminho'>A caminho</option>
                            <option value='entregue'>Entregue</option>
                            <option value='cancelado'>Cancelado</option>
                        </select>

                        <button class='btnAtualiza' type='submit'>Atualizar</button>
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

            <!-- MODAL -->
            <div id="modalPedido">
                <div id="modalContent">
                    <span id="closeModalBtn">&times;</span>
                    <h2>Detalhes do Pedido</h2>
                    <div id="modalBody">Carregando...</div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
                <!-- <h2 class="txt-logo">Pedy<span class="txt-gradient">Açaí</span></h2> -->
                <p>Mais que sabor, uma explosão de energia em cada copo!</p>
            </div>

            <div class="footer-links">
                <h3>Links Rápidos</h3>
                <ul>
                    <li><a href="home_adm.php">Início</a></li>
                    <li><a href="../vlogin_usuario.php">Sair</a></li>
                </ul>
            </div>

            <div class="footer-social">
                <h3>Siga-nos</h3>
                <div class="social-icons">
                    <a href="https://www.instagram.com/pedy_acai?igsh=d25hN3lieHhreGRt"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.facebook.com/share/19xxsjamdX/"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://wa.me/5517997669330"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <span id="year"></span> PedyAçaí - Todos os direitos reservados.</p>
        </div>
        <!-- <small class="creditos">
            Desenvolvido por Calebe | Heitor & João Pedro © 2025
        </small> -->
    </footer>

    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>

    <script src="../../../public/assets/js/pedidoRecebido.js"></script>
    <script src="../../../public/assets/js/homeAdm.js"></script>

</body>

</html>