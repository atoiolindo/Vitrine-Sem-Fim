<?php 
// Verifica se o usuário está logado antes de permitir o acesso à página
require_once "../controle/verificaLogado.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres da página -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna a página responsiva -->
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
    <title>Document</title>
    <link rel = "stylesheet" href="./css/estilo.css"> <!-- Link para o CSS personalizado -->
</head>

<body class="listar">
    <h2>Lista de Vendedores</h2> <!-- Título da página -->

    <!-- Tabela para exibir os vendedores -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope= "col">#</th> <!-- Coluna para o ID do vendedor -->
                <th scope= "col">Nome</th> <!-- Coluna para o nome do vendedor -->
                <th scope= "col">CPF</th> <!-- Coluna para o CPF do vendedor -->
                <th scope= "col">Telefone</th> <!-- Coluna para o telefone do vendedor -->
                <th scope= "col">Data de Nascimento</th> <!-- Coluna para a data de nascimento do vendedor -->
                <th scope= "col">Endereço</th> <!-- Coluna para o endereço do vendedor -->
                <th scope= "col">Email</th> <!-- Coluna para o e-mail do vendedor -->
            </tr>
        </thead>
        <?php
        // Conecta ao banco de dados para recuperar os dados dos vendedores
        require_once "../controle/conexao.php";

        // Consulta SQL para selecionar todos os vendedores
        $sql = "SELECT * FROM vendedor";
        $resultados = mysqli_query($conexao, $sql); // Executa a consulta SQL

        // Loop para processar cada linha de resultado
        while ($linha = mysqli_fetch_array($resultados)) {
            // Obtém os dados do vendedor
            $id = $linha['idvendedor'];
            $nome = $linha['nome'];
            $cpf = $linha['cpf'];
            $telefone = $linha['telefone'];
            $data_nascimento = $linha['data_nascimento'];
            $endereco = $linha['endereco'];
            $email = $linha['email'];

            // Exibe os dados do vendedor na tabela
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope= 'row'>$id</th>"; // Exibe o ID do vendedor
            echo "<td>$nome</td>"; // Exibe o nome do vendedor
            echo "<td>$cpf</td>"; // Exibe o CPF do vendedor
            echo "<td>$telefone</td>"; // Exibe o telefone do vendedor
            echo "<td>$data_nascimento</td>"; // Exibe a data de nascimento
            echo "<td>$endereco</td>"; // Exibe o endereço do vendedor
            echo "<td>$email</td>"; // Exibe o e-mail do vendedor
            // Link para apagar o vendedor
            echo "<td><a href='../controle/deletarVendedor.php?id=$id' class='btn btn-danger'>Apagar</a></td>";
            // Link para editar o vendedor
            echo "<td><a href='form_vendedor.php?id=$id'>Editar</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <!-- Link para voltar à página inicial -->
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>
