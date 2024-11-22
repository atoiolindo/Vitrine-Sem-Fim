<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css">

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
        while ($linha = mysqli_fetch_array($resultados)) {
            $id = $linha['idemprestimo'];
            $data = $linha['data_emprestimo'];
            $emprestimo = $linha['data_entrega'];
            $cliente = $linha['cliente_idcliente'];
            $livro = $linha['livro_idlivro'];
            $vendedor = $linha['vendedor_idvendedor'];

             // SELECT nome FROM cliente WHERE idpaciente = 1;
             $cliente = $linha['cliente_idcliente'];
             $sql2 = "SELECT nome FROM cliente WHERE idcliente = $cliente";
             $resultados2 = mysqli_query($conexao, $sql2);
             $linha2 = mysqli_fetch_array($resultados2);
             $cliente_nome = $linha2['nome'];
 
             // SELECT nome FROM livro WHERE idmedico = 1;
             $livro = $linha['livro_idlivro'];
             $sql3 = "SELECT nome FROM livro WHERE idlivro = $livro";
             $resultados3 = mysqli_query($conexao, $sql3);
             $linha3 = mysqli_fetch_array($resultados3);
             $livro_nome = $linha3['nome'];

               // SELECT nome FROM vendedor WHERE idmedico = 1;
             $vendedor = $linha['vendedor_idvendedor'];
             $sql4 = "SELECT nome FROM vendedor WHERE idvendedor = $vendedor";
             $resultados4 = mysqli_query($conexao, $sql4);
             $linha4 = mysqli_fetch_array($resultados4);
             $vendedor_nome = $linha4['nome'];



            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$id</th>";
            echo "<td>$data</td>";
            echo "<td>$emprestimo</td>";
            echo "<td>$cliente_nome</td>";
            echo "<td>$livro_nome</td>";
            echo "<td>$vendedor_nome</td>";
            echo "<td><a href='../controle/deletarEmprestimo.php?id=$id' class='btn btn-danger'>Apagar</a></td>";
            echo "<td><a href='formemprestimo.php?id=$id'>Editar</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>