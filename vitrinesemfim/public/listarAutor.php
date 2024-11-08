<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
    <title>Document</title>
    <link rel = "stylesheet" href="./css/estilo.css"> 


</head>

<body class="listar">
    <h2>Lista de Autores</h2>


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Nacionalidade</th>
                <th scope="col">Biografia</th>
            </tr>
        </thead>
        <?php
        require_once "../controle/conexao.php";

        $sql = "SELECT * FROM autor";

        $resultados = mysqli_query($conexao, $sql);
        $i = 0;
        while ($linha = mysqli_fetch_array($resultados)) {
            $i++;
            $nome = $linha['nome'];
            $nacionalidade = $linha['nacionalidade'];
            $biografia = $linha['biografia'];
        
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$i</th>";
            echo "<td>$nome</td>";
            echo "<td>$nacionalidade</td>";
            echo "<td>$biografia</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>