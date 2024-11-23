<?php
session_start();
if (isset($_SESSION['logado'])) {
    header("Location: ./public/home.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8"> <!-- Define a codificação como UTF-8 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Garante compatibilidade com o Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsividade para dispositivos móveis -->
    <link rel="stylesheet" href="./css/login.css"> <!-- Inclui o arquivo de estilo personalizado -->
    <title>Login</title> <!-- Título da página -->
</head>

<body>
    <!-- Formulário de login -->
    <form action="../controle/verificarlogin.php" method="post"> <!-- Redireciona os dados para o script de login -->

        <!-- Container principal da página -->
        <div class="container">
            <div class="form"> <!-- Caixa que envolve o formulário -->
                <h1 class="title">Faça seu login</h1> <!-- Título da página de login -->

                <form action="#"> <!-- Define um escopo de formulário -->
                    <!-- Grupo de entradas do formulário -->
                    <div class="input-group">

                        <!-- Entrada de e-mail -->
                        <div class="input-box">
                            <label for="email">E-mail</label> <!-- Rótulo para o campo de e-mail -->
                            <input id="email" type="email" name="login" placeholder="Digite seu e-mail" required> <!-- Campo obrigatório -->
                        </div>

                        <!-- Entrada de senha -->
                        <div class="input-box">
                            <label for="password">Senha</label> <!-- Rótulo para o campo de senha -->
                            <input id="password" type="password" name="senha" placeholder="Digite sua senha" required> <!-- Campo obrigatório -->
                        </div>
                    </div>

                    <!-- Botões de ação -->
                    <div class="actions">
                        <button type="submit">Entrar</button> <!-- Botão para enviar o formulário -->
                        <a href="#" class="forgot-password">Esqueceu sua senha?</a> <!-- Link para recuperar a senha -->
                    </div>
                </form>
            </div>
        </div>
    </form>
</body>

</html>
