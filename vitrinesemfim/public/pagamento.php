<?php
require_once "../controle/conexao.php";

$id = $_GET['id'];

$atraso = $_POST['atraso'];

$multa = $_POST['multa'];

$final = $_POST['final'];

$idvendedor = $_POST['idvendedor'];
$idemprestimo = $_POST['idemprestimo'];

$pago = $_POST['pago'];

require_once "../controle/conexao.php";

if ($id == 0) {
    $sql = "INSERT INTO pagamento (atraso, multa, valor_final, vendedor_idvendedor, emprestimo_idemprestimo, valor_pago) VALUES ('$atraso', '$multa', '$final', '$idvendedor', '$idemprestimo', '$pago')";
} else {
    $sql = "UPDATE pagamento SET atraso = '$atraso', multa = '$multa', valor_final = '$final', vendedor_idvendedor = '$idvendedor', emprestimo_idemprestimo = '$idemprestimo', valor_pago = '$pago' WHERE idpagamento = $id";
}
mysqli_query($conexao, $sql);

header("Location: ../public/home.php");
