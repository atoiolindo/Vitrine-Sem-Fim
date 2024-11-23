<?php
// Inclui o arquivo que verifica se o usuário está logado, garantindo que apenas usuários autenticados acessem a página
require_once "../controle/verificaLogado.php"; 

// Verifica se a variável 'valor' foi passada via URL (método GET)
if (isset($_GET['valor'])) {
    $valor = $_GET['valor']; // Se 'valor' foi passado, armazena o valor na variável $valor
} else {
    $valor = ''; // Se 'valor' não foi passado, define a variável $valor como uma string vazia
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
    <form action="pesquisarLivro.php" method="get">
        Nome: <br>
        <!-- Campo de pesquisa de livros com o valor anterior preenchido automaticamente -->
        <input placeholder="Pesquise um livro..." class="searchbar" type="text" name="valor" value="<?php echo $valor; ?>"> <br><br>

        <input type="submit" value="Enviar"> <!-- Botão de envio -->
    </form> <br>

    <?php
    // Verifica se a variável 'valor' foi passada via GET
    if (isset($_GET['valor'])) {
        // Conecta ao banco de dados
        require_once "../controle/conexao.php";
        
        // Consulta SQL para buscar livros cujo nome contenha o valor passado
        $sql = "SELECT * FROM livro WHERE nome LIKE '%$valor%'";
        $resultados = mysqli_query($conexao, $sql); // Executa a consulta no banco de dados

        // Verifica se existem resultados da consulta
        if (mysqli_num_rows($resultados) == 0) {
            echo "Não foram encontrados resultados."; // Exibe mensagem caso nenhum livro seja encontrado
        } else {
            // Caso existam resultados, cria uma tabela para exibir os dados dos livros
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>ID</td>"; // Coluna para o ID do livro
            echo "<td>Nome</td>"; // Coluna para o nome do livro
            echo "<td>Gênero</td>"; // Coluna para o gênero do livro
            echo "<td>Autor</td>"; // Coluna para o nome do autor
            echo "<td>ISBN</td>"; // Coluna para o ISBN do livro
            echo "<td>Estado</td>"; // Coluna para o estado do livro
            echo "</tr>";

            // Loop para exibir todos os livros encontrados
            while ($linha = mysqli_fetch_array($resultados)) {
                $id = $linha['idlivro']; // ID do livro
                $nome = $linha['nome']; // Nome do livro
                $genero = $linha['genero']; // Gênero do livro
                $autor = $linha['autor_idautor']; // ID do autor
                $isbn = $linha['isbn']; // ISBN do livro
                $estado = $linha['estado']; // Estado do livro

                // Consulta SQL para obter o nome do autor baseado no 'autor_idautor'
                $sql2 = "SELECT nome FROM autor WHERE idautor = $autor";
                $resultados2 = mysqli_query($conexao, $sql2); // Executa a consulta para buscar o nome do autor
                $linha2 = mysqli_fetch_array($resultados2); // Obtém o nome do autor
                $autor_nome = $linha2['nome']; // Armazena o nome do autor

                // Exibe os dados do livro na tabela
                echo "<tr>";
                echo "<td>$id</td>"; // Exibe o ID do livro
                echo "<td>$nome</td>"; // Exibe o nome do livro
                echo "<td>$genero</td>"; // Exibe o gênero do livro
                echo "<td>$autor_nome</td>"; // Exibe o nome do autor
                echo "<td>$isbn</td>"; // Exibe o ISBN do livro
                echo "<td>$estado</td>"; // Exibe o estado do livro
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
