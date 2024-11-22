<?php
require_once "../controle/verificaLogado.php"; // Verifica se o usuário está logado
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
    <link rel="stylesheet" href="./css/pagecadastro.css"> <!-- Seu arquivo de estilo customizado -->
    <title>Cadastro - Vitrine sem fim</title>
</head>

<body>
    <?php
    require_once 'menu.php';  // Inclui o menu lateral
    ?>

    <div class="container cadastro-container">
        <h2 class="text-center text-uppercase"><i><b>Cadastro</b></i></h2>

        <div class="cadastro-box">
            <fieldset>
                <legend>Cadastro de Itens</legend>
                <div class="form-group">
                    <a href="clienteform.php" class="btn btn-cadastro">Pesquisar Cliente</a>
                </div>
                <div class="form-group">
                    <a href="autorform.php" class="btn btn-cadastro">Pesquisar Autor</a>
                </div>
                <div class="form-group">
                    <a href="form_vendedor.php" class="btn btn-cadastro">Pesquisar Vendedor</a>
                </div>
                <div class="form-group">
                    <a href="pesquisar.php" class="btn btn-cadastro">Pesquisar Pagamento</a>
                </div>
                <div class="form-group">
                    <a href="pesquisar.php" class="btn btn-cadastro">Pesquisar Empréstimo</a>
                </div>
                <div class="form-group">
                    <a href="pesquisarLivro.php" class="btn btn-cadastro">Pesquisar Livro</a>
                </div>
            </fieldset>
        </div>
    </div>

    <script src="menu.js"></script>
</body>

</html>
