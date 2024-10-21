<?php
    $data = $_GET['data'];
    $emprestimo = $_GET['emprestimo'];
    $cliente = $_GET['cliente'];
    $livro = $_GET['livro'];
    $vendedor = $_GET['vendedor'];

    require_once "../controle/conexao.php";

    $sql = "INSERT INTO emprestimo (data_emprestimo, data_entrega, cliente_idcliente, livro_idlivro, vendedor_idvendedor) VALUES ('$data', '$emprestimo', '$cliente', '$livro', '$vendedor')";

    mysqli_query($conexao, $sql);

    header("Location: formemprestimo.php");
    ?>
