<?php
    require_once "./conexao.php";

    $id = $_GET['id'];
    
    // DELETE FROM livro WHERE idlivro = 3;
    $sql = "DELETE FROM livro WHERE idlivro = $id";

    mysqli_query($conexao, $sql);

    header("Location: ../public/listarLivro.php");
?>