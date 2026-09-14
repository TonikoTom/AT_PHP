<?php

$host = "localhost";
$usuario = "root";
$senha = "usbw";
$banco = "cadastro_produtos";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão com o banco: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
