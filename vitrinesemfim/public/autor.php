<?php
// Se conectar ao banco
// Qual o servidor? Qual usuario? Qual senha? Qual banco?
require_once "../controle/conexao.php";

$id = $_GET['id'];
$nome = $_POST['nome'];
$nacionalidade = $_POST['nacionalidade'];
$biografia = $_POST['biografia'];

if ($id == 0) {
    // Criar um comando SQL que grava no banco
    $sql = "INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('$nome', '$nacionalidade', '$biografia')";
} else {
    $sql = "UPDATE autor SET nome = '$nome', nacionalidade = '$nacionalidade', biografia = '$biografia' WHERE idautor = $id";
}

// Mandar executar o comando
mysqli_query($conexao, $sql);

header("Location: autorform.php")
?>