<?php
require_once "../controle/verificaLogado.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
    <link rel="stylesheet" href="./css/estilo.css">

    <title>Vitrine sem fim</title>
</head>

<body>
    <?php
    require_once 'menu.php';
    ?>
    
    <h2><i><b>Vitrine sem fim</b></i></h2>
    <div class="corpo">
        <fieldset>
            <legend>Cadastrar</legend>
            <a href="clienteform.php" class="btn btn-secondary">Cadastrar cliente</a>
            <a href="autorform.php" class="btn btn-secondary">Cadastrar autor</a>
            <a href="form_vendedor.php" class="btn btn-secondary">Cadastrar vendedor</a>
            <a href="formpagamento.php" class="btn btn-secondary">Cadastrar pagamento</a>
            <a href="formemprestimo.php" class="btn btn-secondary">Cadastrar empréstimo</a>
            <a href="formlivro.php" class="btn btn-secondary">Cadastrar livro</a>
        </fieldset>
        <br><br>
        <fieldset>
            <legend>Listagem</legend>
            <a href="listarAutor.php" class="btn btn-secondary">Listar Autores</a>
            <a href="listarVendedor.php" class="btn btn-secondary">Listar Vendedores</a>
            <a href="listarCliente.php" class="btn btn-secondary">Listar Clientes</a>
            <a href="listarPagamento.php" class="btn btn-secondary">Listar Pagamentos</a>
            <a href="listarLivro.php" class="btn btn-secondary">Listar Livros</a>
            <a href="listarEmprestimo.php" class="btn btn-secondary">Listar Emprestimos</a>
        </fieldset>
        <br><br>
        <fieldset>
            <legend>Pesquisar</legend>
            <a href="pesquisarAutor.php" class="btn btn-secondary">Pesquisar Autores</a>
            <a href="pesquisarVendedor.php" class="btn btn-secondary">Pesquisar Vendedores</a>
            <a href="pesquisarCliente.php" class="btn btn-secondary">Pesquisar Clientes</a>
            <a href="pesquisarLivro.php" class="btn btn-secondary">Pesquisar Livros</a>
        </fieldset>
    </div>
</body>

</html>