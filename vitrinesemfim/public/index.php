<?php
session_start();
if (isset($_SESSION['logado'])) {
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body>
    <form action="../controle/verificarlogin.php" method="post">


        <div id="borda_cima" class="container" >

            <div>
                <label for="login" class="form-label">
                    <h4><b>Email</b></h4>
                </label>
                <input type="text" name="login" class="form-control" id="login">
            </div>
            <!--  <input type="text" name="login"> <br><br> -->



            <div>
                <h4><label for="senha" class="form-label"></h4>
                    <h4><b>Senha</b></h4>
                </label>
                <h4><input type="password" name="senha" class="form-control" id="senha"></h4>
            </div>
            <!-- <input type="password" name="senha"> <br><br> -->

            <input type="submit" value="Acessar" class="btn btn-secondary mt-3">

        </div>
    </form>
</body>

</html>

