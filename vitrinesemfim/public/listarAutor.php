<?php 
// Verifica se o usuário está logado, impedindo acesso não autorizado
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
    <h2>Lista de Autores</h2> <!-- Título da página -->

    <!-- Tabela para exibir a lista de autores -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th> <!-- Coluna para o ID do autor -->
                <th scope="col">Nome</th> <!-- Coluna para o nome do autor -->
                <th scope="col">Nacionalidade</th> <!-- Coluna para a nacionalidade do autor -->
                <th scope="col">Biografia</th> <!-- Coluna para a biografia do autor -->
            </tr>
        </thead>
        <?php
        // Conecta ao banco de dados para recuperar os autores
        require_once "../controle/conexao.php";

        // Consulta SQL para selecionar todos os autores
        $sql = "SELECT * FROM autor";
        $id = 0;
        // Executa a consulta
        $resultados = mysqli_query($conexao, $sql);
        
        // Loop para processar cada linha de resultado
        while ($linha = mysqli_fetch_array($resultados)) {
            $id = $linha['idautor']; // Obtém o ID do autor
            $nome = $linha['nome']; // Obtém o nome do autor
            $nacionalidade = $linha['nacionalidade']; // Obtém a nacionalidade do autor
            $biografia = $linha['biografia']; // Obtém a biografia do autor
        
            // Exibe os dados do autor na tabela
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$id</th>"; // Exibe o ID do autor
            echo "<td>$nome</td>"; // Exibe o nome do autor
            echo "<td>$nacionalidade</td>"; // Exibe a nacionalidade do autor
            echo "<td>$biografia</td>"; // Exibe a biografia do autor
            // Link para apagar o autor
            echo "<td><a href='../controle/deletarAutor.php?id=$id' class='btn btn-danger'>Apagar</a></td>";
            // Link para editar os dados do autor
            echo "<td><a href='autorform.php?id=$id'>Editar</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    
    <!-- Link para voltar à página inicial -->
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>
