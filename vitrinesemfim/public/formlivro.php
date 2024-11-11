<?php
require_once "../controle/conexao.php";

if (isset($GET['id'])) {
    require_once "../controle/conexao.php";

    $id = $GET['id'];
    $sql = "SELECT * FROM livro WHERE idlivro = $id";
    $resultado = mysqli_query( $conexao, $sql);

    $linha = mysqli_fetch_array($resultado);

    $nome = $linha['nome'];
    $genero = $linha['genero'];
    $idautor = $linha['autor_idautor'];
    $isbn = $linha ['isbn'];
    $estado = $linha ['estado'];

    $botao = "Salvar";
} else {
    //echo cadastrar
    $id = 0;
    $nome = '';
    $genero = '';
    $idautor = '';
    $isbn = '';
    $estado = '';

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
    <form action="livro.php?id=<?php echo $id; ?>" method="post">
        
        <h3>Livro</h3> <br>
        <div class="container">

       
            <div>
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" required class="form-control" value="<?php echo $nome; ?>">
            </div>

            <div>
                <label for="genero" class="form-label">Genero</label>
                <input type="text" name="genero" class="form-control" value="<?php echo $genero; ?>">
            </div>

            <div>
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" value="<?php echo $isbn; ?>">
            </div>

            <div>
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" value="<?php echo $estado; ?>">
            </div>

            <div>
                <label for="idautor" class="form-label">Autor</label>
                    <select name="idautor">
                        <?php
                        require_once "../controle/conexao.php";

                        $sql = "SELECT idautor, nome FROM autor";

                        $resultados = mysqli_query($conexao, $sql);

                        while ($linha = mysqli_fetch_array($resultados)) {

                            $id2 = $linha['idautor'];
                            $nome = $linha['nome'];
                            
                            if ($id2 == $idautor) {
                                $selecionado = 'selected';
                            } else {
                                $selecionado = '';
                            }


                            echo "<tbody>";
                            echo "<tr>";
                            echo "<th scope='row'>$i</th>";
                            echo "<td>$nome</td>";
                            echo "<td>$id2</td>";
                            echo "</tr>";
                            echo "</tbody>";

                            echo "<option value='$id2' $selecionado>$nome</option>";

                        }
                        ?>
                    </select>
                </div> <br>


                <input type="submit" value="<?php echo $botao; ?>" class="btn btn-secondary mt-3">
                
            
            </div>

    </form>

</body>

</html>