<?php
// Verifica se o usuário está logado antes de permitir acesso à página
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
    <h2>Livros</h2> <!-- Título da página -->

    <!-- Tabela para exibir a lista de livros -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th> <!-- Coluna para o ID do livro -->
                <th scope="col">Nome</th> <!-- Coluna para o nome do livro -->
                <th scope="col">Gênero</th> <!-- Coluna para o gênero do livro -->
                <th scope="col">Autor</th> <!-- Coluna para o nome do autor -->
                <th scope="col">ISBN</th> <!-- Coluna para o ISBN do livro -->
                <th scope="col">Estado</th> <!-- Coluna para o estado do livro -->
            </tr>
        </thead>
        <?php
        // Conecta ao banco de dados para recuperar os dados dos livros
        require_once "../controle/conexao.php";

        // Consulta SQL para selecionar todos os livros
        $sql = "SELECT * FROM livro";
        $resultados = mysqli_query($conexao, $sql); // Executa a consulta

        // Loop para processar cada linha de resultado
        while ($linha = mysqli_fetch_array($resultados)) {
            // Obtém os dados do livro
            $id = $linha['idlivro'];
            $nome = $linha['nome'];
            $genero = $linha['genero'];
            $autor = $linha['autor_idautor'];
            $isbn = $linha['isbn'];
            $estado = $linha['estado'];

            // Consulta para obter o nome do autor com base no ID do autor
            $sql2 = "SELECT nome FROM autor WHERE idautor = $autor";
            $resultados2 = mysqli_query($conexao, $sql2);
            $linha2 = mysqli_fetch_array($resultados2);
            $autor_nome = $linha2['nome'];

            // Exibe os dados do livro na tabela
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$id</th>"; // Exibe o ID do livro
            echo "<td>$nome</td>"; // Exibe o nome do livro
            echo "<td>$genero</td>"; // Exibe o gênero do livro
            echo "<td>$autor_nome</td>"; // Exibe o nome do autor
            echo "<td>$isbn</td>"; // Exibe o ISBN do livro
            echo "<td>$estado</td>"; // Exibe o estado do livro
            // Link para apagar o livro
            echo "<td><a href='../controle/deletarLivro.php?id=$id' class='btn btn-danger'>Apagar</a></td>";
            // Link para editar o livro
            echo "<td><a href='formlivro.php?id=$id'>Editar</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <!-- Link para voltar à página inicial -->
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>
