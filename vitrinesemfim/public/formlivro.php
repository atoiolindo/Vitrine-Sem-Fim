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
    <h3>Livro</h3> <br>
    <form action="livro2.php">
        
            <div class="container">
                <div>
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome">
                </div>

                <div>
                    <label for="genero" class="form-label">Genero</label>
                    <input type="text" name="genero" class="form-control" id="genero">
                </div>

                <div>
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" id="isbn">
                </div>

                <div>
                    <label for="estado" class="form-label">Estado</label>
                    <input type="text" name="estado" class="form-control" id="estado">
                </div>

                <div>
                    <label for="idautor" class="form-label">AUTOR</label>
                    <select name="idautor">
                        <?php
                        require_once "../controle/conexao.php";

                        $sqls = "SELECT idautor, nome FROM autor";

                        $resultados = mysqli_query($conexao, $sqls);

                        while ($linha = mysqli_fetch_array($resultados)) {
                            $id = $linha['idautor'];
                            $nome = $linha['nome'];


                            echo "<option value='$id'>$nome</option>";
                        }
                        ?>
                    </select>
                </div>

                <a href="home.html" type="submit" class="btn btn-secondary mt-3">Cadastrar</a>

            </div>

    </form>

</body>

</html>