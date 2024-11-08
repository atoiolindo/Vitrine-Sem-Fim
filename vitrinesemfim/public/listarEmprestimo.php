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
            $i++;
            $data = $linha['data_emprestimo'];
            $emprestimo = $linha['data_entrega'];
            $cliente = $linha['cliente_idcliente'];
            $livro = $linha['livro_idlivro'];
            $vendedor = $linha['vendedor_idvendedor'];

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
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>