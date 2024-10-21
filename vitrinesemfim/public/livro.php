<?php
$nome = $_GET['nome'];
$genero = $_GET['genero'];
$idautor = $_GET['idautor'];
$isbn = $_GET['isbn'];
$estado = $_GET['estado'];

require_once "../controle/conexao.php";

$sql = "INSERT INTO livro (nome, genero, autor_idautor, isbn, estado) VALUES ('$nome', '$genero', '$idautor', '$isbn', '$estado')";

mysqli_query($conexao, $sql);

header("Location: livro.php");
