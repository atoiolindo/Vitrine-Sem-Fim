<?php 
require_once "../controle/verificaLogado.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Document</title>
    <link rel = "stylesheet" href="./css/estilo.css"> 

</head>

<body class="listar">
    <h2>Lista de Pagamentos</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nome</th>
                <th scope="col">genero</th>
                <th scope="col">autor_idautor</th>
                <th scope="col">isbn</th>
                <th scope="col">estado</th>
            </tr>
        </thead>
        <?php
        require_once "../controle/conexao.php";

        $sql = "SELECT * FROM livro";

        $resultados = mysqli_query($conexao, $sql);
        $i = 0;
        while ($linha = mysqli_fetch_array($resultados)) {
            $i++;
            $nome = $linha['nome'];
            $genero = $linha['genero'];
            $idautor = $linha['autor_idautor'];
            $isbn = $linha['isbn'];
            $estado = $linha['estado'];

            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$i</th>";
            echo "<td>$nome</td>";
            echo "<td>$genero</td>";
            echo "<td>$idautor</td>";
            echo "<td>$isbn</td>";
            echo "<td>$estado</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <a href="home.html" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>