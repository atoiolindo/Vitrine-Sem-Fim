<?php
require_once "../controle/verificaLogado.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Document</title>
    <link rel = "stylesheet" href="./css/estilo.css"> 

</head>

<body class="listar">
    <h2>Lista de Emprestimos</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">data emprestimo</th>
                <th scope="col">data entrega</th>
                <th scope="col">cliente</th>
                <th scope="col">livros</th>
                <th scope="col">vendedor</th>
            </tr>
        </thead>
        <?php
        require_once "../controle/conexao.php";

        $sql = "SELECT * FROM emprestimo";
        $resultados = mysqli_query($conexao, $sql);
        $i = 0;

        while ($linha = mysqli_fetch_array($resultados)) {
            $id = $linha['idemprestimo'];
            $data_emprestimo = $linha['data_emprestimo'];
            $data_entrega = $linha['data_entrega'];
            
            // SELECT nome FROM cliente WHERE idcliente = 1;
            $clientte = $linha['cliente_idcliente'];
            $sql2 = "SELECT nome FROM cliente WHERE idcliente = $paciente";
            $resultados2 = mysqli_query($conexao, $sql2);
            $linha2 = mysqli_fetch_array($resultados2);
            $cliente_nome = $linha2['nome'];

            // SELECT nome FROM livro WHERE idlivro = 1;
            $livro = $linha['livro_idlivro'];
            $sql3 = "SELECT nome FROM livro WHERE idlivro = $livro";
            $resultados3 = mysqli_query($conexao, $sql3);
            $linha3 = mysqli_fetch_array($resultados3);
            $livro_nome = $linha3['livro'];

            // SELECT nome FROM vendedor WHERE idvendedor = 1;
            $vendedor = $linha['vendedor_idvendedor'];
            $sql3 = "SELECT nome FROM vendedor WHERE idvendedor = $vendedor";
            $resultados3 = mysqli_query($conexao, $sql3);
            $linha3 = mysqli_fetch_array($resultados3);
            $livro_nome = $linha3['vendedor'];

            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$i</th>";
            echo "<td>$data</td>";
            echo "<td>$emprestimo</td>";
            echo "<td>$cliente</td>";
            echo "<td>$livro</td>";
            echo "<td>$vendedor</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <a href="home.html" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>