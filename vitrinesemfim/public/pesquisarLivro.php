<?php 
   require_once "../controle/verificaLogado.php";
   
   if (isset($_GET['valor'])) {
    $valor = $_GET['valor']; 
} else {$valor='';}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <form action="pesquisarLivro.php" method="post">
        Nome do Livro: <br>
        <input type="text" name="valor" value="<?php echo $valor; ?>"> <br> <br>

        <input  type="submit" value="Pesquisar">

    </form>


    <?php 

        if (isset($_GET['valor'])) {
            require_once "../controle/conexao.php";
            $sql = "SELECT * FROM livro WHERE nome LIKE '%$valor%'";
           $resultados = mysqli_query($conexao, $sql); 
            
            if (mysqli_num_rows($resultados) == 0) {
                echo "Não encontrado";
            } else {
                echo "<table>";
                echo "<tr>";
                echo "<td>ID</td>";
                echo "<td>Nome</td>";
                echo "<td>Genero</td>";
                echo "<td>ISBN</td>";
                echo "<td>Estado</td>";

                while ($linha = mysqli_fetch_array($resultados)) {
                    $id = $linha ['idlivro'];
                    $nome =$linha ['nome'];
                    $genero = $linha ['genero'];
                    $isbn = $linha ['isbn'];
                    $estado = $linha ['estado'];

                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$nome</td>";
                    echo "<td>$genero</td>";
                    echo "<td>$isbn/td>";
                    echo "<td>$estado/td>";


                }
                
            }
        }
        else {
            echo "Procure um nome";
        } 
    ?>
     <a href="home.php" class="btn btn-secondary float-start">Voltar para Início</a>
</body>
</html>
