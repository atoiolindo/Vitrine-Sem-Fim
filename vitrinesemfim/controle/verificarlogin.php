<?php
require_once "../controle/conexao.php";

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email = '$login' AND senha = '$senha'";

$resultados = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultados) == 0) {
    // usuário não cadastrado
    // ou informou dados errados.
    header("Location: ../public/index.php");
    // echo "sem resultados";
} else {
    // pode acessar.
    session_start();
    $_SESSION['logado'] = 1;
    header("Location: ../public/home.php");
    // echo "com resultados";
}
