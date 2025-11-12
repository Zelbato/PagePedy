<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

  <div id="toast-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;"></div>


  <main class="main-content">
    <!-- Coluna de Botões -->
    <div class="actions-bar">
      <button class="active" data-card="cadastrar">Cadastrar</button>
      <button data-card="editar">Editar</button>
      <button data-card="deletar">Deletar</button>
      <button data-card="listar">Listar</button>
    </div>


    <form action="../../FUNCAO/fcadastro_fornecedor.php" method="POST">
        <h2>Cadastro de Fornecedor</h2>
        
        <label for="nome_forn">Nome do Fornecedor:</label>
        <input type="text" id="nome_forn" name="nome_forn" required>
        
        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj">
        
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco">
        
        <button type="submit">Cadastrar Fornecedor</button>
    </form>

 

    <h2>Deletar Fornecedor</h2>
    <form action="../../FUNCAO/fdelete_fornecedor.php" method="GET">
        <label for="delete_id">ID do Fornecedor:</label>
        <input type="text" id="delete_id" name="delete_id" required>
        <button type="submit">Deletar Fornecedor</button>

        

    </form>

    <h2>Editar Fornecedor</h2>
    <form action="../../FUNCAO/fedite_fornecedor.php" method="POST">
        <label for="id_forn">ID do Fornecedor:</label>
        <input type="text" id="id_forn" name="id_forn" required>

        <label for="nome_forn">Nome do Fornecedor:</label>
        <input type="text" id="nome_forn" name="nome_forn" required>
        
        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj">
        
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco">
        
        <button type="submit">Editar Fornecedor</button>
    </form>



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
        
        while($row = $result->fetch_assoc()) {
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