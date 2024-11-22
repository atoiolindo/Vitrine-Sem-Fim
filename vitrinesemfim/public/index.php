<?php
session_start();
if (isset($_SESSION['logado'])) {
    header("Location: ./public/home.php");
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/indexx.css" />
    <title>Livraria | Vitrine sem Fim</title>
  </head>
  <body>
    <div class="container">
      <nav>
        <div class="nav__logo">
          <img src="assets/logo.png" alt="logo" />
        </div>

        <div class="login">
            <a href="index.php">
               <span><i class="ri-user-3-fill"></i></span>
               Log In
            </a>
        </div>
      </nav>
      <div class="destination__container">
        <img class="bg__img__1" src="assets/bg-dots.png" alt="bg" />
        <img class="bg__img__2" src="assets/bg-arrow.png" alt="bg" />
        <div class="socials">
          <span><i class="ri-twitter-fill"></i></span>
          <span><i class="ri-facebook-fill"></i></span>
          <span><i class="ri-instagram-line"></i></span>
          <span><i class="ri-youtube-fill"></i></span>
        </div>
        <div class="content">
          <h1> DESCUBRA <br/> INSPIRE-SE <br/> <span> AVENTURE-SE </span> </h1>
          <p>
            Na Vitrine Sem Fim, cada livro é uma porta para universos literários que transcendem fronteiras. 
            Explore histórias que mergulham na alma humana, culturas que expandem a mente e paisagens criadas pela força da imaginação.
          </p>
          <button class="btn">VEJA MAIS</button>
        </div>
        <div class="destination__grid">
          <div class="destination__card">
            <img src="assets/biblioteca.jpg" alt="livraria" />
            <div class="card__content">
              <h4>Cada livro, um universo. Cada página, uma jornada.</h4>
              <p>
               Entre na Vitrine Sem Fim e descubra que a verdadeira viagem não precisa de bilhetes de avião nem de passaportes. 
               Cada livro que você encontra aqui é um convite para viajar para dentro de si mesmo, para explorar outros mundos e descobrir novas formas de ver a vida. 
               Através da literatura, você pode ir além do visível, do conhecido, e se perder nas infinitas possibilidades de histórias que tocam o coração e expandem a mente.
              </p>
            </div>
          </div>
          <div class="destination__card">
            <img src="assets/biblioteca2.jpg" alt="livraria" />
            <div class="card__content">
              <h4>Ler é viver mil vidas. Descubra a sua próxima aqui.</h4>
              <p>
               Na Vitrine Sem Fim, cada livro é uma viagem sem limites. Ao virar cada página, você se aventura por mundos inexplorados, 
               mergulha em culturas fascinantes e vive histórias que desafiam a realidade. Mais do que simplesmente ler, aqui você embarca 
               em uma jornada literária que transforma a maneira de ver o mundo, deixando um pedacinho de cada história gravado na sua memória.
              </p>
            </div>
          </div>
          <div class="destination__card">
            <img src="assets/biblioteca3.jpg" alt="livraria" />
            <div class="card__content">
              <h4>Vitrine Sem Fim: Mais que livros, janelas para o infinito.</h4>
              <p>
                Onde as palavras têm o poder de transportar você para lugares distantes e realidades fascinantes.
                Aqui, você não encontra apenas histórias, mas portais que permitem explorar mundos diversos, 
                viver aventuras que desafiam o tempo e descobrir perspectivas que você nunca imaginou.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>