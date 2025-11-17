<?php
require_once '../../../app/DADOS/config.php';

// Consulta para pegar o admin
$stmt = $conexao->prepare("SELECT nome FROM usuario WHERE acesso = 2 LIMIT 1");
$stmt->execute();
$stmt->bind_result($nomeAdmin);
$stmt->fetch();
$stmt->close();

// Fallback caso não encontre
$nomeAdmin = 'Administrador';
?>

<?php require_once '../../FUNCAO/fpedidos_recebidos.php'; ?>
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>PedyAçaí - Pedidos Recebidos</title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logoOficialTransparentRecortada.png">
    <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/pedidos_recebidos.css">
</head>

<body>

    <!-- Header -->
    <header id="header" class="header" role="banner">
        <nav class="navbar section-content">
            <a href="home_adm.php" class="nav-logo" style="display: flex; align-items: center; gap: 10px;">
                <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
                <!-- <span class="painel-texto">Painel Administrativo</span> -->
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
        <section class="section section-listar" aria-labelledby="listar-pedidos">
            <h1 id="listar-pedidos">Pedidos Recebidos</h1>

            <div class="table-container">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Número do Pedido</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Data</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($res && $res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                $valorTotal = "R$ " . number_format($row['valor_total'], 2, ',', '.');
                                $cliente = htmlspecialchars($row['cliente']);
                                $dataFormatada = date('d/m/Y H:i', strtotime($row['data_pedido'])); // formata a data
                                echo "<tr>
            <td>{$row['id_pedi']}</td>
            <td>{$cliente}</td>
            <td>{$dataFormatada}</td>
            <td>{$valorTotal}</td>
            <td>{$row['status_pedi']}</td>
            <td>{$row['destino']}</td>
            <td>
                <form method='POST' class='form-inline update-form'>
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
                    <li><a href="home.php">Início</a></li>
                    <li><a href="vcardapio.php">Cardápio</a></li>
                    <li><a href="#">Promoções</a></li>
                    <li><a href="#">Meus Pedidos</a></li>
                </ul>
            </div>

            <div class="footer-social">
                <h3>Siga-nos</h3>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <span id="year"></span> PedyAçaí - Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="../../../public/assets/js/script.js"></script>
    <script src="../../../public/assets/js/pedidoRecebido.js"></script>

    
    <script>
        // Alterna seções ao clicar nos botões
        const botoes = document.querySelectorAll('.actions-bar button');
        const secoes = document.querySelectorAll('.section');

        botoes.forEach(btn => {
            btn.addEventListener('click', () => {
                botoes.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                secoes.forEach(sec => sec.classList.remove('active'));
                const alvo = btn.getAttribute('data-card');
                document.querySelector(`.section-${alvo}`).classList.add('active');
            });
        });
    </script>

    <div class="toast-container" id="toast-container"></div>


</body>

</html>