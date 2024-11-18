<?php
if (isset($_GET['id'])) {
    // echo "editar";
    require_once "../controle/conexao.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM vendedor WHERE idvendendor = $id";
    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $cpf = $linha['cpf'];
    $telefone = $linha['telefone'];
    $data_nascimento = $linha['data_nascimento'];
    $endereco = $linha['endereco'];
    $email = $linha['email'];
    // $acao = "editar";
    $botao = "Salvar";
} else {
    // echo "cadastrar";
    $id = 0;
    $nome = '';
    $cpf = '';
    $telefone = '';
    $data_nascimento = '';
    $endereco = '';
    $email = '';

    // $acao = "cadastrar";
    $botao = "Cadastrar";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
</head>

<body class="cadas">
    <form action="../controle/salvarVendedor.php?id=<?php echo $id; ?>" method="post">
        <!-- <div class="mb-3"></div> -->
        <h3>Vendedor</h3> <br>

        <div class="container">
            <div>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" required class="form-control" id="nome">
            </div>

            <div>
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" id="cpf">
            </div>
            <div>
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" id="telefone">
            </div>

            <div>
                <label for="nascimento" class="form-label">Data de nascimento</label>
                <input type="date" name="nascimento" class="form-control" id="nascimento">
            </div>

            <div>
                <label for="endereço" class="form-label">Endereço</label>
                <input type="text" name="endereço" class="form-control" id="endereço">
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>

            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">
        </div>

    </form>

</body>

</html>