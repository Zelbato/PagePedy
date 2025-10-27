<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Monte seu Açaí</title>
    <style>
    /* ======= ESTILO GERAL ======= */
body {
    font-family: "Poppins", sans-serif;
    background: #f7f9fb;
    color: #333;
    margin: 0;
    padding: 0;
}

/* ======= FORMULÁRIO ======= */
form {
    max-width: 600px;
    margin: 50px auto;
    background: #fff;
    padding: 25px 40px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* ======= SEÇÕES ======= */
.section {
    margin-bottom: 35px;
}

.section h2 {
    font-size: 1.3rem;
    color: #007bff;
    border-left: 5px solid #007bff;
    padding-left: 10px;
    margin-bottom: 15px;
}

/* ======= INPUTS ======= */
label {
    display: block;
    font-size: 1rem;
    margin: 8px 0;
    cursor: pointer;
}

input[type="radio"],
input[type="checkbox"] {
    accent-color: #007bff; /* cor do check e radio */
    transform: scale(1.2);
    margin-right: 8px;
}

/* ======= LISTA DE ACOMPANHAMENTOS ======= */
.acomp-list {
    display: grid;
    grid-template-columns: 1fr 1fr; /* duas colunas */
    gap: 8px;
}

@media (max-width: 500px) {
    .acomp-list {
        grid-template-columns: 1fr; /* coluna única no celular */
    }
}

/* ======= BOTÃO ======= */
button {
    width: 100%;
    background: #007bff;
    color: #fff;
    border: none;
    padding: 15px;
    font-size: 1.1rem;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

/* ======= ANIMAÇÃO LEVE ======= */
form {
    animation: fadeIn 0.4s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

    </style>
</head>
<body>

<h1>Monte seu Açaí 🍧</h1>

<form action="../view/vfinalizar_pedido.php" method="POST">

   
    <div class="section">
        <h2>1️⃣ Escolha o tamanho da base:</h2>
        <?php
        require_once '../DADOS/config.php';
        $sql = "SELECT id_prod, nome_prod, preco FROM produto 
                JOIN categoria ON produto.categoria_id = categoria.id_cat 
                WHERE categoria.nome_cat = 'Base'";
        $res = $conexao->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<label>
                        <input type='radio' name='base_id' value='{$row['id_prod']}' required> 
                        <b>{$row['nome_prod']}</b> - R$ " . number_format($row['preco'], 2, ',', '.') . "<br>
      
                      </label><br><br>";
            }
        } else {
            echo "<p>Nenhuma base disponível.</p>";
        }
        ?>
    </div>

   
    <div class="section">
        <h2>2️⃣ Escolha seus acompanhamentos:</h2>
        <div class="acomp-list">
        <?php
        $sql = "SELECT id_mp, nome_mp, preco_unitario FROM materia_prima WHERE tipo_mp = 'acompanhamento'";
        $res = $conexao->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<label>
                        <input type='checkbox' name='acompanhamentos[{$row['id_mp']}]' value='{$row['id_mp']}'>
                        {$row['nome_mp']} - R$ " . number_format($row['preco_unitario'], 2, ',', '.') . "
                      </label><br>";
            }
        } else {
            echo "<p>Nenhum acompanhamento disponível.</p>";
        }
        ?>
        </div>
    </div>

    <button type="submit">➡️ Finalizar Pedido</button>
</form>

</body>
</html>
