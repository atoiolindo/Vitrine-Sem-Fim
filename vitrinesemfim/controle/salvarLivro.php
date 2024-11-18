<?php
// se conectar ao banco
// qual o servidor? qual usuario? qual senha? qual banco?
require_once "./conexao.php";

// $acao = $_GET['acao'];
$id = $_GET['id'];

$nome = $_POST['nome'];
$genero = $_POST['genero'];
$idautor = $_POST['idautor'];
$isbn = $_POST['isbn'];
$estado = $_POST['estado'];


if ($id == 0) {
    // Criar um comando SQL que grava no banco
    $sql = "INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('$nome', '$genero', '$idautor', '$isbn', '$estado')";
} else {
    $sql = "UPDATE livro SET nome = '$nome', genero = '$genero', autor_idautor = '$idautor', isbn = '$isbn', estado = '$estado' 
    WHERE idlivro = $id";
}

// Mandar executar o comando
mysqli_query($conexao, $sql);

header("Location: ../public/home.php");
