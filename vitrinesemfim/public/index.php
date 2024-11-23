<?php
// Inicia uma sessão no servidor para gerenciar dados entre páginas
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION['logado'])) {
  // Caso o usuário esteja logado, ele é redirecionado para a página "home.php"
  header("Location: ./home.php");
}
?>



<!DOCTYPE html>
<html lang="en"> <!-- Define o idioma da página como inglês -->

<head>
  <meta charset="UTF-8" /> <!-- Define a codificação de caracteres como UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Faz a página ser responsiva -->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
    rel="stylesheet" /> <!-- Inclui os ícones da biblioteca Remixicon -->
  <link rel="stylesheet" href="./css/index.css" /> <!-- Inclui o arquivo de estilo CSS da página -->
  <title>Livraria | Vitrine sem Fim</title> <!-- Título da página que aparece na aba do navegador -->
</head>

<body>
  <!-- Container principal -->
  <div class="container">

    <!-- Navegação -->
    <nav>
      <div class="nav__logo">
        <img src="assets/logo.png" alt="logo" /> <!-- Logo da livraria -->
      </div>

      <!-- Link para a página de login -->
      <div class="login">
        <a href="login.php">
          <span><i class="ri-user-3-fill"></i></span> <!-- Ícone de usuário -->
          Log In
        </a>
      </div>
    </nav>

    <!-- Conteúdo principal -->
    <div class="destination__container">
      <!-- Imagens de fundo -->
      <img class="bg__img__1" src="assets/bg-dots.png" alt="bg" /> <!-- Imagem decorativa de pontos -->
      <img class="bg__img__2" src="assets/bg-arrow.png" alt="bg" /> <!-- Imagem decorativa de seta -->

      <!-- Redes sociais -->
      <div class="socials">
        <span><i class="ri-twitter-fill"></i></span> <!-- Ícone do Twitter -->
        <span><i class="ri-facebook-fill"></i></span> <!-- Ícone do Facebook -->
        <span><i class="ri-instagram-line"></i></span> <!-- Ícone do Instagram -->
        <span><i class="ri-youtube-fill"></i></span> <!-- Ícone do YouTube -->
      </div>

      <!-- Texto principal -->
      <div class="content">
        <h1>
          DESCUBRA <br /> INSPIRE-SE <br /> <span> AVENTURE-SE </span>
        </h1> <!-- Frase de destaque com efeitos estilizados -->

        <p>
          Na Vitrine Sem Fim, cada livro é uma porta para universos literários que transcendem fronteiras.
          Explore histórias que mergulham na alma humana, culturas que expandem a mente e paisagens criadas pela força da imaginação.
        </p> <!-- Texto descritivo sobre a proposta da livraria -->

        <button class="btn">VEJA MAIS</button> <!-- Botão para ação -->
      </div>

      <!-- Grade de cards de destino -->
      <div class="destination__grid">
        <!-- Card 1 -->
        <div class="destination__card">
          <img src="assets/biblioteca.jpg" alt="livraria" /> <!-- Imagem do card -->
          <div class="card__content">
            <h4>Cada livro, um universo. Cada página, uma jornada.</h4> <!-- Título do card -->
            <p>
              Entre na Vitrine Sem Fim e descubra que a verdadeira viagem não precisa de bilhetes de avião nem de passaportes.
              Cada livro que você encontra aqui é um convite para viajar para dentro de si mesmo, para explorar outros mundos e descobrir novas formas de ver a vida.
              Através da literatura, você pode ir além do visível, do conhecido, e se perder nas infinitas possibilidades de histórias que tocam o coração e expandem a mente.
            </p> <!-- Descrição do card -->
          </div>
        </div>

        <!-- Card 2 -->
        <div class="destination__card">
          <img src="assets/biblioteca2.jpg" alt="livraria" /> <!-- Imagem do card -->
          <div class="card__content">
            <h4>Ler é viver mil vidas. Descubra a sua próxima aqui.</h4> <!-- Título do card -->
            <p>
              Na Vitrine Sem Fim, cada livro é uma viagem sem limites. Ao virar cada página, você se aventura por mundos inexplorados,
              mergulha em culturas fascinantes e vive histórias que desafiam a realidade. Mais do que simplesmente ler, aqui você embarca
              em uma jornada literária que transforma a maneira de ver o mundo, deixando um pedacinho de cada história gravado na sua memória.
            </p> <!-- Descrição do card -->
          </div>
        </div>

        <!-- Card 3 -->
        <div class="destination__card">
          <img src="assets/biblioteca3.jpg" alt="livraria" /> <!-- Imagem do card -->
          <div class="card__content">
            <h4>Vitrine Sem Fim: Mais que livros, janelas para o infinito.</h4> <!-- Título do card -->
            <p>
              Onde as palavras têm o poder de transportar você para lugares distantes e realidades fascinantes.
              Aqui, você não encontra apenas histórias, mas portais que permitem explorar mundos diversos,
              viver aventuras que desafiam o tempo e descobrir perspectivas que você nunca imaginou.
            </p> <!-- Descrição do card -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <li id="link-secreto">
    <a href="https://github.com/Kingnike1" title="Comentado por mim, Pablo! 😄">Comentários</a>
  </li>
</body>

</html>