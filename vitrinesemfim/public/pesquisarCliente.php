<?php
// Inclui o arquivo que verifica se o usuário está logado, garantindo que apenas usuários autenticados acessem a página
require_once "../controle/verificaLogado.php"; 

// Verifica se a variável 'valor' foi passada pela URL via método GET
if (isset($_GET['valor'])) {
    $valor = $_GET['valor']; // Se 'valor' foi passado, armazena o valor na variável $valor
} else {
    $valor = ''; // Caso contrário, define a variável $valor como uma string vazia
}
?>

<!DOCTYPE html>
<html lang="en"> <!-- Define o idioma da página como inglês -->

<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna a página responsiva -->
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
    <link rel="stylesheet" href="./css/pesquisar.css"> <!-- Link para o arquivo de estilo customizado -->
    <title>Document</title> <!-- Título da página -->
</head>

<body>
    <!-- Formulário de pesquisa -->
    <form action="pesquisarCliente.php" method="get">
        Nome: <br>
        <!-- Campo de pesquisa de clientes com o valor anterior preenchido automaticamente -->
        <input placeholder="Pesquise um cliente..." class="searchbar" type="text" name="valor" value="<?php echo $valor; ?>"> <br><br>

        <input type="submit" value="Enviar"> <!-- Botão de envio -->
    </form> <br>

    <?php
    // Verifica se a variável 'valor' foi passada na URL
    if (isset($_GET['valor'])) {
        // Conecta ao banco de dados
        require_once "../controle/conexao.php";

        // Consulta SQL para buscar clientes cujo nome contenha o valor passado
        $sql = "SELECT * FROM cliente WHERE nome LIKE '%$valor%'";
        $resultados = mysqli_query($conexao, $sql); // Executa a consulta no banco de dados

        // Verifica se existem resultados da consulta
        if (mysqli_num_rows($resultados) == 0) {
            echo "Não foram encontrados resultados."; // Exibe mensagem caso nenhum cliente seja encontrado
        } else {
            // Caso existam resultados, cria uma tabela para exibir os dados
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>ID</td>"; // Coluna para o ID do cliente
            echo "<td>Nome</td>"; // Coluna para o nome do cliente
            echo "<td>CPF</td>"; // Coluna para o CPF do cliente
            echo "<td>Telefone</td>"; // Coluna para o telefone do cliente
            echo "<td>Data de Nascimento</td>"; // Coluna para a data de nascimento
            echo "<td>Endereço</td>"; // Coluna para o endereço
            echo "<td>Email</td>"; // Coluna para o e-mail
            echo "</tr>";
            
            // Loop para exibir todos os clientes encontrados
            while ($linha = mysqli_fetch_array($resultados)) {
                $id = $linha['idcliente']; // ID do cliente
                $nome = $linha['nome']; // Nome do cliente
                $cpf = $linha['cpf']; // CPF do cliente
                $telefone = $linha['telefone']; // Telefone do cliente
                $data_nascimento = $linha['data_nascimento']; // Data de nascimento do cliente
                $endereco = $linha['endereco']; // Endereço do cliente
                $email = $linha['email']; // Email do cliente

                // Exibe os dados de cada cliente dentro de uma linha da tabela
                echo "<tr>";
                echo "<td>$id</td>"; // Exibe o ID
                echo "<td>$nome</td>"; // Exibe o nome
                echo "<td>$cpf</td>"; // Exibe o CPF
                echo "<td>$telefone</td>"; // Exibe o telefone
                echo "<td>$data_nascimento</td>"; // Exibe a data de nascimento
                echo "<td>$endereco</td>"; // Exibe o endereço
                echo "<td>$email</td>"; // Exibe o e-mail
                echo "</tr>";
            }
            echo "</table>"; // Fecha a tabela
        }
    } else {
        // Caso o campo de pesquisa esteja vazio, exibe uma mensagem
        echo "Digite um nome para pesquisar.";
    }
    ?>
</body>

</html>
