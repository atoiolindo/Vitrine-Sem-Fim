<?php
// Verifica se o parâmetro 'id' foi passado via URL, indicando que é uma edição
if (isset($_GET['id'])) {
    // Inclui o arquivo de conexão com o banco de dados
    require_once "../controle/conexao.php";

    // Recupera o ID do vendedor a ser editado a partir da URL
    $id = $_GET['id'];

    // Cria a consulta SQL para buscar os dados do vendedor com o ID especificado
    $sql = "SELECT * FROM vendedor WHERE idvendedor = $id";
    // Executa a consulta no banco de dados
    $resultado = mysqli_query($conexao, $sql);

    // Recupera a linha do resultado da consulta
    $linha = mysqli_fetch_array($resultado);

    // Atribui os valores recuperados do banco às variáveis locais
    $nome = $linha['nome'];
    $cpf = $linha['cpf'];
    $telefone = $linha['telefone'];
    $data_nascimento = $linha['data_nascimento'];
    $endereco = $linha['endereco'];
    $email = $linha['email'];

    // Define o texto do botão como "Salvar" para editar
    $botao = "Salvar";
} else {
    // Se o parâmetro 'id' não for passado, significa que estamos criando um novo vendedor
    // Atribui valores vazios às variáveis para criar um novo vendedor
    $id = 0;
    $nome = '';
    $cpf = '';
    $telefone = '';
    $data_nascimento = '';
    $endereco = '';
    $email = '';

    // Define o texto do botão como "Cadastrar" para criação de um novo vendedor
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
    <!-- Formulário para cadastrar ou editar um vendedor -->
    <form action="../controle/salvarVendedor.php?id=<?php echo $id; ?>" method="post">
        <!-- Título do formulário -->
        <h3>Vendedor</h3><br>

        <div class="container">
            <!-- Campo para o nome do vendedor -->
            <div>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" required class="form-control" value="<?php echo $nome; ?>" id="nome">
            </div>

            <!-- Campo para o CPF do vendedor -->
            <div>
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo $cpf; ?>" id="cpf">
            </div>

            <!-- Campo para o telefone do vendedor -->
            <div>
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="<?php echo $telefone; ?>" id="telefone">
            </div>

            <!-- Campo para a data de nascimento do vendedor -->
            <div>
                <label for="nascimento" class="form-label">Data de nascimento</label>
                <input type="date" name="nascimento" class="form-control" value="<?php echo $data_nascimento; ?>" id="nascimento">
            </div>

            <!-- Campo para o endereço do vendedor -->
            <div>
                <label for="endereço" class="form-label">Endereço</label>
                <input type="text" name="endereço" class="form-control" value="<?php echo $endereco; ?>" id="endereço">
            </div>

            <!-- Campo para o e-mail do vendedor -->
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" id="email">
            </div>

            <!-- Botão de submit que exibirá "Salvar" ou "Cadastrar" dependendo da ação -->
            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">
        </div>
    </form>

</body>

</html>
