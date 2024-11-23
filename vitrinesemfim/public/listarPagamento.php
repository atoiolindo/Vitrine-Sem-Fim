<?php
// Verifica se o usuário está logado antes de permitir o acesso à página
require_once "../controle/verificaLogado.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres da página -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna o site responsivo em dispositivos móveis -->
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css"> <!-- Link para o CSS personalizado -->
</head>

<body class="listar">
    <h2>Lista de Pagamentos</h2> <!-- Título da página -->

    <!-- Tabela para exibir os pagamentos -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th> <!-- Coluna para o ID do pagamento -->
                <th scope="col">Atraso</th> <!-- Coluna para o valor do atraso -->
                <th scope="col">Multa</th> <!-- Coluna para o valor da multa -->
                <th scope="col">Valor Final</th> <!-- Coluna para o valor final -->
                <th scope="col">Vendedor</th> <!-- Coluna para o nome do vendedor -->
                <th scope="col">Empréstimo</th> <!-- Coluna para o ID do empréstimo -->
                <th scope="col">Valor Pago</th> <!-- Coluna para o valor pago -->
            </tr>
        </thead>
        <?php
        // Conecta ao banco de dados para recuperar os dados de pagamento
        require_once "../controle/conexao.php";

        // Consulta SQL para selecionar todos os pagamentos
        $sql = "SELECT * FROM pagamento";
        $resultados = mysqli_query($conexao, $sql); // Executa a consulta

        // Loop para processar cada linha de resultado
        while ($linha = mysqli_fetch_array($resultados)) {
            // Obtém os dados do pagamento
            $id = $linha['idpagamento'];
            $atraso = $linha['atraso'];
            $multa = $linha['multa'];
            $final = $linha['valor_final'];
            $idvendedor = $linha['vendedor_idvendedor'];
            $idemprestimo = $linha['emprestimo_idemprestimo'];
            $pago = $linha['valor_pago'];

            // Consulta para obter o nome do vendedor com base no ID do vendedor
            $vendedor = $linha['vendedor_idvendedor'];
            $sql2 = "SELECT nome FROM vendedor WHERE idvendedor = $vendedor";
            $resultados2 = mysqli_query($conexao, $sql2);
            $linha2 = mysqli_fetch_array($resultados2);
            $vendedor_nome = $linha2['nome'];

            // Exibe os dados do pagamento na tabela
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>$id</th>"; // Exibe o ID do pagamento
            echo "<td>$atraso</td>"; // Exibe o valor do atraso
            echo "<td>$multa</td>"; // Exibe o valor da multa
            echo "<td>$final</td>"; // Exibe o valor final
            echo "<td>$vendedor_nome</td>"; // Exibe o nome do vendedor
            echo "<td>$idemprestimo</td>"; // Exibe o ID do empréstimo
            echo "<td>$pago</td>"; // Exibe o valor pago
            // Link para apagar o pagamento
            echo "<td><a href='../controle/deletarPagamento.php?id=$id' class='btn btn-danger'>Apagar</a></td>";
            // Link para editar o pagamento
            echo "<td><a href='formpagamento.php?id=$id'>Editar</a></td>";
            echo "</tr>";
            echo "</tbody>";
        }
        ?>
    </table>
    <!-- Link para voltar à página inicial -->
    <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>

</html>
