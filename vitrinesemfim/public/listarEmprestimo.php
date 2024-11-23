<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres da página -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna o site responsivo em dispositivos móveis -->
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css"> <!-- Link para o CSS personalizado -->

</head>

<body class="listar">
    <h2>Lista de Empréstimos</h2> <!-- Título da página -->

    <!-- Tabela para exibir a lista de empréstimos -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th> <!-- Coluna para o ID do empréstimo -->
                <th scope="col">Data Emprestimo</th> <!-- Coluna para a data do empréstimo -->
                <th scope="col">Data Entrega</th> <!-- Coluna para a data de entrega -->
                <th scope="col">Cliente</th> <!-- Coluna para o nome do cliente -->
                <th scope="col">Livros</th> <!-- Coluna para o nome do livro emprestado -->
                <th scope="col">Vendedor</th> <!-- Coluna para o nome do vendedor -->
            </tr>
        </thead>
        <?php
        // Conecta ao banco de dados para recuperar os dados dos empréstimos
        require_once "../controle/conexao.php";

        // Consulta SQL para selecionar todos os empréstimos
        $sql = "SELECT * FROM emprestimo";
        $resultados = mysqli_query($conexao, $sql); // Executa a consulta

        // Loop para processar cada linha de resultado
        while ($linha = mysqli_fetch_array($resultados)) {
            // Obtém os dados do empréstimo
            $id = $linha['idemprestimo'];
            $data = $linha['data_emprestimo'];
            $emprestimo = $linha['data_entrega'];
            $cliente = $linha['cliente_idcliente'];
            $livro = $linha['livro_idlivro'];
            $vendedor = $linha['vendedor_idvendedor'];

            // Consulta para obter o nome do cliente com base no ID
            $sql2 = "SELECT nome FROM cliente WHERE idcliente = $cliente";
            $resultados2 = mysqli_query($conexao, $sql2);
            $linha2 = mysqli_fetch_array($resultados2);
            $cliente_nome = $linha2['nome'];

            // Consulta para obter o nome do livro com base no ID
            $sql3 = "SELECT nome FROM livro WHERE idlivro = $livro";
            $resultados3 = mysqli_query($conexao, $sql3);
            $linha3 = mysqli_fetch_array($resultados3);
            $livro_nome = $linha3['nome'];

            // Consulta para obter o nome do vendedor com base no ID
            $sql4 = "SELECT nome FROM vendedor WHERE idvendedor = $vendedor";
            $resultados4 = mysqli_query($conexao, $sql4);
            $linha4 = mysqli_fetch_array($resultados4);
            $vendedor_nome = $linha4['nome'];

            // Exibe os dados do empréstimo na tabela
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$id</th>"; // Exibe o ID do empréstimo
            echo "<td>$data</td>"; // Exibe a data do empréstimo
            echo "<td>$emprestimo</td>"; // Exibe a data de entrega
            echo "<td>$cliente_nome</td>"; // Exibe o nome do cliente
            echo "<td>$livro_nome</td>"; // Exibe o nome do livro emprestado
            echo "<td>$vendedor_nome</td>"; // Exibe o nome do vendedor
            // Link para apagar o empréstimo
            echo "<td><a href='../controle/deletarEmprestimo.php?id=$id' class='btn btn-danger'>Apagar</a></td>";
            // Link para editar o empréstimo
            echo "<td><a href='formemprestimo.php?id=$id'>Editar</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <!-- Link para voltar à página inicial -->
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>
