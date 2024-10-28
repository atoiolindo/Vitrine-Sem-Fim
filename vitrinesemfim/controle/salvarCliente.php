<?php
// se conectar ao banco
// qual o servidor? qual usuario? qual senha? qual banco?
require_once "./conexao.php";

// $acao = $_GET['acao'];
$id = $_GET['id'];

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$data = $_POST['data_nascimento'];
$endereco = $_POST['endereco'];
$email = $_POST['email'];

if ($id == 0) {
    // Criar um comando SQL que grava no banco
    $sql = "INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('$nome', '$cpf', '$telefone', '$data', '$endereco', '$email' )";
} else {
    $sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', data_nascimento = '$data', endereco = '$endereco', email = '$email' 
    WHERE idcliente = $id";
}

// Mandar executar o comando
mysqli_query($conexao, $sql);

header("Location: ../public/home.php");
