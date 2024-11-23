<?php
// Inclui o arquivo que verifica se o usuário está logado
require_once "../controle/verificaLogado.php";

// Verifica se o parâmetro 'id' foi passado via GET (para editar um cliente existente)
if (isset($_GET['id'])) {
    // Inclui o arquivo de conexão com o banco de dados
    require_once "../controle/conexao.php";

    // Recupera o ID do cliente que será editado a partir da URL
    $id = $_GET['id'];

    // Cria a consulta SQL para buscar os dados do cliente com o ID especificado
    $sql = "SELECT * FROM cliente WHERE idcliente = $id";
    $resultado = mysqli_query($conexao, $sql); // Executa a consulta no banco de dados

    // Recupera a linha do resultado da consulta
    $linha = mysqli_fetch_array($resultado);

    // Atribui os valores recuperados do banco às variáveis locais
    $nome = $linha['nome'];
    $cpf = $linha['cpf'];
    $telefone = $linha['telefone'];
    $data = $linha['data_nascimento'];
    $endereco = $linha['endereco'];
    $email = $linha['email'];

    // Define o texto do botão como "Salvar" para edição
    $botao = "Salvar";
} else {
    // Se o parâmetro 'id' não for passado, significa que estamos cadastrando um novo cliente
    // Atribui valores vazios às variáveis para criar um novo cliente
    $id = 0;
    $nome = '';
    $cpf = '';
    $telefone = '';
    $data = '';
    $endereco = '';
    $email = '';

    // Define o texto do botão como "Cadastrar" para criação de um novo cliente
    $botao = "Cadastrar";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definindo o conjunto de caracteres para o documento -->
    <meta charset="UTF-8">
    
    <!-- Definindo a responsividade da página, ajustando a escala para dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link para o CSS personalizado do estilo -->
    <link rel="stylesheet" href="./css/estilo.css">
    
    <title>Document</title>
    
    <!-- Link para o CSS do Bootstrap (para usar componentes prontos como botões e formulários) -->
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body class="cadas">
    <!-- Título da página -->
    <h3>Cliente</h3><br>
    
    <!-- Formulário que será usado para criar ou editar um cliente -->
    <form action="../controle/salvarCliente.php?id=<?php echo $id; ?>" method="post">

        <div class="container">

            <!-- Campo para o nome do cliente -->
            <div>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" required class="form-control" value="<?php echo $nome; ?>" id="nome">
            </div>

            <!-- Campo para o CPF do cliente -->
            <div>
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo $cpf; ?>" id="cpf">
            </div>

            <!-- Campo para o telefone do cliente -->
            <div>
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="<?php echo $telefone; ?>" id="telefone">
            </div>

            <!-- Campo para a data de nascimento do cliente -->
            <div>
                <label for="data_nascimento" class="form-label">Data de nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" value="<?php echo $data; ?>" id="data_nascimento">
            </div>

            <!-- Campo para o endereço do cliente -->
            <div>
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" value="<?php echo $endereco; ?>" id="endereco">
            </div>

            <!-- Campo para o e-mail do cliente -->
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" id="email">
            </div>

            <!-- Campo oculto para o ID do cliente (não visível para o usuário, mas necessário para a operação) -->
            <input type="hidden" name="id">

            <!-- Botão de submit que mostra "Salvar" ou "Cadastrar" dependendo da ação -->
            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">

        </div>

    </form>

</body>

</html>
