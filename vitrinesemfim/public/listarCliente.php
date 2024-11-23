<?php 
// Verifica se o usuário está logado, garantindo acesso autorizado
require_once "../controle/verificaLogado.php";
?>
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
    <h2>Lista de Clientes</h2> <!-- Título da página -->

    <!-- Tabela para exibir a lista de clientes -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th> <!-- Coluna para o ID do cliente -->
                <th scope="col">Nome</th> <!-- Coluna para o nome do cliente -->
                <th scope="col">CPF</th> <!-- Coluna para o CPF do cliente -->
                <th scope="col">Telefone</th> <!-- Coluna para o telefone do cliente -->
                <th scope="col">Data de Nascimento</th> <!-- Coluna para a data de nascimento do cliente -->
                <th scope="col">Endereço</th> <!-- Coluna para o endereço do cliente -->
                <th scope="col">Email</th> <!-- Coluna para o email do cliente -->
                <th scope="col">Ações</th> <!-- Coluna para as ações (editar e excluir) -->
            </tr>
        </thead>
        <?php
        // Conecta ao banco de dados para recuperar os dados dos clientes
        require_once "../controle/conexao.php";

        // Consulta SQL para selecionar todos os clientes
        $sql = "SELECT * FROM cliente";
        $resultados = mysqli_query($conexao, $sql); // Executa a consulta
        $id = 0;

        // Loop para processar cada linha de resultado
        while ($linha = mysqli_fetch_array($resultados)) {
            $id = $linha['idcliente']; // Obtém o ID do cliente
            $nome = $linha['nome']; // Obtém o nome do cliente
            $cpf = $linha['cpf']; // Obtém o CPF do cliente
            $telefone = $linha['telefone']; // Obtém o telefone do cliente
            $data_nascimento = $linha['data_nascimento']; // Obtém a data de nascimento do cliente
            $endereco = $linha['endereco']; // Obtém o endereço do cliente
            $email = $linha['email']; // Obtém o email do cliente

            // Exibe os dados do cliente na tabela
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$id</th>"; // Exibe o ID do cliente
            echo "<td>$nome</td>"; // Exibe o nome do cliente
            echo "<td>$cpf</td>"; // Exibe o CPF do cliente
            echo "<td>$telefone</td>"; // Exibe o telefone do cliente
            echo "<td>$data_nascimento</td>"; // Exibe a data de nascimento do cliente
            echo "<td>$endereco</td>"; // Exibe o endereço do cliente
            echo "<td>$email</td>"; // Exibe o email do cliente
            // Link para apagar o cliente
            echo "<td><a href='../controle/deletarCliente.php?id=$id' class='btn btn-danger'>Apagar</a></td>";
            // Link para editar os dados do cliente
            echo "<td><a href='clienteform.php?id=$id'>Editar</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>

    <!-- Link para voltar à página inicial -->
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>
