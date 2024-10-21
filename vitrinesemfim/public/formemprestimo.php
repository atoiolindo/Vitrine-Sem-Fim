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
    <form action="emprestimo.php">
   
    <div class="container"> 

        <div>
            <label for="emprestimo" class="form-label">Data de empréstimo</label>
            <input type="date" name="emprestimo" class="form-control" id="emprestimo">
        </div>

        <div>
            <label for="data" class="form-label">Data de entrega</label>
            <input type="date" name="data" class="form-control" id="data">
        </div>
       
        <div>
            <label for="cliente" class="form-label">Cliente</label>
             <select name="cliente">
            <?php
            require_once "../controle/conexao.php";

            $sql = "SELECT idcliente, nome FROM cliente";

            $resultados = mysqli_query($conexao, $sql);

            while ($linha = mysqli_fetch_array($resultados)) {
                $id = $linha['idcliente'];
                $nome = $linha['nome'];


                echo "<option value='$id'>$nome</option>";
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
                        $id = $linha['idvendedor'];
                        $nome = $linha['nome'];
                        // $crm = $linha['crm'];
                        // $area = $linha['area'];
    
                        echo "<option value='$id'>$nome</option>";
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
                    $id = $linha['idlivro'];
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