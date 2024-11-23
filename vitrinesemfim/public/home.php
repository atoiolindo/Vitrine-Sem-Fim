<?php
require_once "../controle/verificaLogado.php";
?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Torna a página responsiva em dispositivos móveis -->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet" /> <!-- Link para a biblioteca de ícones RemixIcon -->
  <link rel="stylesheet" href="./css/home.css" /> <!-- Link para o arquivo CSS da página -->
  <title>Página Inicial</title> <!-- Define o título da página -->
</head>

<body>
  <?php require_once 'menu.php';  // Inclui o menu lateral da página 
  ?>

  <div class="container"> <!-- Início da div com a classe 'container', que contém o conteúdo principal -->
    <nav class="nav"> <!-- Início da área de navegação -->
      <ul class="nav__links nav__left"> <!-- Lista de links à esquerda -->
        <li><a href="#" class="logo">Vitrine sem Fim</a></li> <!-- Link para o nome do site, não direciona para nenhum lugar -->
      </ul>

      <ul class="nav__links nav__right"> <!-- Lista de links à direita -->
        <li><a href="deslogar.html">Deslogar</a></li> <!-- Link para deslogar o usuário, não direciona para nenhum lugar -->
      </ul>
    </nav>

    <span class="letter-s">S</span> <!-- Exibe a letra 'S' com a classe 'letter-s' -->
    <img src="assets/header.png" alt="header" /> <!-- Exibe a imagem de cabeçalho, com texto alternativo 'header' -->
    <h4 class="text__left">SEM</h4> <!-- Exibe o texto 'SEM' alinhado à esquerda -->
    <h4 class="text__right">FIM</h4> <!-- Exibe o texto 'FIM' alinhado à direita -->

    <h5 class="feature-1">Literatura</h5> <!-- Exibe o texto 'Literatura' como título h5 -->
    <h5 class="feature-2">Romance</h5> <!-- Exibe o texto 'Romance' como título h5 -->
    <h5 class="feature-3">Fantasia</h5> <!-- Exibe o texto 'Fantasia' como título h5 -->

    <footer class="footer"> <!-- Início do rodapé -->
      <p>Copyright © 2024 Vitrine sem Fim. Todos os direitos reservados.</p> <!-- Texto de copyright -->
      <div class="footer__links"> <!-- Links no rodapé -->
        <li><a href="#">Facebook</a></li> <!-- Link para a página no Facebook -->
        <li><a href="#">Instagram</a></li> <!-- Link para a página no Instagram -->
        <li><a href="#">Twitter</a></li> <!-- Link para a página no Twitter -->
      </div>
      <!-- Link oculto (secreto) para aparecer nos comentários -->
      <li id="link-secreto">
        <a href="https://github.com/Kingnike1" title="Comentado por mim, Pablo! 😄">Comentários</a>
      </li>
    </footer> <!-- Fim do rodapé -->
  </div> <!-- Fim da div 'container' -->

</body>

</html>