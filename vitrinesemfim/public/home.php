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
    <link rel="stylesheet" href="styles.css" />
    <title>Web Design Mastery | Porsche</title>
  </head>
  <body>
    <div class="container">
      <nav>
        <ul class="nav__links nav__left">
          <li><a href="#" class="logo">Diesel</a></li>
          <li><a href="#">Store</a></li>
          <li><a href="#">Shop</a></li>
          <li><a href="#">Collection</a></li>
        </ul>
        <ul class="nav__links nav__right">
          <li><a href="#">Cart</a></li>
          <li><a href="#">Login/Register</a></li>
          <li><a href="#">Profile</a></li>
        </ul>
      </nav>
      <span class="letter-s">S</span>
      <img src="assets/header.png" alt="header" />
      <h4 class="text__left">POR</h4>
      <h4 class="text__right">CHE</h4>
      <button class="btn explore">EXPLORE MORE</button>
      <button class="btn print">PRINT</button>
      <button class="btn catalog">CATALOG</button>
      <h5 class="feature-1">Diesel</h5>
      <h5 class="feature-2">Watches</h5>
      <h5 class="feature-3">Tough</h5>
      <h5 class="feature-4">Modern</h5>
      <footer class="footer">
        <p>Copyright © 2024 Web Design Mastery. All rights reserved.</p>
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