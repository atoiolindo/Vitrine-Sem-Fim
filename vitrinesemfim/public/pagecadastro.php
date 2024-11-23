<?php
// Verifica se o usuário está logado antes de carregar a página
require_once "../controle/verificaLogado.php"; 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade para dispositivos móveis -->
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Inclui os estilos do framework Bootstrap -->
    <link rel="stylesheet" href="./css/pagecadastro.css"> <!-- Inclui o arquivo CSS customizado para a página -->
    <title>Cadastro - Vitrine sem fim</title> <!-- Título da página -->
</head>

<body>
    <?php
    // Inclui o menu lateral para navegação
    require_once 'menu.php';  
    ?>

    <!-- Container principal da página de cadastro -->
    <div class="container cadastro-container">
        <!-- Título da página -->
        <h2 class="text-center text-uppercase"><i><b>Cadastro</b></i></h2>

        <!-- Caixa de opções de cadastro -->
        <div class="cadastro-box">
            <fieldset> <!-- Cria uma seção agrupada com borda e legenda -->
                <legend>Cadastro de Itens</legend> <!-- Legenda da seção -->

                <!-- Botão para cadastrar cliente -->
                <div class="form-group">
                    <a href="clienteform.php" class="btn btn-cadastro">Cadastrar Cliente</a>
                </div>

                <!-- Botão para cadastrar autor -->
                <div class="form-group">
                    <a href="autorform.php" class="btn btn-cadastro">Cadastrar Autor</a>
                </div>

                <!-- Botão para cadastrar vendedor -->
                <div class="form-group">
                    <a href="form_vendedor.php" class="btn btn-cadastro">Cadastrar Vendedor</a>
                </div>

                <!-- Botão para cadastrar pagamento -->
                <div class="form-group">
                    <a href="formpagamento.php" class="btn btn-cadastro">Cadastrar Pagamento</a>
                </div>

                <!-- Botão para cadastrar empréstimo -->
                <div class="form-group">
                    <a href="formemprestimo.php" class="btn btn-cadastro">Cadastrar Empréstimo</a>
                </div>

                <!-- Botão para cadastrar livro -->
                <div class="form-group">
                    <a href="formlivro.php" class="btn btn-cadastro">Cadastrar Livro</a>
                </div>
            </fieldset>
        </div>
    </div>

    <!-- Inclui o script para funcionalidades do menu -->
    <script src="menu.js"></script>
</body>

</html>
