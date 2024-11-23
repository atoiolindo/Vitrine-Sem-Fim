<?php
// Verifica se o usuário está logado antes de permitir acesso à página
require_once "../controle/verificaLogado.php"; // Inclui o arquivo que realiza a verificação de login
?>

<!DOCTYPE html>
<html lang="pt-br"> <!-- Define o idioma da página como português brasileiro -->

<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna a página responsiva em diferentes dispositivos -->
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="./css/pagecadastro.css"> <!-- Link para o arquivo de estilo customizado -->
    <title>Pesquisar - Vitrine sem fim</title> <!-- Título da página -->
</head>

<body>
    <?php
    // Inclui o menu lateral na página (provavelmente contém as opções de navegação)
    require_once 'menu.php';  
    ?>

    <!-- Container principal para a seção de pesquisa -->
    <div class="container cadastro-container">
        <h2 class="text-center text-uppercase"><i><b>Pesquisa</b></i></h2> <!-- Título centralizado e estilizado -->

        <!-- Caixa de pesquisa de itens -->
        <div class="cadastro-box">
            <fieldset>
                <legend>Pesquisa de Itens</legend> <!-- Legenda para a seção de pesquisa -->
                
                <!-- Links para pesquisar diferentes tipos de itens -->
                <div class="form-group">
                    <a href="pesquisarCliente.php" class="btn btn-cadastro">Pesquisar Cliente</a> <!-- Link para pesquisar clientes -->
                </div>
                <div class="form-group">
                    <a href="pesquisarAutor.php" class="btn btn-cadastro">Pesquisar Autor</a> <!-- Link para pesquisar autores -->
                </div>
                <div class="form-group">
                    <a href="pesquisarVendedor.php" class="btn btn-cadastro">Pesquisar Vendedor</a> <!-- Link para pesquisar vendedores -->
                </div>
                <div class="form-group">
                    <a href="pesquisarLivro.php" class="btn btn-cadastro">Pesquisar Livro</a> <!-- Link para pesquisar livros -->
                </div>
            </fieldset>
        </div>
    </div>

    <!-- Script para o menu lateral -->
    <script src="menu.js"></script> 
</body>

</html>
