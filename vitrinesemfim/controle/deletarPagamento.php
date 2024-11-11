<?php
    require_once "./conexao.php";

    $id = $_GET['id'];
    
    // DELETE FROM autor WHERE idautor = 3;
    $sql = "DELETE FROM pagamento WHERE idpagamento = $id;";

    mysqli_query($conexao, $sql);

    header("Location: ../public/listarPagamento.php");
?>