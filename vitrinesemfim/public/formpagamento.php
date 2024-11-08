<?php
require_once "../controle/verificaLogado.php";

if (isset($_GET['id'])) {
    // echo "editar";
    require_once "../controle/conexao.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM pagamento WHERE idpagamento = $id";
    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $atraso = $linha['atraso'];
    $multa = $linha['multa'];
    $final = $linha['final'];
    $final = $linha['final'];

    // $acao = "editar";
    $botao = "Salvar";
} else {
    // echo "cadastrar";
    $id = 0;
    $atraso = '';
    $multa = '';
    $final = '';

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
    <form action="pagamento.php?id=<?php echo $id; ?>" method="post">

        <h3>Pagamento</h3> <br>
        <div class="container">

            <div>
                <label for="atraso" class="form-label">Dias atrasados</label>
                <input type="text" name="atraso" class="form-control" id="atraso">
            </div>

            <div>
                <label for="multa" class="form-label">Multa</label>
                <input type="text" name="multa" class="form-control" id="multa">
            </div>

            <div>
                <label for="final" class="form-label">Valor total</label>
                <input type="text" name="final" class="form-control" id="final">
            </div>


            <div>
                <label for="idvendedor" class="form-label">Vendedor</label>
                <select name="idvendedor">
                    <?php
                    require_once "../controle/conexao.php";

                    $sql = "SELECT idvendedor, nome FROM vendedor";

                    $resultados = mysqli_query($conexao, $sql);

                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id = $linha['idvendedor'];
                        $nome = $linha['nome'];

                        if ($id == $idpaciente) {
                            $selecionado = 'selected';
                        } else {
                            $selecionado = '';
                        }


                        echo "<option value='$id' $selecionado>$nome</option>";
                    }
                    ?>
                </select>

            </div> <br>


            <div>
                <label for="idemprestimo" class="form-label">Emprestimo</label>
                <select name="idemprestimo">
                    <?php
                    require_once "../controle/conexao.php";

                    $sql = "SELECT idemprestimo FROM emprestimo";

                    $resultados = mysqli_query($conexao, $sql);

                    while ($linha = mysqli_fetch_array($resultados)) {
                        $id = $linha['idemprestimo'];

                        echo "<option value='$id'>$id</option>";
                    }
                    ?>
                </select>

            </div> <br>

            <div>
                <label for="pago" class="form-label">Valor pago</label>
                <input type="text" name="pago" class="form-control" id="pago">
            </div>

            <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">


        </div>




    </form>


</body>

</html>