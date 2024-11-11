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
    <h2>Lista de Clientes</h2>

    <table class= "table table-striped">
        <thead>
            <tr>
                <th scope= "col">#</th> <!-- é para definir células de um cabeçalho-->
                <th scope= "col">nome</th>
                <th scope= "col">cpf</th>
                <th scope= "col">telefone</th>
                <th scope= "col">data_nascimento</th>
                <th scope= "col">endereco</th>
                <th scope= "col">email</th>
                <th scope= "col"> Acoes</th>
            </tr>
        </thead>
        <?php
        require_once "../controle/conexao.php";

        $sql = "SELECT * FROM cliente";

        $resultados = mysqli_query($conexao, $sql);
        $i = 0;

        while ($linha = mysqli_fetch_array($resultados)) {
            $i++;
            $nome = $linha['nome'];
            $cpf = $linha['cpf'];
            $telefone = $linha['telefone'];
            $data_nascimento = $linha['data_nascimento'];
            $endereco = $linha['endereco'];
            $email = $linha['email'];

            echo "<tbody>";
            echo "<tr>";
            echo "<th scope= 'row'>$i</th>";
            echo "<td>$nome</td>";
            echo "<td>$cpf</td>";
            echo "<td>$telefone</td>";
            echo "<td>$data_nascimento</td>";
            echo "<td>$endereco</td>";
            echo "<td>$email</td>";
            echo "<td><a href='../controle/deletarCliente.php?id=$id' class='btn btn-danger'>Apagar</a></td>";
            echo "<td><a href='clienteform.php?id=$id'>Editar</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <a href= "home.php" class="btn btn-secondary float-start">Voltar para início</a>
</body>

</html>