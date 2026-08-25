<?php

require_once "conexao.php";

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	exit('Acesso inválido. Envie o formulário de cadastro.');
}

$descricao = trim(isset($_POST['descricao']) ? $_POST['descricao'] : '');
$categoria = trim(isset($_POST['categoria']) ? $_POST['categoria'] : '');

$valor_compra = filter_input(INPUT_POST, 'valor_compra', FILTER_VALIDATE_FLOAT);
$valor_venda = filter_input(INPUT_POST, 'valor_venda', FILTER_VALIDATE_FLOAT);
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_INT);

if ($descricao === '' || $categoria === '' || $valor_compra === false || $valor_venda === false || $estoque === false) {
	exit('Preencha os dados corretamente.');
}

$descricaoSeguro = htmlspecialchars($descricao, ENT_QUOTES, 'UTF-8');
$categoriaSegura = htmlspecialchars($categoria, ENT_QUOTES, 'UTF-8');

$compraFormatado = number_format($valor_compra, 2, ',', '.');
$vendaFormatado = number_format($valor_venda, 2, ',', '.');

$sql = "INSERT INTO cadastro_produtos
(descricao_prod, categ_prod, valor_compra, valor_venda, estoque)
VALUES ('$descricao', '$categoria', '$valor_compra', '$valor_venda', '$estoque')";

if (!$conn->query($sql)) {
    die("Erro ao cadastrar: " . $conn->error);
}

echo "<script>
    alert('Produto cadastrado com sucesso!');
    window.location.href = 'controle_produto.php';
</script>";