<?php
$atraso = $_GET['atraso'];

$multa = $_GET['multa'];

$final = $_GET['final'];

$idvendedor = $_GET['idvendedor'];
$idemprestimo = $_GET['idemprestimo'];

$pago = $_GET['pago'];

require_once "../controle/conexao.php";

$sql = "INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('$atraso', '$multa', '$final', '$idvendedor', '$idemprestimo', '$pago')";

mysqli_query($conexao, $sql);

header("Location: formpagamento.php");
