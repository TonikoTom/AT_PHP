<?php
require_once "conexao.php";

$sql = "SELECT * FROM cadastro_produtos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Produtos</title>
<style>

    body {
        background-color: #fffdf8;
        color: #00002c;
        font-family: Arial, sans-serif;
        font-size: 16px;
        margin: 20px;
        padding: 16px;
    }

    .container {
    max-width: 1000px;
    margin: 0 auto;
    }

    h1 {
        color: #00002c;
        font-size: 28px;
        font-weight: bold;
        text-align: left;
        margin: 20px;
    }

    form {
        background-color: #FFFFFF;
        padding: 20px;
        border: 1px solid #CCCCCC;
        border-radius: 5px;
        box-shadow: 0 2px 5px #CCCCCC;
    }

    input {
        width: ;
        padding: ;
        margin: ;
        font-size: ;
        border: ;
        border-radius: ;
    }

    button {
        background-color: #008cff;
        color: white;
        padding: 12px;
        border: ;
        border-radius: 5px;
        font-size: ;
        font-weight: ;
        cursor: ;
    }

    /* ===== BOTÃO AO PASSAR O MOUSE ===== */

    button:hover {
        background-color: ;
    }

    /* ===== TABELA ===== */

    table {
        width: ;
        margin: ;
        border-collapse: ;
        background-color: ;
    }

    /* ===== CABEÇALHO DA TABELA ===== */

    th {
        background-color: ;
        color: ;
        padding: ;
        text-align: ;
        border: ;
    }

    /* ===== CÉLULAS ===== */

    td {
        padding: ;
        text-align: ;
        border: ;
    }

    /* ===== LINHA DA TABELA AO PASSAR O MOUSE ===== */

    tr:hover {
        background-color: ;
    }

</style>
</head>

<body>

  <div class="container">

    <h1>📦 Cadastro de Produto</h1>

    <form action="processar.php" method="post">

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required>

        <label for="valor_compra">Valor Compra:</label>
        <input type="number" id="valor_compra" name="valor_compra" step="0.01" required>

        <label for="valor_venda">Valor Venda:</label>
        <input type="number" id="valor_venda" name="valor_venda" step="0.01" required>

        <label for="estoque">Estoque:</label>
        <input type="number" id="estoque" name="estoque" required>

        <button type="submit">CADASTRAR PRODUTO</button>

    </form>


<h1>📦 Inventários</h1>

    <table>

    <tr>
        <th>Código</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Valor Compra</th>
        <th>Valor Venda</th>
        <th>Lucro Unit.</th>
        <th>Estoque</th>
    </tr>

    <?php

    while ($produto = $resultado->fetch_assoc()) {

        $lucro = $produto['valor_venda'] - $produto['valor_compra'];
        echo "<tr>";
        echo "<td>" . $produto['cod_prod'] . "</td>";
        echo "<td>" . $produto['descricao_prod'] . "</td>";
        echo "<td>" . $produto['categ_prod'] . "</td>";
        echo "<td>R$ " .
            number_format($produto['valor_compra'], 2, ',', '.') .
            "</td>";
        echo "<td>R$ " .
            number_format($produto['valor_venda'], 2, ',', '.') .
            "</td>";
        echo "<td>R$ " .
            number_format($lucro, 2, ',', '.') .
            "</td>";
        echo "<td>" . $produto['estoque'] . "</td>";
        echo "</tr>";
    }
    ?>
    </table>
  </div>
</body>
</html>