<?php
// Inclui o arquivo que verifica se o usuário está logado
require_once "../controle/verificaLogado.php"; 

// Verifica se a variável 'valor' foi passada pela URL e define seu valor
if (isset($_GET['valor'])) {
    $valor = $_GET['valor']; // Se 'valor' está presente, armazena-o na variável $valor
} else {
    $valor = ''; // Caso contrário, define $valor como uma string vazia
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
    <form action="pesquisarAutor.php" method="get">
        Nome: <br>
        <input class="searchbar" type="text" name="valor" value="<?php echo $valor; ?>" placeholder="Pesquise um autor..."> <br><br>

        <input type="submit" value="Enviar"> <!-- Botão de envio -->
    </form> <br>

    <?php
    // Verifica se foi enviado um valor para pesquisa através da URL
    if (isset($_GET['valor'])) {
        // Conecta ao banco de dados
        require_once "../controle/conexao.php";
        
        // Consulta SQL para buscar autores cujo nome contém o valor passado
        $sql = "SELECT * FROM autor WHERE nome LIKE '%$valor%'";
        $resultados = mysqli_query($conexao, $sql); // Executa a consulta no banco de dados

        // Verifica se existem resultados da consulta
        if (mysqli_num_rows($resultados) == 0) {
            echo "Não foram encontrados resultados."; // Exibe mensagem caso nenhum autor seja encontrado
        } else {
            // Caso existam resultados, cria uma tabela para exibir os dados
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>ID</td>"; // Coluna para o ID do autor
            echo "<td>Nome</td>"; // Coluna para o nome do autor
            echo "<td>Nacionalidade</td>"; // Coluna para a nacionalidade do autor
            echo "<td>Biografia</td>"; // Coluna para a biografia do autor
            echo "</tr>";
            
            // Loop para exibir todos os autores encontrados
            while ($linha = mysqli_fetch_array($resultados)) {
                $id = $linha['idautor']; // ID do autor
                $nome = $linha['nome']; // Nome do autor
                $nacionalidade = $linha['nacionalidade']; // Nacionalidade do autor
                $biografia = $linha['biografia']; // Biografia do autor
                echo "<tr>";
                echo "<td>$id</td>"; // Exibe o ID
                echo "<td>$nome</td>"; // Exibe o nome
                echo "<td>$nacionalidade</td>"; // Exibe a nacionalidade
                echo "<td>$biografia</td>"; // Exibe a biografia
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
