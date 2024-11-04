<?php

require_once "../controle/conexao.php";

$id = $_GET['id'];

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$data = $_POST['data'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];

if ($id == 0) {
    // Criar um comando SQL que grava no banco
    $sql = "INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('$nome', '$cpf', '$telefone', '$data', '$endereco', '$email')";
} else {
    $sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf', telefone = '$telefone' data_nasciemnto = '$data', endereco = '$endereco', email = '$email' WHERE idcliente = $id";
}

mysqli_query($conexao, $sql);

header("Location: clienteform.php");
