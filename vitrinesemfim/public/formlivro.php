<?php
// Verifica se o parâmetro 'id' foi passado via URL (indica que estamos editando um livro)
if (isset($_GET['id'])) {
    // Inclui o arquivo de conexão com o banco de dados
    require_once "../controle/conexao.php";

    // Recupera o ID do livro a ser editado a partir da URL
    $id = $_GET['id'];
    
    // Consulta para buscar os dados do livro com o ID fornecido
    $sql = "SELECT * FROM livro WHERE idlivro = $id";
    // Executa a consulta no banco de dados
    $resultado = mysqli_query($conexao, $sql);

    // Recupera os dados do livro
    $linha = mysqli_fetch_array($resultado);

    // Atribui os valores recuperados às variáveis locais
    $nome = $linha['nome'];
    $genero = $linha['genero'];
    $idautor = $linha['autor_idautor'];
    $isbn = $linha['isbn'];
    $estado = $linha['estado'];

    // Define o texto do botão como "Salvar" para edição
    $botao = "Salvar";
} else {
    // Se não for passado o parâmetro 'id', estamos criando um novo livro
    $id = 0;
    $nome = '';
    $genero = '';
    $idautor = '';
    $isbn = '';
    $estado = '';

    // Define o texto do botão como "Cadastrar" para criação de um novo livro
    $botao = "Cadastrar";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definindo o conjunto de caracteres e a responsividade da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link para o CSS personalizado -->
    <link rel="stylesheet" href="./css/estilo.css">
    
    <title>Document</title>
    
    <!-- Link para o CSS do Bootstrap (para design e estrutura de layout) -->
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body class="cadas">
    <!-- Formulário para cadastrar ou editar um livro -->
    <form action="../controle/salvarLivro.php?id=<?php echo $id; ?>" method="post">

        <!-- Título da página -->
        <h3>Livro</h3> <br>
        
        <div class="container">

            <!-- Campo para o nome do livro -->
            <div>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" required class="form-control" value="<?php echo $nome; ?>" id="nome">
            </div>

            <!-- Campo para o gênero do livro -->
            <div>
                <label for="genero" class="form-label">Genero</label>
                <input type="text" name="genero" required class="form-control" value="<?php echo $genero; ?>" id="genero">
            </div>

            <!-- Campo para o ISBN do livro -->
            <div>
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" name="isbn" required class="form-control" value="<?php echo $isbn; ?>" id="isbn">
            </div>

            <!-- Campo para o estado do livro -->
            <div>
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" required class="form-control" value="<?php echo $estado; ?>" id="estado">
            </div>

            <!-- Campo de seleção para o autor do livro -->
            <div>
                <label for="idautor" class="form-label" id="idautor">Autor</label>
                <select name="idautor">
                    <?php
                    // Consulta para listar os autores disponíveis no banco de dados
                    require_once "../controle/conexao.php";
                    $sql = "SELECT idautor, nome FROM autor";
                    $resultados = mysqli_query($conexao, $sql);

                    // Loop para listar todos os autores
                    while ($linha = mysqli_fetch_array($resultados)) {

                        // Recupera o ID e nome do autor
                        $id2 = $linha['idautor'];
                        $nome = $linha['nome'];

                        // Marca o autor selecionado se o ID corresponder ao autor atual do livro
                        if ($id2 == $idautor) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }

                        // Exibe a opção do autor no campo de seleção
                        echo "<option value='$id2' $selecionado>$nome</option>";
                    }
                    ?>
                </select>
            </div> <br>

            <!-- Botão de envio do formulário, com o texto variando entre "Cadastrar" ou "Salvar" -->
            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">

        </div>
    </form>
</body>

</html>
