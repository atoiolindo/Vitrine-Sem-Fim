<?php
// se conectar ao banco
// qual o servidor? qual usuario? qual senha? qual banco?
require_once "./conexao.php";

// $acao = $_GET['acao'];
$id = $_GET['id'];

$nome = $_POST['nome'];
$nacionalidade = $_POST['nacionalidade'];
$biografia = $_POST['biografia'];


if ($id == 0) {
    // Criar um comando SQL que grava no banco
    $sql = "INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('$nome', '$nacionalidade', '$biografia')";
} else {
    $sql = "UPDATE autor SET nome = '$nome', nacionalidade = '$nacionalidade', biografia = '$biografia'
    WHERE idautor = $id";
}

// Mandar executar o comando
mysqli_query($conexao, $sql);

header("Location: ../public/home.php");
