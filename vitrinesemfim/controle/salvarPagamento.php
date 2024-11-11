<?php
// se conectar ao banco
// qual o servidor? qual usuario? qual senha? qual banco?
require_once "./conexao.php";

// $acao = $_GET['acao'];
$id = $_GET['id'];

$atraso = $_POST['atraso'];
$multa = $_POST['multa'];
$valor_final = $_POST['valor_final'];
$idvendedor = $_POST['idvendedor'];
$idemprestimo = $_POST['idemprestimo'];
$valor_pago = $_POST['valor_pago'];

if ($id == 0) {
    // Criar um comando SQL que grava no banco
    $sql = "INSERT INTO pagamento (atraso, multa, valor_final, idvendedor, idemprestimo, valor_pago) VALUES ('$atraso', '$multa', '$valor_final', '$idvendedor', '$idemprestimo', '$valor_pago' )";
} else {
    $sql = "UPDATE pagamento SET atraso = '$atraso', multa = '$multa', valor_final = '$valor_final', idvendedor = '$idvendedor', idemprestimo = '$idemprestimo', valor_pago = '$valor_pago' 
    WHERE idpagamento = $id";
}

// Mandar executar o comando
mysqli_query($conexao, $sql);

header("Location: ../public/home.php");
