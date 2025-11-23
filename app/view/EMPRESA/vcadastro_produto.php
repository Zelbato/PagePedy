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
  <title>PedyAçaí - Cadastro Produto</title>
  <link rel="icon" type="image/png" href="../../../public/assets/img/logoOficialTransparentRecortada.png">
  <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/cadastro_produto.css"><!--IMPORTANTE -->
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

  <!-- <div id="toast-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;"></div> -->

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
      <section class="section section-cadastrar active" aria-labelledby="cadastro-mp">
        <h2 id="cadastro-mp" class="section-title">Cadastro de produto</h2>
        <form action="../../FUNCAO/fcadastro_produto.php" method="POST" enctype="multipart/form-data" class="form form-cadastro">
          <fieldset class="fieldset">
            <legend class="legend">Informações do produto</legend>
            <div class="form-group">
              <label for="img_prod">Imagem do Produto:</label>
              <input type="file" id="img_prod" name="img_prod" accept="image/*">
            </div>
            <div class="form-group">
              <label for="categoria_id">Categoria:</label>
              <div class="select-content">
                <select class="tipo-card" id="categoria_id" name="categoria_id" required>
                  <option value="">Selecione...</option>
                  <?php
                  require_once '../../DADOS/config.php';
                  $sql = "SELECT id_cat, nome_cat FROM categoria ORDER BY nome_cat ASC";
                  $res = $conexao->query($sql);
                  while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_cat']}'>{$row['nome_cat']}</option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="nome_prod">Nome do Produto:</label>
              <input type="text" id="nome_prod" name="nome_prod" required>
            </div>
            <div class="form-group">
              <label for="preco">Preço:</label>
              <input type="number" step="0.01" id="preco" name="preco" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição:</label>
              <textarea id="descricao" name="descricao" required></textarea>
            </div>
            <div class="form-group">
              <label for="data_cadastro">Data de Cadastro:</label>
              <input type="date" id="data_cadastro" name="data_cadastro" required>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
            </div>
          </fieldset>
        </form>
      </section>



      <!-- Seção Editar -->
      <section class="section section-editar" aria-labelledby="editar-mp">
        <h2 id="editar-mp" class="section-title">Editar Produto</h2>
        <form action="../../FUNCAO/fedite_produto.php" method="POST" enctype="multipart/form-data" class="form form-editar">
          <fieldset class="fieldset">
            <legend class="legend">Informações para Edição</legend>
            <div class="form-group">
              <div class="select-content">
                <label for="id_prod">Selecione o Produto:</label>
                <select id="id_prod" name="id_prod" required class="tipo-card">
                  <option value="">Selecione...</option>
                  <?php
                  require_once '../../DADOS/config.php';
                  $sql = "SELECT id_prod, nome_prod FROM produto ORDER BY nome_prod ASC";
                  $res = $conexao->query($sql);
                  while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_prod']}'>{$row['nome_prod']}</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="img_prod_edit">Nova Imagem (opcional):</label>
              <input type="file" id="img_prod_edit" name="img_prod" accept="image/*">
            </div>
            <div class="form-group">
              <label for="nome_prod">Nome:</label>
              <input type="text" id="nome_prod" name="nome_prod" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição:</label>
              <textarea id="descricao" name="descricao" required></textarea>
            </div>
            <div class="form-group">
              <label for="preco">Preço:</label>
              <input type="number" step="0.01" id="preco" name="preco" required>
            </div>
            <div class="form-group">
              <label for="quantidade_estoque">Quantidade em Estoque:</label>
              <input type="number" id="quantidade_estoque" name="quantidade_estoque" required>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-secondary">Editar Produto</button>
            </div>
          </fieldset>
        </form>
      </section>

      <!-- Seção Deletar -->
      <section class="section section-deletar" aria-labelledby="deletar-mp">
        <h2 id="deletar-mp" class="section-title">Deletar Produto</h2>
        <form action="../../FUNCAO/fdelete_produto.php" method="GET" class="form form-deletar">
          <fieldset class="fieldset">
            <legend class="legend">Selecione o Produto para Excluir</legend>
            <div class="form-group">
              <label for="id_prod_delete">Selecione o Produto:</label>
              <select id="id_prod_delete" name="id_prod" required>
                <option value="">Selecione...</option>
                <?php
                require_once '../../DADOS/config.php';
                $sql = "SELECT id_prod, nome_prod FROM produto ORDER BY nome_prod ASC";
                $res = $conexao->query($sql);
                while ($row = $res->fetch_assoc()) {
                  echo "<option value='{$row['id_prod']}'>{$row['nome_prod']}</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-danger">Excluir Produto</button>
            </div>
          </fieldset>
        </form>
      </section>


      <section class="section section-listar" aria-labelledby="listar-produtos">
        <h2 id="listar-produtos" class="section-title">Todos os Produtos</h2>
        <div class="table-container">
          <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary">
              <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Data de Cadastro</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT p.id_prod, p.img_prod, p.nome_prod, p.preco, p.descricao, p.data_cadastro, c.nome_cat 
                FROM produto p 
                JOIN categoria c ON p.categoria_id = c.id_cat
                ORDER BY p.nome_prod ASC";
              $res = $conexao->query($sql);

              if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                  $imgTag = !empty($row['img_prod']) ? "<img src='{$row['img_prod']}' width='60'>" : "—";
                  echo "<tr>
                    <td>{$row['id_prod']}</td>
                    <td>$imgTag</td>
                    <td>{$row['nome_prod']}</td>
                    <td>{$row['nome_cat']}</td>
                    <td>R$ {$row['preco']}</td>
                    <td>{$row['descricao']}</td>
                    <td>{$row['data_cadastro']}</td>
                  </tr>";
                }
              } else {
                echo "<tr><td colspan='7'>Nenhum produto cadastrado.</td></tr>";
              }
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
    <small class="creditos">
      Desenvolvido por Calebe | Heitor & João Pedro © 2025
    </small>
  </footer>

  <script src="../../../public/assets/js/script.js"></script>
  <script src="../../../public/assets/js/cadastroProduto.js"></script>

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