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
                    <a href="clienteform.php" class="btn btn-cadastro">Cadastrar Cliente</a>
                </div>
                <div class="form-group">
                    <a href="autorform.php" class="btn btn-cadastro">Cadastrar Autor</a>
                </div>
                <div class="form-group">
                    <a href="form_vendedor.php" class="btn btn-cadastro">Cadastrar Vendedor</a>
                </div>
                <div class="form-group">
                    <a href="formpagamento.php" class="btn btn-cadastro">Cadastrar Pagamento</a>
                </div>
                <div class="form-group">
                    <a href="formemprestimo.php" class="btn btn-cadastro">Cadastrar Empréstimo</a>
                </div>
                <div class="form-group">
                    <a href="formlivro.php" class="btn btn-cadastro">Cadastrar Livro</a>
                </div>
            </fieldset>
        </div>
    </div>

    <script src="menu.js"></script>
</body>

</html>
