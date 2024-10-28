<?php
    require_once "./conexao.php";

    $id = $_GET['id'];
    
    // DELETE FROM paciente WHERE idpaciente = 3;
    $sql = "DELETE FROM vendedor WHERE idvendedor = $id";

    mysqli_query($conexao, $sql);

    header("Location: ../public/listarVendedor.php");
?>