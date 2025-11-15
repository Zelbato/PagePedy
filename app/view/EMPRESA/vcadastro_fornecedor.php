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

<!DOCTYPE html>
<html lang="pt-br">

<head>
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
  <title>PedyAçaí - Cadastro Fornecedor</title>
  <link rel="icon" type="image/png" href="../../../public/assets/img/logoOficialTransparentRecortada.png">
  <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/cadastro_produto.css"><!--IMPORTANTE -->
  <meta charset="UTF-8">
  <title>Gerenciar Fornecedor</title>
</head>

<body>

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

    <div id="toast-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;"></div>


    <main class="main-content">
      <!-- Coluna de Botões -->
      <div class="actions-bar">
        <button class="active" data-card="cadastrar">Cadastrar</button>
        <button data-card="editar">Editar</button>
        <button data-card="deletar">Deletar</button>
        <button data-card="listar">Listar</button>
      </div>

      <!-- Container de Cards/Formulários -->
      <div class="card-container">
        <!-- Seção Cadastrar -->

        <form action="../../FUNCAO/fcadastro_fornecedor.php" method="POST" class="section section-cadastrar active">
          <h2 id="cadastro-mp" class="section-title">Cadastrar Fornecedor</h2>
          <form class="form form-cadastro" action="../../FUNCAO/fcadastro_fornecedor.php" method="POST">
            <fieldset class="fieldset field-1">
              <legend class="legend">Informações do Fornecedor</legend>
              <div class="form-group">
                <label for="nome_forn">Nome do Fornecedor:</label>
                <input type="text" id="nome_forn" name="nome_forn" required>
              </div>
              <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input type="text" id="cnpj" name="cnpj">
              </div>
              <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco">
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Cadastrar Fornecedor</button>
              </div>
            </fieldset>
          </form>
          </section>

          <!-- Seção Deletar -->
          <section class="section section-deletar" aria-labelledby="deletar-mp">
            <h2 id="deletar-mp" class="section-title">Deletar Fornecedor</h2>
            <form action="../../FUNCAO/fdelete_fornecedor.php" method="GET" class="form form-deletar">
              <fieldset class="fieldset">
                <legend class="legend">Selecione o Fornecedor para Excluir</legend>
                <div class="form-group">
                  <label for="delete_id">ID do Fornecedor:</label>
                  <input type="text" id="delete_id" name="delete_id" required>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-danger">Deletar Fornecedor</button>
                </div>
              </fieldset>
            </form>
          </section>


          <!-- Seção Editar -->
          <section class="section section-editar" aria-labelledby="editar-mp">
            <h2 id="editar-mp" class="section-title">Editar Fornecedor</h2>
            <form action="../../FUNCAO/fedite_fornecedor.php" method="POST" class="form form-editar">
              <fieldset class="fieldset">
                <legend class="legend">Informações para Edição</legend>
                <div class="form-group">
                  <label for="id_forn">ID do Fornecedor:</label>
                  <input type="text" id="id_forn" name="id_forn" required>
                </div>
                <div class="form-group">
                  <label for="nome_forn">Nome do Fornecedor:</label>
                  <input type="text" id="nome_forn" name="nome_forn" required>
                </div>
                <div class="form-group">
                  <label for="cnpj">CNPJ:</label>
                  <input type="text" id="cnpj" name="cnpj">
                </div>
                <div class="form-group">
                  <label for="telefone">Telefone:</label>
                  <input type="text" id="telefone" name="telefone">
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="endereco">Endereço:</label>
                  <input type="text" id="endereco" name="endereco">
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-secondary">Editar Fornecedor</button>
                </div>
              </fieldset>
            </form>
          </section>


          <!-- Seção Listar -->
          <section class="section section-listar" aria-labelledby="listar-mp">
            <h2 id="listar-mp" class="section-title">Todos os Fornecedores</h2>
            <div class="table-container">
              <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Endereço</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  require_once '../../DADOS/config.php';


                  $sql = "SELECT * FROM fornecedor";
                  $result = $conexao->query($sql);

                  if ($result->num_rows > 0) {
                    echo "<h2>Lista de Fornecedores</h2>";
                    echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Endereço</th>
                </tr>";

                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>
                    <td>" . $row["id_forn"] . "</td>
                    <td>" . $row["nome_forn"] . "</td>
                    <td>" . $row["cnpj"] . "</td>
                    <td>" . $row["telefone"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["endereco"] . "</td>
                </tr>";
                    }
                    echo "</table>";
                  } else {
                    echo "Nenhum fornecedor encontrado.";
                  }
                  $conexao->close();
                  ?>
                </tbody>
              </table>
            </div>
          </section>
      </div>
    </main>

    <footer class="footer">
      <div class="footer-content">
        <div class="footer-logo">
          <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
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
    <script src="../../public/assets/js/historico_pedido.js"></script>

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


  </body>

</html>