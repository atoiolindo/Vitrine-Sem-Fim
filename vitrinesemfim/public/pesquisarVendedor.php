<?php
require_once "../controle/verificaLogado.php";  // Verifica se o usuário está logado

// Verifica se o valor de pesquisa foi passado via URL
if (isset($_GET['valor'])) {
    $valor = $_GET['valor']; // Atribui o valor passado para a variável $valor
} else {
    $valor = '';  // Se não foi passado, define $valor como uma string vazia
}
?>

<!DOCTYPE html>
<html lang="en"> <!-- Define o idioma da página como inglês -->

<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna a página responsiva -->
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
    <link rel="stylesheet" href="./css/pesquisar.css"> <!-- Link para o arquivo de estilo customizado -->
    <title>Pesquisar Vendedor</title> <!-- Título da página -->
</head>

<body>
    <!-- Formulário de pesquisa -->
    <form action="pesquisarVendedor.php" method="get">
        Nome: <br>
        <!-- Campo de pesquisa de vendedores -->
        <input placeholder="Pesquise um vendedor..." class="searchbar" type="text" name="valor" value="<?php echo $valor; ?>"> <br><br>

        <input type="submit" value="Enviar"> <!-- Botão de envio -->
    </form> <br>

    <?php

    // Verifica se a variável 'valor' foi passada via GET
    if (isset($_GET['valor'])) {
        require_once "../controle/conexao.php"; // Conecta ao banco de dados

        // Consulta SQL para buscar vendedores cujo nome contenha o valor passado
        $sql = "SELECT * FROM vendedor WHERE nome LIKE '%$valor%'";
        $resultados = mysqli_query($conexao, $sql); // Executa a consulta no banco de dados

        // Verifica se existem resultados da consulta
        if (mysqli_num_rows($resultados) == 0) {
            echo "Não foram encontrados resultados."; // Exibe mensagem caso nenhum vendedor seja encontrado
        } else {
            // Caso existam resultados, cria uma tabela para exibir os dados dos vendedores
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>ID</td>"; // Coluna para o ID do vendedor
            echo "<td>Nome</td>"; // Coluna para o nome do vendedor
            echo "<td>CPF</td>"; // Coluna para o CPF do vendedor
            echo "<td>Telefone</td>"; // Coluna para o telefone do vendedor
            echo "<td>Data de Nascimento</td>"; // Coluna para a data de nascimento do vendedor
            echo "<td>Endereço</td>"; // Coluna para o endereço do vendedor
            echo "<td>Email</td>"; // Coluna para o email do vendedor
            echo "</tr>";

            // Loop para exibir todos os vendedores encontrados
            while ($linha = mysqli_fetch_array($resultados)) {
                // Atribui os dados de cada vendedor às variáveis
                $id = $linha['idvendedor'];
                $nome = $linha['nome'];
                $cpf = $linha['cpf'];
                $telefone = $linha['telefone'];
                $data_nascimento = $linha['data_nascimento'];
                $endereco = $linha['endereco'];
                $email = $linha['email'];

                // Exibe os dados de cada vendedor na tabela
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nome</td>";
                echo "<td>$cpf</td>";
                echo "<td>$telefone</td>";
                echo "<td>$data_nascimento</td>";
                echo "<td>$endereco</td>";
                echo "<td>$email</td>";
                echo "</tr>"; // Corrige o fechamento da tag <tr>
            }
            echo "</table>"; // Fecha a tabela
        }
    } else {
        echo "Digite um nome para pesquisar."; // Caso o campo de pesquisa esteja vazio
    }
    ?>
</body>

</html>
