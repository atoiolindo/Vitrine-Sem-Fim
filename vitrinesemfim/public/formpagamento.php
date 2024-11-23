<?php
// Verifica se o parâmetro 'id' foi passado na URL, o que indica que estamos editando um pagamento
if (isset($_GET['id'])) {
    // Inclui o arquivo de conexão com o banco de dados
    require_once "../controle/conexao.php";

    // Recupera o ID do pagamento a ser editado da URL
    $id = $_GET['id'];

    // Consulta SQL para buscar os dados do pagamento com o ID fornecido
    $sql = "SELECT * FROM pagamento WHERE idpagamento = $id";
    // Executa a consulta no banco de dados
    $resultado = mysqli_query($conexao, $sql);

    // Recupera os dados do pagamento
    $linha = mysqli_fetch_array($resultado);

    // Atribui os valores recuperados às variáveis locais
    $atraso = $linha['atraso'];
    $multa = $linha['multa'];
    $final = $linha['valor_final'];
    $idvendedor = $linha['vendedor_idvendedor'];
    $idemprestimo = $linha['emprestimo_idemprestimo'];
    $pago = $linha['valor_pago'];

    // Define o texto do botão como "Salvar" para edição de um pagamento existente
    $botao = "Salvar";
} else {
    // Se não for passado o parâmetro 'id', trata como a criação de um novo pagamento
    $id = 0;
    $atraso = '';
    $multa = '';
    $final = '';
    $idvendedor = '';
    $idemprestimo = '';
    $pago = '';

    // Define o texto do botão como "Cadastrar" para criar um novo pagamento
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
    <!-- Formulário para cadastrar ou editar um pagamento -->
    <form action="pagamento.php?id=<?php echo $id; ?>" method="post">

        <!-- Título da página -->
        <h3>Pagamento</h3> <br>
        
        <div class="container">

            <!-- Campo para o número de dias de atraso no pagamento -->
            <div>
                <label for="atraso" class="form-label">Dias atrasados</label>
                <input type="text" name="atraso" required class="form-control" value="<?php echo $atraso; ?>" id="atraso">
            </div>

            <!-- Campo para o valor da multa -->
            <div>
                <label for="multa" class="form-label">Multa</label>
                <input type="text" name="multa" required class="form-control" value="<?php echo $multa; ?>" id="multa">
            </div>

            <!-- Campo para o valor total do pagamento -->
            <div>
                <label for="final" class="form-label">Valor total</label>
                <input type="text" name="final" required class="form-control" value="<?php echo $final; ?>" id="final">
            </div>

            <!-- Campo de seleção para o vendedor -->
            <div>
                <label for="idvendedor" class="form-label">Vendedor</label>
                <select name="idvendedor">
                    <?php
                    // Consulta para listar todos os vendedores
                    require_once "../controle/conexao.php";
                    $sql = "SELECT idvendedor, nome FROM vendedor";
                    $resultados = mysqli_query($conexao, $sql);

                    // Loop para listar os vendedores
                    while ($linha = mysqli_fetch_array($resultados)) {
                        // Recupera o ID e nome do vendedor
                        $id2 = $linha['idvendedor'];
                        $nome = $linha['nome'];

                        // Marca o vendedor como selecionado se o ID corresponder ao vendedor do pagamento
                        if ($id2 == $idvendedor) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }

                        // Exibe a opção do vendedor no campo de seleção
                        echo "<option value='$id2' $selecionado>$nome</option>";
                    }
                    ?>
                </select>
            </div> <br>

            <!-- Campo de seleção para o empréstimo associado ao pagamento -->
            <div>
                <label for="idemprestimo" class="form-label">Emprestimo</label>
                <select name="idemprestimo">
                    <?php
                    // Consulta para listar todos os empréstimos
                    require_once "../controle/conexao.php";
                    $sql = "SELECT idemprestimo FROM emprestimo";
                    $resultados = mysqli_query($conexao, $sql);

                    // Loop para listar os empréstimos
                    while ($linha = mysqli_fetch_array($resultados)) {
                        // Recupera o ID do empréstimo
                        $id3 = $linha['idemprestimo'];

                        // Marca o empréstimo como selecionado se o ID corresponder ao empréstimo do pagamento
                        if ($id3 == $idemprestimo) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }

                        // Exibe a opção do empréstimo no campo de seleção
                        echo "<option value='$id3' $selecionado>$id3</option>";
                    }
                    ?>
                </select>
            </div> <br>

            <!-- Campo para o valor pago -->
            <div>
                <label for="pago" class="form-label">Valor pago</label>
                <input type="text" name="pago" required class="form-control" value="<?php echo $pago; ?>" id="pago">
            </div>

            <!-- Botão de envio do formulário, com o texto variando entre "Cadastrar" ou "Salvar" -->
            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">

        </div>
    </form>
</body>

</html>
