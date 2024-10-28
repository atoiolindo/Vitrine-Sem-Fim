echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>Nome</td>";
    echo "<td>Cpf</td>";
    echo "<td>Telefone</td>";
    echo "<td>Data de Nascimento</td>";
    echo "<td>Endereço</td>";
    echo "<td>E-mail</td>";
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
        <title>Document</title>
    </head>

    <body>
        <form action="pesquisarVendedor.php" method="post">
            Nome do Autor: <br>
            <input type="text" name="valor" value="<?php echo $valor; ?>"> <br> <br>

            <input type="submit" value="Pesquisar">

        </form>


        <?php

        if (isset($_GET['valor'])) {
            require_once "../public/conexao.php";
            $sql = "SELECT * FROM autor WHERE nome LIKE '%valor%'";
            $resultados = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultados) == 0) {
                echo "Não encontrado";
            } else {
                echo "<table>";
                echo "<tr>";
                echo "<td>ID</td>";
                echo "<td>Nome</td>";
                echo "<td>Cpf</td>";
                echo "<td>Telefone</td>";
                echo "<td>Data de Nascimento</td>";
                echo "<td>Endereço</td>";
                echo "<td>E-mail</td>";
                while ($linha = mysqli_fetch_array($resultados)) {
                    $id = $linha['idvendedor'];
                    $nome = $linha['nome'];
                    $cpf = $linha['cpf'];
                    $telefone = $linha['telefone'];
                    $data_nascimento = $linha['data_nascimento'];
                    $endereco = $linha['endereco'];
                    $email = $linha['email'];
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$nome</td>";
                    echo "<td>$cpf</td>";
                    echo "<td>$telefone/td>";
                    echo "<td>$data_nascimento</td>";
                    echo "<td>$enderco</td>";
                    echo "<td>$email</td>";
                }
            }
        } else {
            echo "Procure um nome";
        }
        ?>
    </body>

    </html>