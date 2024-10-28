<?php
    $nome = $_GET['nome'];
    $nacionalidade = $_GET['nacionalidade'];
    $biografia = $_GET['biografia'];

    // echo $nome;
    // echo '<br>';
    // echo $nacionalidade;
    // echo '<br>';
    // echo $biografia;

    require_once "../controle/conexao.php";

    $sql = "INSERT INTO autor (nome, nacionalidade, biografia) VALUES ('$nome', '$nacionalidade', '$biografia')";

    mysqli_query($conexao, $sql);

    header("Location: autorform.php")

    ?>
