<?php

require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

$id = $_POST['id'];
remove_produto($conexao, $id);
$_SESSION["success"] = "Produto removido com sucesso!";
header("Location: produto-lista.php");
die();

