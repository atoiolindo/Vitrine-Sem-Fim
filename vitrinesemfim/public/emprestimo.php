<?php

$id = $_GET['id'];

$data = $_POST['data'];
$emprestimo = $_POST['emprestimo'];
$cliente = $_POST['cliente'];
$livro = $_POST['livro'];
$vendedor = $_POST['vendedor'];

require_once "../controle/conexao.php";

if ($id == 0) {
    $sql = "INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('$data', '$emprestimo', '$cliente', '$livro', '$vendedor')";
} else {
    $sql = "UPDATE emprestimo SET data_emprestimo = '$emprestimo', data_entrega = '$data', cliente_idcliente = '$cliente', livro_idlivro = '$livro', vendedor_idvendedor = '$vendedor' WHERE idemprestimo = $id";
}

mysqli_query($conexao, $sql);

header("Location: formemprestimo.php");
