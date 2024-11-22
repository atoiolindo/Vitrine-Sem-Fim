<?php
require_once "../controle/verificaLogado.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/home.css" />
    <title>Web Design Mastery | Porsche</title>
  </head>
  <body>
        <?php require_once 'menu.php';  // Inclui o menu lateral
    ?>
    
    <div class="container">
      <nav>
        <ul class="nav__links nav__left">
          <li><a href="#" class="logo">Vitrine sem Fim</a></li>
        </ul>

        <ul class="nav__links nav__right">
          <li><a href="#">Deslogar</a></li>
        </ul>
      </nav>

      <span class="letter-s">S</span>
      <img src="assets/header.png" alt="header" />
      <h4 class="text__left">SEM</h4>
      <h4 class="text__right">FIM</h4>
 
      <h5 class="feature-1">Literatura</h5>
      <h5 class="feature-2">Romance</h5>
      <h5 class="feature-3">Fantasia</h5>

      <footer class="footer">
        <p>Copyright © 2024 Vitrine sem Fim. Todos os direitos reservados.</p>
        <div class="footer__links">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Twitter</a></li>
        </div>
      </footer>
    </div>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
  </body>
</html>