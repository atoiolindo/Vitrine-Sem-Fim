<?php
    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $telefone = $_GET['telefone'];
    $data = $_GET['data'];
    $endereco = $_GET['endereco'];
    $email = $_GET['email'];


    require_once "../controle/conexao.php";

    $sql = "INSERT INTO cliente (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('$nome', '$cpf', '$telefone', '$data', '$endereco', '$email')";

    mysqli_query($conexao, $sql);

    header("Location: cliente.html");
    ?>
