<?php
// se conectar ao banco
// qual o servidor? qual usuario? qual senha? qual banco?
require_once "./conexao.php";

// $acao = $_GET['acao'];
$id = $_GET['id'];

$data_emprestimo = $_POST['data_emprestimo'];
$data_entrega = $_POST['data_entrega'];
$idcliente = $_POST['idcliente'];
$idlivro= $_POST['idlivro'];
$idvendedor = $_POST['idvendedor'];


if ($id == 0) {
    // Criar um comando SQL que grava no banco
    $sql = "INSERT INTO emprestimo (data_emprestimo, data_entrega, idcliente, idlivro, idvendedor) VALUES ('$data_emprestimo', '$data_entrega', '$idcliente', '$idlivro', '$idvendedor')";
} else {
    $sql = "UPDATE emprestimo SET data_emprestimo = '$data_emprestimo', data_entrega = '$data_entrega', idcliente = '$idcliente', idlivro = '$idlivro', idvendedor = '$idvendedor' 
    WHERE idemprestimo = $id";
}

// Mandar executar o comando
mysqli_query($conexao, $sql);

header("Location: ../public/home.php");
