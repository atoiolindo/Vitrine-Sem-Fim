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
    <form action="pagamento.php" method="get">
   
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
     
     
                     echo "<option value='$id'>$nome</option>";
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
    
    
        <a href="home.html" type="submit" class="btn btn-secondary mt-3">Cadastrar</a>

    </div>




    </form>
 

</body>

</html>