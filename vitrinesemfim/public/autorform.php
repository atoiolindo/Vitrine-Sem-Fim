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
    <form action="autor.php" method="get">
      
        <h3>Autor</h3> <br>
        <div class="container">

            <div>
                <label for="nome" class="form-label">Nome</label>
               <input type="text" name="nome" class="form-control" id="nome">
           </div>
    
           <div>
               <label for="nacionalidade" class="form-label">Nacionalidade</label>
               <input type="text" name="nacionalidade" class="form-control" id="nacionalidade">
           </div>
         
           <div>
               <label for="biografia" class="form-label">Biografia</label>
               <input type="text" name="biografia" class="form-control" id="biografia">
           </div>
          
           
           <a href="home.html" type="submit" class="btn btn-secondary mt -3">Cadastrar</a>

        </div>
    

    </form>
</body>

</html>

<?php
require_once "../controle/verificaLogado.php";

if (isset($_GET['id'])) {
    // echo "editar";
    require_once "../controle/conexao.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM paciente WHERE idpaciente = $id";
    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $cpf = $linha['cpf'];
    $telefone = $linha['telefone'];

    // $acao = "editar";
    $botao = "Salvar";
} else {
    // echo "cadastrar";
    $id = 0;
    $nome = '';
    $cpf = '';
    $telefone = '';

    // $acao = "cadastrar";
    $botao = "Cadastrar";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Cadastro de Paciente</h1>

    <form action="../controle/salvarPaciente.php?id=<?php echo $id; ?>" method="post">
        Nome:
        <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
        CPF:
        <input type="text" name="cpf" class="form-control" value="<?php echo $cpf; ?>">
        Telefone:
        <input type="text" name="telefone" class="form-control" value="<?php echo $telefone; ?>">

        <input type="submit" value="<?php echo $botao; ?>" class="btn btn-primary">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>