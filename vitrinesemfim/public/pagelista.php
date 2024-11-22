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
        <h2 class="text-center text-uppercase"><i><b>Listas</b></i></h2>

        <div class="cadastro-box">
            <fieldset>
                <legend>Listagem de Itens</legend>
                <div class="form-group">
                    <a href="listarCliente.php" class="btn btn-cadastro">Listar Cliente</a>
                </div>
                <div class="form-group">
                    <a href="listarAutor.php" class="btn btn-cadastro">Listar Autor</a>
                </div>
                <div class="form-group">
                    <a href="listarVendedor.php" class="btn btn-cadastro">Listar Vendedor</a>
                </div>
                <div class="form-group">
                    <a href="listarPagamento.php" class="btn btn-cadastro">Listar Pagamento</a>
                </div>
                <div class="form-group">
                    <a href="listarEmprestimo.php" class="btn btn-cadastro">Listar Empréstimo</a>
                </div>
                <div class="form-group">
                    <a href="listarLivro.php" class="btn btn-cadastro">Listar Livro</a>
                </div>
            </fieldset>
        </div>
    </div>

    <script src="menu.js"></script>
</body>

</html>