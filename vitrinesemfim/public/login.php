<?php
session_start();
if (isset($_SESSION['logado'])) {
    header("Location: ./public/home.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>

<body>
    <form action="../controle/verificarlogin.php" method="post">


        <div class="container">
            <div class="form">
                <h1 class="title">Faça seu login</h1>
                <form action="#">
                    <div class="input-group">
                        <div class="input-box">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" name="login" placeholder="Digite seu e-mail" required>
                        </div>

                        <div class="input-box">
                            <label for="password">Senha</label>
                            <input id="password" type="password" name="senha" placeholder="Digite sua senha" required>
                        </div>
                    </div>

                    <div class="actions">
                        <button type="submit">Entrar</button>
                        <a href="#" class="forgot-password">Esqueceu sua senha?</a> 
                    </div>
                </form>
            </div>
        </div>
</body>
</html>
