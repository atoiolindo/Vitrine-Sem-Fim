<?php
// Verifica se o parâmetro 'id' foi passado via URL (indicando edição de um empréstimo)
if (isset($_GET['id'])) {
    // Inclui o arquivo de conexão com o banco de dados
    require_once "../controle/conexao.php";

    // Recupera o ID do empréstimo a ser editado a partir da URL
    $id = $_GET['id'];
    
    // Cria a consulta SQL para buscar os dados do empréstimo com o ID fornecido
    $sql = "SELECT * FROM emprestimo WHERE idemprestimo = $id";
    // Executa a consulta no banco de dados
    $resultado = mysqli_query($conexao, $sql);

    // Recupera os dados do empréstimo
    $linha = mysqli_fetch_array($resultado);

    // Atribui os valores recuperados às variáveis locais
    $emprestimo = $linha['data_emprestimo'];
    $data = $linha['data_entrega'];
    $cliente = $linha['cliente_idcliente'];
    $livro = $linha['livro_idlivro'];
    $vendedor = $linha['vendedor_idvendedor'];

    // Define o texto do botão como "Salvar" para edição
    $botao = "Salvar";
} else {
    // Se não for passado o parâmetro 'id', estamos criando um novo empréstimo
    $id = 0;
    $emprestimo = '';
    $data = '';
    $cliente = '';
    $livro = '';
    $vendedor = '';

    // Define o texto do botão como "Cadastrar" para criação de um novo empréstimo
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
    <h3>Empréstimo</h3>
    <!-- Formulário de cadastro/edição do empréstimo -->
    <form action="emprestimo.php?id=<?php echo $id; ?>" method="post">
        <div class="container">
            <!-- Campo para a data de empréstimo -->
            <div>
                <label for="emprestimo" class="form-label">Data de empréstimo</label>
                <input type="date" name="emprestimo" required class="form-control" value="<?php echo $emprestimo; ?>" id="emprestimo">
            </div>

            <!-- Campo para a data de entrega -->
            <div>
                <label for="data" class="form-label">Data de entrega</label>
                <input type="date" name="data" required class="form-control" value="<?php echo $data; ?>" id="data">
            </div>

            <!-- Campo para selecionar o cliente -->
            <div>
                <label for="cliente" class="form-label">Cliente</label>
                <select name="cliente">
                    <?php
                    // Consulta para listar os clientes
                    require_once "../controle/conexao.php";
                    $sql = "SELECT idcliente, nome FROM cliente";
                    $resultados = mysqli_query($conexao, $sql);

                    // Loop para listar todos os clientes
                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id2 = $linha['idcliente'];
                        $nome = $linha['nome'];

                        // Marca o cliente selecionado se o ID corresponder ao cliente atual
                        if ($id2 == $cliente) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }

                        // Exibe a opção no select
                        echo "<option value='$id2' $selecionado>$nome</option>";
                    }
                    ?>
                </select>
            </div><br>

            <!-- Campo para selecionar o vendedor -->
            <div>
                <label for="vendedor" class="form-label">Vendedor</label>
                <select name="vendedor">
                    <?php
                    // Consulta para listar os vendedores
                    require_once "../controle/conexao.php";
                    $sql = "SELECT idvendedor, nome FROM vendedor";
                    $resultados = mysqli_query($conexao, $sql);

                    // Loop para listar todos os vendedores
                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id3 = $linha['idvendedor'];
                        $nome = $linha['nome'];

                        // Marca o vendedor selecionado se o ID corresponder ao vendedor atual
                        if ($id3 == $vendedor) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }

                        // Exibe a opção no select
                        echo "<option value='$id3' $selecionado>$nome</option>";
                    }
                    ?>
                </select>
            </div><br>

            <!-- Campo para selecionar o livro -->
            <div>
                <label for="livro" class="form-label">Livro</label>
                <select name="livro">
                    <?php
                    // Consulta para listar os livros
                    require_once "../controle/conexao.php";
                    $sql = "SELECT idlivro, nome FROM livro";
                    $resultados = mysqli_query($conexao, $sql);

                    // Loop para listar todos os livros
                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id4 = $linha['idlivro'];
                        $nome = $linha['nome'];

                        // Marca o livro selecionado se o ID corresponder ao livro atual
                        if ($id4 == $livro) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }

                        // Exibe a opção no select
                        echo "<option value='$id4' $selecionado>$nome</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Botão de envio do formulário, com o texto variando entre "Cadastrar" ou "Salvar" -->
            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">
        </div>
    </form>

</body>

</html>
