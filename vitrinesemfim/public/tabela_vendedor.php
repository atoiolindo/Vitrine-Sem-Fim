<?php
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$nascimento = $_POST['nascimento'];
$endereço = $_POST['endereço'];
$email = $_POST['email'];

require_once "../controle/conexao.php";

$sql = "INSERT INTO vendedor (nome, cpf, telefone, data_nascimento, endereco, email) VALUES ('$nome', '$cpf', '$telefone', '$nascimento', '$endereço', '$email')";

mysqli_query($conexao, $sql);

header("Location: tabela_vendedor.html");
?>