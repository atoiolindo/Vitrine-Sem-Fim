<?php
    require_once "./conexao.php";

    $id = $_GET['id'];
    
    // DELETE FROM cliente WHERE idcliente = 3;
    $sql = "DELETE FROM cliente WHERE cliente = $id;";

    mysqli_query($conexao, $sql);

    header("Location: ../public/listarCliente.php");
?>