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
            background-color: #f8f9fa;
            color: #333333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 950px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border: 1px solid #dcdcdc;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        h1 {
            color: #222222;
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0 0 20px 0;
            padding-bottom: 8px;
            border-bottom: 2px solid #eeeeee;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px 20px;
            margin-bottom: 40px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        label {
            font-weight: bold;
            font-size: 0.85rem;
            margin-bottom: 5px;
            color: #444444;
        }

        input {
            width: 100%;
            padding: 9px 12px;
            font-size: 0.95rem;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #fff;
        }

        input:focus {
            border-color: #0056b3;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 86, 179, 0.15);
        }

        .button-group {
            grid-column: span 2;
            display: flex;
            gap: 12px;
            margin-top: 5px;
        }

        button {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #004085;
        }

        .btn-vender {
            background-color: #0056b3;
        }

        .btn-vender:hover {
            background-color: #004085;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        th, td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid #eeeeee;
        }

        th {
            background-color: #f1f3f5;
            color: #333333;
            font-weight: bold;
            border-top: 1px solid #dee2e6;
            border-bottom: 2px solid #dee2e6;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        /* =========================
           AÇÕES
           ========================= */

        .acoes {
            position: relative;
            text-align: center;
            width: 70px;
        }

        .btn-acoes {
            background-color: transparent;
            color: #333333;
            padding: 5px 10px;
            font-size: 1.2rem;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-acoes:hover {
            background-color: #eeeeee;
        }

        .menu-acoes {
            display: none;
            position: absolute;
            right: 10px;
            top: 38px;
            background-color: white;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
            min-width: 110px;
            z-index: 10;
            overflow: hidden;
        }

        .menu-acoes button {
            display: block;
            width: 100%;
            background-color: white;
            color: #333333;
            border: none;
            border-radius: 0;
            padding: 9px 12px;
            text-align: left;
            font-size: 0.85rem;
            font-weight: normal;
        }

        .menu-acoes button:hover {
            background-color: #f1f3f5;
        }

        .menu-acoes .excluir {
            color: #c62828;
        }

        .menu-acoes.aberto {
            display: block;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>📦 Cadastro de Produto</h1>

    <form action="processar.php" method="post">

        <div class="form-group full-width">
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" required>
        </div>

        <div class="form-group">
            <label for="estoque">Estoque:</label>
            <input type="number" id="estoque" name="estoque" required>
        </div>

        <div class="form-group">
            <label for="valor_compra">Valor Compra:</label>
            <input type="number" id="valor_compra" name="valor_compra" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="valor_venda">Valor Venda:</label>
            <input type="number" id="valor_venda" name="valor_venda" step="0.01" required>
        </div>

        <div class="button-group">
            <button type="submit">CADASTRAR PRODUTO</button>
            <button type="button" class="btn-vender">VENDER PRODUTO</button>
        </div>

    </form>

    <h1>📦 Inventário</h1>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Valor Compra</th>
                <th>Valor Venda</th>
                <th>Lucro Unit.</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php
            while ($produto = $resultado->fetch_assoc()) {

                $lucro = $produto['valor_venda'] - $produto['valor_compra'];

                echo "<tr>";

                echo "<td>" . $produto['cod_prod'] . "</td>";

                echo "<td>" . $produto['descricao_prod'] . "</td>";

                echo "<td>" . $produto['categ_prod'] . "</td>";

                echo "<td>R$ " . number_format($produto['valor_compra'], 2, ',', '.') . "</td>";

                echo "<td>R$ " . number_format($produto['valor_venda'], 2, ',', '.') . "</td>";

                echo "<td>R$ " . number_format($lucro, 2, ',', '.') . "</td>";

                echo "<td>" . $produto['estoque'] . "</td>";

                echo "
                <td class='acoes'>

                    <button type='button'
                            class='btn-acoes'
                            onclick='abrirAcoes(this)'>
                        ⋮
                    </button>

                    <div class='menu-acoes'>

                        <button type='button'>
                            ✏ Editar
                        </button>

                        <button type='button' class='excluir'>
                            🗑 Excluir
                        </button>

                    </div>

                </td>";

                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

</div>

<script>

function abrirAcoes(botao) {

    // Fecha todos os outros menus
    document.querySelectorAll('.menu-acoes').forEach(function(menu) {
        if (menu !== botao.nextElementSibling) {
            menu.classList.remove('aberto');
        }
    });

    // Abre/fecha o menu deste produto
    const menu = botao.nextElementSibling;

    menu.classList.toggle('aberto');
}


// Fecha o menu quando clicar fora dele
document.addEventListener('click', function(event) {

    if (!event.target.closest('.acoes')) {

        document.querySelectorAll('.menu-acoes').forEach(function(menu) {
            menu.classList.remove('aberto');
        });

    }

});

</script>

</body>
</html>
