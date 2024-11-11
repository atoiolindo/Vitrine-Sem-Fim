<?php
require_once "../controle/verificaLogado.php";

if (isset($_GET['id'])) {
    // echo "editar";
    require_once "../controle/conexao.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM autor WHERE idautor = $id";
    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $nacionalidade = $linha['nacionalidade'];
    $biografia = $linha['biografia'];

    // $acao = "editar";
    $botao = "Salvar";
} else {
    // echo "cadastrar";
    $id = 0;
    $nome = '';
    $nacionalidade = '';
    $biografia = '';

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
    
    <form action="../controle/salvarAutor.php?id=<?php echo $id; ?>" method="post">

        <h3>Autor</h3> <br>
        <div class="container">

            <div>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" required class="form-control" id="nome">
            </div>

            <div>
                <label for="nacionalidade" class="form-label">Nacionalidade</label>
                <input type="text" name="nacionalidade" class="form-control" id="nacionalidade">
            </div>

            <div>
                <label for="biografia" class="form-label">Biografia</label>
                <input type="text" name="biografia" class="form-control" id="biografia">
            </div>


            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">

        </div>


    </form>
</body>

</html>