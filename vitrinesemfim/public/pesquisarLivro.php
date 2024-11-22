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
    <link rel="stylesheet" href="./css/pesquisar.css">
    <title>Document</title>
</head>

<body>
    <form action="pesquisarLivro.php" method="get">
        Nome: <br>
        <input class="searchbar" type="text" name="valor" value="<?php echo $valor; ?>"> <br><br>

        <input type="submit" value="Enviar">
    </form> <br>

    <?php

    if (isset($_GET['valor'])) {
        // $valor = $_GET['valor'];

        require_once "../controle/conexao.php";
        $sql = "SELECT * FROM livro WHERE nome LIKE '%$valor%'";
        $resultados = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultados) == 0) {
            echo "Não foram encontrados resultados.";
        } else {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>ID</td>";
            echo "<td>Nome</td>";
            echo "<td>Genero</td>";
            echo "<td>Autor</td>";
            echo "<td>ISBN</td>";
            echo "<td>Estado</td>";


            while ($linha = mysqli_fetch_array($resultados)) {
                $id = $linha['idlivro'];
                $nome = $linha['nome'];
                $genero = $linha['genero'];
                $autor = $linha['autor_idautor'];
                $isbn = $linha['isbn'];
                $estado = $linha['estado'];



                // SELECT nome FROM autor WHERE idpaciente = 1;
                $autor = $linha['autor_idautor'];
                $sql2 = "SELECT nome FROM autor WHERE idautor = $autor";
                $resultados2 = mysqli_query($conexao, $sql2);
                $linha2 = mysqli_fetch_array($resultados2);
                $autor_nome = $linha2['nome'];



                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nome</td>";
                echo "<td>$genero</td>";
                echo "<td>$autor_nome</td>";
                echo "<td>$isbn</td>";
                echo "<td>$estado</td>";

                echo "</tr>";
            }
        }
    } else {
        echo "Digite um nome para pesquisar.";
    }
    ?>

</body>

</html>