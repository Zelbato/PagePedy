<?php
require_once "../DADOS/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome_forn = $_POST['nome_forn'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    $stmt = $conexao->prepare("INSERT INTO fornecedor (nome_forn, cnpj, telefone, email, endereco) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome_forn, $cnpj, $telefone, $email, $endereco);

    if ($stmt->execute()) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: 'Fornecedor cadastrado com sucesso!'
            }).then(() => { window.location.href = 'cadastro_fornecedor.php'; });
          </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: 'Erro: " . $stmt->error . "'
            });
          </script>";
    }


    header("Location: ../view/EMPRESA/vcadastro_fornecedor.php");
    exit;
}
