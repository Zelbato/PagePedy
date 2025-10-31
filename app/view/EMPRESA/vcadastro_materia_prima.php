<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciar Matéria-prima</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../public/assets/css/EMPRESA/cadastroMateriaPrima.css">
</head>

<body>
  <!-- Header -->
  <header class="header" role="banner">
    <nav class="navbar section-content">
      <a href="home.php" class="nav-logo">
        <img src="../../../public/assets/img/logoOficialTransparentRecortada.png" class="img-logo" alt="Logo-PedyAçaí">
        <!-- <h2 class="txt-logo">Pedy<span class="txt-gradient">Açaí</span></h2> -->
      </a>
      <ul class="nav-menu">
        <button id="menuCloseBtn" class="fas fa-times"></button>
        <li class="nav-item"><a href="home.php" class="nav-link primary">Inicio</a></li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link">Cardápio<i class="fa-solid fa-chevron-down"></i></a>
          <ul class="dropdown-menu">
            <li class="nav-ms-link"><a href="vcardapio.php#acai" class="nav-link">Açaí</a></li>
            <li class="nav-ms-link"><a href="vcardapio.php#sorvete" class="nav-link">Sorvetes</a></li>
            <li class="nav-ms-link"><a href="vcardapio.php#milkshake" class="nav-link">Milk-shake</a></li>
            <li class="nav-ms-link"><a href="vcardapio.php#balde" class="nav-link">Baldes</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="#" class="nav-link">Promoções</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Meus Pedidos</a></li>
        <li class="nav-item"><a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a></li>
      </ul>
      <button id="menuOpenBtn" class="fas fa-bars"></button>
    </nav>
  </header>

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
        <h2 id="cadastro-mp" class="section-title">Cadastrar Matéria-prima</h2>
        <form class="form form-cadastro" action="../../FUNCAO/fcadastro_materia_prima.php" method="POST">
          <fieldset class="fieldset field-1">
            <legend class="legend">Informações da Matéria-prima</legend>
            <div class="form-group">
              <label for="nome_mp">Nome:</label>
              <input type="text" id="nome_mp" name="nome_mp" required>
            </div>
            <div class="form-group">
              <label for="tipo_mp">Tipo:</label>
              <div class="select-content">
                <select class="tipo-card" id="tipo_mp" name="tipo_mp" required>
                  <!-- <option value="producao">Produção</option> -->
                  <option value="acompanhamento">Acompanhamento</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="forn_id">Fornecedor:</label>
              <div class="select-content">
                <select class="fornecedor-card" id="forn_id" name="forn_id" required>
                  <?php
                  require_once '../../DADOS/config.php';
                  $sql = "SELECT id_forn, nome_forn FROM fornecedor";
                  $res = $conexao->query($sql);
                  while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['id_forn']}'>{$row['nome_forn']}</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="unidade">Unidade:</label>
              <div class="select-content">
                <select class="unidade-card" id="unidade" name="unidade">
                  <option value="quilograma">Quilograma</option>
                  <option value="gramas">Gramas</option>
                  <option value="litros">Litros</option>
                  <option value="mililitros">Mililitros</option>
                  <option value="metros">Metros</option>
                  <option value="centimetros">Centímetros</option>
                  <option value="tempo">Tempo</option>
                  <option value="unidade">Unidade</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="quantidade">Quantidade:</label>
              <input type="number" id="quantidade" step="0.01" name="quantidade">
            </div>
            <div class="form-group">
              <label for="preco_unitario">Preço Unitário:</label>
              <input type="number" id="preco_unitario" step="0.01" name="preco_unitario">
            </div>
            <div class="form-group">
              <label for="data_compra">Data da Compra:</label>
              <input class="date-card" type="date" id="data_compra" name="data_compra" required>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </fieldset>
        </form>
      </section>

      <!-- Seção Editar -->
      <section class="section section-editar" aria-labelledby="editar-mp">
        <h2 id="editar-mp" class="section-title">Editar Matéria-prima</h2>
        <form class="form form-editar" action="../../FUNCAO/fedite_materia_prima.php" method="POST">
          <fieldset class="fieldset">
            <legend class="legend">Informações para Edição</legend>
            <div class="form-group">
              <label for="id_mp">ID da Matéria-prima:</label>
              <input type="text" id="id_mp" name="id_mp" required>
            </div>
            <div class="form-group">
              <label for="nome_mp_edit">Nome:</label>
              <input type="text" id="nome_mp_edit" name="nome_mp" required>
            </div>
            <div class="form-group">
              <label for="tipo_mp_edit">Tipo:</label>
              <input type="text" id="tipo_mp_edit" name="tipo_mp" required>
            </div>
            <div class="form-group">
              <label for="unid_mp">Unidade:</label>
              <input type="text" id="unid_mp" name="unid_mp" required>
            </div>
            <div class="form-group">
              <label for="qtd_mp">Quantidade:</label>
              <input type="number" id="qtd_mp" name="qtd_mp" required>
            </div>
            <div class="form-group">
              <label for="fornecedor_id_forn">ID do Fornecedor:</label>
              <input type="text" id="fornecedor_id_forn" name="fornecedor_id_forn" required>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-secondary">Editar Matéria-prima</button>
            </div>
          </fieldset>
        </form>
      </section>

      <!-- Seção Deletar -->
      <section class="section section-deletar" aria-labelledby="deletar-mp">
        <h2 id="deletar-mp" class="section-title">Deletar Matéria-prima</h2>
        <form class="form form-deletar" action="../../FUNCAO/fdelete_materia_prima.php" method="GET">
          <fieldset class="fieldset">
            <legend class="legend">Selecione a Matéria-prima para Excluir</legend>
            <div class="form-group">
              <label for="delete_id">ID da Matéria-prima:</label>
              <select class="delete-card" id="delete_id" name="delete_id" required>
                <?php
                require_once '../../DADOS/config.php';
                $sql = "SELECT id_mp, nome_mp FROM materia_prima";
                $res = $conexao->query($sql);
                while ($row = $res->fetch_assoc()) {
                  echo "<option value='{$row['id_mp']}'>{$row['nome_mp']} (ID: {$row['id_mp']})</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-danger">Deletar Matéria-prima</button>
            </div>
          </fieldset>
        </form>
      </section>

      <!-- Seção Listar -->
      <section class="section section-listar" aria-labelledby="listar-mp">
        <h2 id="listar-mp" class="section-title">Todas as Matérias-primas</h2>
        <div class="table-container">
          <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary">
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Fornecedor</th>
                <th>Tipo</th>
                <th>Unidade</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Data da Compra</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../../DADOS/config.php';
              $sql = "SELECT * FROM materia_prima";
              $res = $conexao->query($sql);
              if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>{$row['id_mp']}</td>";
                  echo "<td>{$row['nome_mp']}</td>";
                  echo "<td>{$row['forn_id']}</td>";
                  echo "<td>{$row['tipo_mp']}</td>";
                  echo "<td>{$row['unidade']}</td>";
                  echo "<td>{$row['quantidade']}</td>";
                  echo "<td>{$row['preco_unitario']}</td>";
                  echo "<td>{$row['data_compra']}</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='8'>Nenhuma matéria-prima cadastrada</td></tr>";
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