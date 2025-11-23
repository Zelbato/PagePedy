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
  <title>PedyAçaí - Cadastro Categoria</title>
  <link rel="icon" type="image/png" href="../../../public/assets/img/logoOficialTransparentRecortada.png">
  <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/cadastrocategoria.css"><!--IMPORTANTE -->
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
    <!-- Coluna de Botões -->
    <div class="actions-bar">
      <button class="active" data-card="cadastrar">Cadastrar</button>
      <button data-card="deletar">Deletar</button>
      <button data-card="listar">Listar</button>
    </div>


    <!-- Container de Cards/Formulários -->
    <div class="card-container">
      <!-- Seção Cadastrar -->
      <section class="section section-cadastrar active" aria-labelledby="cadastro-mp">
        <h2 id="cadastro-mp" class="section-title">Categoria de Categoria</h2>
        <form action="../../FUNCAO/fcadastro_categoria.php" method="POST" class="form form-cadastro">
          <fieldset class="fieldset">
            <legend class="legend">Informações da Categoria</legend>
            <div class="form-group">
              <label for="nome_cat">Nome da Categoria:</label>
              <input type="text" id="nome_cat" name="nome_cat" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição:</label>
              <textarea id="descricao" name="descricao" required></textarea>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Adicionar Categoria</button>
            </div>
          </fieldset>
        </form>
      </section>
      </form>
      <!-- Seção Deletar -->
      <section class="section section-deletar" aria-labelledby="deletar-mp">
        <h2 id="deletar-mp" class="section-title">Deletar Categoria </h2>
        <form action="../../FUNCAO/fcadastro_categoria.php" method="GET" class="form form-deletar">
          <fieldset class="fieldset">
            <legend class="legend">Selecione a Categoria para Excluir</legend>
            <div class="form-group">
              <label for="delete_id">ID da Categoria a ser deletada:</label>
              <select id="delete_id" name="delete_id" required>
                <?php
                require_once '../../DADOS/config.php';
                $sql = "SELECT id_cat, nome_cat FROM categoria";
                $res = $conexao->query($sql);
                while ($row = $res->fetch_assoc()) {
                  echo "<option value='{$row['id_cat']}'>{$row['nome_cat']} (ID: {$row['id_cat']})</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-danger">Deletar Categoria</button>
            </div>
          </fieldset>
        </form>
      </section>

      <!-- Seção Listar -->
      <section class="section section-listar" aria-labelledby="listar-categoria">
        <h2 id="listar-categoria" class="section-title">Todas as Categorias</h2>
        <div class="table-container">
          <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary">
              <tr>
                <th>ID</th>
                <th>Nome da Categoria</th>
                <th>Descrição</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../../DADOS/config.php';
              $todas = $conexao->query("SELECT * FROM categoria");

              if ($todas->num_rows > 0) {
                while ($row = $todas->fetch_assoc()) {
                  echo "<tr>
                    <td>{$row['id_cat']}</td>
                    <td>{$row['nome_cat']}</td>
                    <td>{$row['descricao']}</td>
                  </tr>";
                }
              } else {
                echo "<tr><td colspan='3'>Nenhuma categoria encontrada.</td></tr>";
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

  <script src="../../../public/assets/js/script.js"></script>

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
</body>

</html>