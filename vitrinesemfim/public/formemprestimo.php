<?php
require_once "../controle/verificaLogado.php";

if (isset($_GET['id'])) {
    // echo "editar";
    require_once "../controle/conexao.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM emprestimo WHERE idemprestimo = $id";
    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $emprestimo = $linha['data_emprestimo'];
    $data = $linha['data_entrega'];
    $cliente = $linha['cliente_idcliente'];
    $livro = $linha['livro_idlivro'];
    $vendedor = $linha['vendedor_idvendedor'];

    // $acao = "editar";
    $botao = "Salvar";
} else {
    // echo "cadastrar";
    $id = 0;
    $emprestimo = '';
    $data = '';
    $cliente = '';
    $livro = '';;
    $vendedor = '';

    // $acao = "cadastrar";
    $botao = "Cadastrar";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css"> <!-- Link para o CSS do Bootstrap -->
</head>

<body class="cadas">
    <h3>Empréstimo</h3>
    <form action="../controle/salvarEmprestimo.php?id=<?php echo $id; ?>" method="post">

        <div class="container">

            <div>
                <label for="emprestimo" class="form-label">Data de empréstimo</label>
                <input type="date" name="emprestimo" required class="form-control" id="emprestimo">
            </div>

            <div>
                <label for="data" class="form-label">Data de entrega</label>
                <input type="date" name="data" required class="form-control" id="data">
            </div>

            <div>
                <label for="cliente" class="form-label">Cliente</label>
                <select name="cliente">
                    <?php
                    require_once "../controle/conexao.php";

                    $sql = "SELECT idcliente, nome FROM cliente";

                    $resultados = mysqli_query($conexao, $sql);

                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id2 = $linha['cliente'];
                        $nome = $linha['nome'];

                        if ($id2 == $cliente) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }


                        echo "<option value='$id2'>$nome</option>";
                    }

                    ?>
                </select>
            </div> <br>

            <div>
                <label for="vendedor" class="form-label">Vendedor</label>

                <select name="vendedor">
                    <?php
                    require_once "../controle/conexao.php";

                    $sql = "SELECT idvendedor, nome FROM vendedor";

                    $resultados = mysqli_query($conexao, $sql);

                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id3 = $linha['vendedor'];
                        $nome = $linha['nome'];
                        // $crm = $linha['crm'];
                        // $area = $linha['area'];

                        if ($id3 == $vendedor) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }


                        echo "<option value='$id3'>$nome</option>";
                    }
                    ?>
                </select>
            </div><br>

            <div>
                <label for="livro" class="form-label">Livro</label>

                <select name="livro">
                    <?php
                    require_once "../controle/conexao.php";

                    $sql = "SELECT idlivro, nome FROM livro";

                    $resultados = mysqli_query($conexao, $sql);

                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id4 = $linha['livro'];
                        $nome = $linha['nome'];

                        if ($id4 == $cliente) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }


                        echo "<option value='$id4'>$nome</option>";
                    }
                    ?>
                </select>
            </div>



            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">
        </div>
    </form>

</body>

</html>