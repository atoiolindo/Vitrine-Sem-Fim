<?php
// se conectar ao banco
// qual o servidor? qual usuario? qual senha? qual banco?
require_once "./conexao.php";

// $acao = $_GET['acao'];
$id = $_GET['id'];

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$data_nascimento = $_POST['nascimento'];
$endereco = $_POST['endereço'];
$email = $_POST['email'];

if ($id == 0) {
    // Criar um comando SQL que grava no banco
    $sql = "INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('$nome', '$cpf', '$telefone', '$data_nascimento', '$endereco', '$email' )";
} else {
    $sql = "UPDATE vendedor SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', data_nascimento = '$data_nascimento', endereco = '$endereco', email = '$email' 
    WHERE idvendedor = $id";
}

// Mandar executar o comando
mysqli_query($conexao, $sql);

header("Location: ../public/home.php");
