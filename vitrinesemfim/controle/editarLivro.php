<?php
// Se conectar ao banco
// Qual o servidor? Qual usuario? Qual senha? Qual banco?
require_once "./conexao.php";

// $acao = $_GET['acao'];
$id = $_GET['id'];

$nome = $_POST['nome'];
$genero = $_POST['genero'];
$idautor = $_POST['idautor'];
$isbn = $_POST['isbn'];
$estado = $_POST['estado'];

$sql = "INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('$nome', '$genero', '$idautor', '$isbn', '$estado')";

if ($id == 0) {
    // Criar um comando SQL que grava no banco
    $sql = "INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('$nome', '$genero', '$idautor', '$isbn', '$estado')";

} else {
    $sql = "UPDATE paciente SET nome = '$nome', genero = '$genero', autor_idautor = '$autor_idautor', isbn = '$isbn', estado = '$estado' WHERE idlivro = $id";
}

// Mandar executar o comando
mysqli_query($conexao, $sql);

header("Location: ../public/home.php");