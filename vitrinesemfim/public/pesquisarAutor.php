<?php
require_once "../controle/verificaLogado.php";

if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
} else {
    $valor = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Document</title>
</head>

<body>
    <form action="pesquisarAutor.php" method="get">
        Nome: <br>
        <input type="text" name="valor" value="<?php echo $valor; ?>"> <br><br>

        <input type="submit" value="Enviar">
    </form> <br>

    <?php

    if (isset($_GET['valor'])) {
        // $valor = $_GET['valor'];

        require_once "../controle/conexao.php";
        $sql = "SELECT * FROM autor WHERE nome LIKE '%$valor%'";
        $resultados = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultados) == 0) {
            echo "Não foram encontrados resultados.";
        } else {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>ID</td>";
            echo "<td>Nome</td>";
            echo "<td>Nacionalidade</td>";
            echo "<td>Biografia</td>";
            while ($linha = mysqli_fetch_array($resultados)) {
                $id = $linha['idcliente'];
                $nome = $linha['nome'];
                $nacionalidade = $linha['nacionalidade'];
                $biografia = $linha['biografia'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nome</td>";
                echo "<td>$nacionalidade</td>";
                echo "<td>$biografia</td>";
                echo "</tr>";
            }
        }
    } else {
        echo "Digite um nome para pesquisar.";
    }
    ?>
</body>

</html>