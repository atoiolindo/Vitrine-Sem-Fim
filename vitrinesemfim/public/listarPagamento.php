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
                <th scope="col">atraso</th>
                <th scope="col">multa</th>
                <th scope="col">valor_final</th>
                <th scope="col">vendedor_idvendedor</th>
                <th scope="col">emprestimo_idemprestimo</th>
                <th scope="col">valor_pago</th>
            </tr>
        </thead>
        <?php
        require_once "../controle/conexao.php";

        $sql = "SELECT * FROM pagamento";
        $i = 0;
        $resultados = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_array($resultados)) {
            $i++;
            $atraso = $linha['atraso'];
            $multa = $linha['multa'];
            $final = $linha['valor_final'];
            $idvendedor = $linha['vendedor_idvendedor'];
            $idemprestimo = $linha['emprestimo_idemprestimo'];
            $pago = $linha['valor_pago'];

            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$i</th>";
            echo "<td>$atraso</td>";
            echo "<td>$multa</td>";
            echo "<td>$final</td>";
            echo "<td>$idvendedor</td>";
            echo "<td>$idemprestimo</td>";
            echo "<td>$pago</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>