<?php
// Verifica se o usuário está logado antes de acessar a página
require_once "../controle/verificaLogado.php"; // Inclui o arquivo que realiza a verificação de login
?>

<!DOCTYPE html>
<html lang="pt-br"> <!-- Define o idioma da página como português brasileiro -->

<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna a página responsiva em diferentes dispositivos -->
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o arquivo CSS do Bootstrap para estilização -->
    <link rel="stylesheet" href="./css/pagecadastro.css"> <!-- Link para o seu arquivo de estilo customizado -->
    <title>Cadastro - Vitrine sem fim</title> <!-- Título da página -->
</head>

<body>
    <?php
    // Inclui o menu lateral que provavelmente contém as opções de navegação
    require_once 'menu.php';  
    ?>

    <!-- Container principal para o conteúdo de listagem -->
    <div class="container cadastro-container">
        <h2 class="text-center text-uppercase"><i><b>Listas</b></i></h2> <!-- Título centralizado em letras maiúsculas e estilizado -->

        <!-- Caixa de listagem de itens -->
        <div class="cadastro-box">
            <fieldset>
                <legend>Listagem de Itens</legend> <!-- Legenda para a seção de listagem -->
                
                <!-- Botões para listar diferentes tipos de itens -->
                <div class="form-group">
                    <a href="listarCliente.php" class="btn btn-cadastro">Listar Cliente</a> <!-- Link para listar clientes -->
                </div>
                <div class="form-group">
                    <a href="listarAutor.php" class="btn btn-cadastro">Listar Autor</a> <!-- Link para listar autores -->
                </div>
                <div class="form-group">
                    <a href="listarVendedor.php" class="btn btn-cadastro">Listar Vendedor</a> <!-- Link para listar vendedores -->
                </div>
                <div class="form-group">
                    <a href="listarPagamento.php" class="btn btn-cadastro">Listar Pagamento</a> <!-- Link para listar pagamentos -->
                </div>
                <div class="form-group">
                    <a href="listarEmprestimo.php" class="btn btn-cadastro">Listar Empréstimo</a> <!-- Link para listar empréstimos -->
                </div>
                <div class="form-group">
                    <a href="listarLivro.php" class="btn btn-cadastro">Listar Livro</a> <!-- Link para listar livros -->
                </div>
            </fieldset>
        </div>
    </div>

    <script src="menu.js"></script> <!-- Script do menu lateral, provavelmente para navegação dinâmica -->
</body>

</html>
