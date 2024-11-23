<?php
// Inclui o arquivo que verifica se o usuário está logado
require_once "../controle/verificaLogado.php";

// Verifica se o parâmetro 'id' foi passado via GET (para editar um autor existente)
if (isset($_GET['id'])) {
    // Inclui o arquivo de conexão com o banco de dados
    require_once "../controle/conexao.php";

    // Recupera o ID do autor que será editado a partir da URL
    $id = $_GET['id'];

    // Cria a consulta SQL para buscar os dados do autor com o ID especificado
    $sql = "SELECT * FROM autor WHERE idautor = $id";
    $resultado = mysqli_query($conexao, $sql); // Executa a consulta no banco de dados

    // Recupera a linha do resultado da consulta
    $linha = mysqli_fetch_array($resultado);

    // Atribui os valores recuperados do banco às variáveis locais
    $nome = $linha['nome'];
    $nacionalidade = $linha['nacionalidade'];
    $biografia = $linha['biografia'];

    // Define o texto do botão como "Salvar" para edição
    $botao = "Salvar";
} else {
    // Se o parâmetro 'id' não for passado, significa que estamos cadastrando um novo autor
    // Atribui valores vazios às variáveis para criar um novo autor
    $id = 0;
    $nome = '';
    $nacionalidade = '';
    $biografia = '';

    // Define o texto do botão como "Cadastrar" para criação de um novo autor
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

    <!-- Formulário que será usado para criar ou editar um autor -->
    <form action="../controle/salvarAutor.php?id=<?php echo $id; ?>" method="post">
        <!-- Título da página -->
        <h3>Autor</h3> <br>
        
        <div class="container">
            <!-- Campo para o nome do autor -->
            <div>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" required class="form-control" value="<?php echo $nome; ?>" id="nome">
            </div>

            <!-- Campo para a nacionalidade do autor -->
            <div>
                <label for="nacionalidade" class="form-label">Nacionalidade</label>
                <input type="text" name="nacionalidade" class="form-control" value="<?php echo $nacionalidade; ?>" id="nacionalidade">
            </div>

            <!-- Campo para a biografia do autor -->
            <div>
                <label for="biografia" class="form-label">Biografia</label>
                <input type="text" name="biografia" class="form-control" value="<?php echo $biografia; ?>" id="biografia">
            </div>

            <!-- Botão de submit que mostra "Salvar" ou "Cadastrar" dependendo da ação -->
            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">
        </div>
    </form>
</body>

</html>
