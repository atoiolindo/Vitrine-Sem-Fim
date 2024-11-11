<?php
require_once "../controle/verificaLogado.php";

if (isset($_GET['id'])) {
    // echo "editar";
    require_once "../controle/conexao.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM cliente WHERE idcliente = $id";
    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $cpf = $linha['cpf'];
    $telefone = $linha['telefone'];
    $data = $linha['data_nascimento'];
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
    $data = '';
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
    <h3>Cliente</h3><br>
    <form action="cliente.php?id=<?php echo $id;?>" method="post">


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
                <label for="data_nascimento" class="form-label">Data de nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" id="data_nascimento">
            </div>

            <div>
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" id="endereco">
            </div>

            <div>
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>

            <input type="hidden" name="id" >

            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">

        </div>

    </form>


</body>

</html>