<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definindo o conjunto de caracteres para o documento -->
    <meta charset="UTF-8">
    
    <!-- Definindo a responsividade da página, ajustando a escala para dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Título do documento, exibido na aba do navegador -->
    <title>Document</title>

    <!-- Link para o Bootstrap Icons a partir do CDN, para usar os ícones no menu -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Link para o arquivo CSS personalizado (menu.css), que irá estilizar o menu lateral -->
    <link rel="stylesheet" href="./css/menu.css">
</head>

<body>
    <!-- Definindo o menu lateral (navegação) -->
    <nav class="menulateral">
        
        <!-- Botão para expandir ou contrair o menu lateral, usando o ícone de lista -->
        <div id="menu" class="btnexpandir">
            <i class="bi bi-list"></i> <!-- Ícone de lista do Bootstrap Icons -->
        </div>

        <!-- Lista de itens de navegação -->
        <ul>
            <!-- Primeiro item do menu: Página Inicial -->
            <li id="casa" class="itemmenu">
                <a href="home.php">
                    <!-- Ícone de casa do Bootstrap Icons -->
                    <span class="icon"> <i class="bi bi-house"> </i> </span>
                    <!-- Texto do link -->
                    <span class="txtlink"> Página Inicial </span>
                </a>
            </li>
        
            <!-- Segundo item do menu: Cadastro -->
            <li class="itemmenu">
                <a href="pagecadastro.php">
                    <!-- Ícone de jornal (representando o cadastro) -->
                    <span class="icon"> <i class="bi bi-journal-text"> </i> </span>
                    <!-- Texto do link -->
                    <span class="txtlink"> Cadastro </span>
                </a>
            </li>  

            <!-- Terceiro item do menu: Listagem -->
            <li class="itemmenu">
                <a href="pagelista.php">
                    <!-- Ícone de linhas de pessoa (representando listagem) -->
                    <span class="icon"> <i class="bi bi-person-lines-fill"> </i> </span>
                    <!-- Texto do link -->
                    <span class="txtlink"> Listagem </span>
                </a>
            </li>  

            <!-- Quarto item do menu: Pesquisar -->
            <li class="itemmenu">
                <a href="pagepesquisar.php">
                    <!-- Ícone de lupa (representando a pesquisa) -->
                    <span class="icon"> <i class="bi bi-search"> </i> </span>
                    <!-- Texto do link -->
                    <span class="txtlink"> Pesquisar </span>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>
