
<?php
include './php/login.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="./assets/icons8-ps-controller-50 (1).png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <title>GameGroup</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-sm">
      <a class="navbar-brand" href="#">GG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#landing-page">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Competições</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#form-overview">Inscrições</a>
          </li>
        </ul>
        <form class="d-flex" role="login">
          <button class="btn btn-danger" id="buttonLogin" type="button" data-bs-toggle="modal"
            data-bs-target="#myModal">
            Login
          </button>
          <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#myModalR"
            data-bs-dismiss="modal">Cadastrar</button>
        </form>
      </div>
    </div>
  </nav>
  <section class="section" id="landing-page">
    <div class="container-lg d-flex ">
      <div class="my-auto d-flex flex-column">
        <h1 class="text-dark pb-1" id="gradient">Transforme sua gameplay entre amigos</h1>
        <div class="text-dark mt-1">Tenha experiências competitivas com qualidade.</div>
      </div>
      <img src="./assets/Kerfin7_NEA_2332.png" class="img-fluid controls">
    </div>
    </div>
  </section>
  <section id="game-informations">
    <div class="container-fluid d-flex flex-column " id="bgGradient">
      <div class="container-lg py-5 ">
        <div class="d-flex justify-content-center">
          <div class="text-light text-center py-3" id="infoText">Encontre a sua comunidade</div>
        </div>
        <div class="d-flex flex-row mt-4 opacity-50  " id="imgGames">
          <img class="row mx-2" src="./assets/league-of-legends7103-removebg-preview 1.png">
          <img class="row mx-2" src="./assets/valorant.png">
          <img class="row mx-2" src="./assets/image 2.png">
          <img class="row mx-2" src="./assets/overwatch.png">
          <img class="row mx-2" src="./assets/fornite.png">
        </div>
      </div>
    </div>
  </section>
  <section id="tournaments">
    <div class="bg-opacity-50">
      <div class="masterhead object-fit-cover bg-dark" style="background-image: url('./assets/3312542\ 1.png');">
        <div class="container-lg py-5 d-flex flex-column align-items-center">
          <h1 id="titleTournaments" class="text-white">Compartilhe suas experiências</h1>
          <div class="container-lg d-flex">
            <div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="form-overview">
    <div class="bg-dark" style="height: 100vh !important;">
      <div class="container-sm d-flex flex-row-reverse w-100">
        <div class="row my-auto w-50 mx-4">
          <h1 class="text-light my-auto" id="titleForm">Monte seu time e comece a jogar.</h1>
          <p class="text-light mt-2">Inscreva os participantes da sua equipe ou monte um baseado nos seu perfil de jogo!
          </p>
          <div class="px-3"><button type="button" class="btn btn-warning  w-25" data-bs-toggle="modal"
              data-bs-target="#myModal">Inscrever-se</button></div>
          <p class="text-light mt-3" id="info"> *Você será redirecionado para um formulário .</p>
        </div>
        <div class="row w-50">
          <img src="./assets/asd 1.png">
        </div>
      </div>
    </div>
    </div>

    <!-- Modal - Cadastro -->
    <?php
    include './php/register.php';
    ?>
    

  </section>
  <footer>
    <div class="container">
      <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">© 2023 Eduardo Marionucci</p>
      </footer>
    </div>
  </footer>
</body>
<!-- Adicione o JavaScript do Bootstrap e do jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>

<style>
  :root {
    --purple: rgba(46, 0, 83, 0.81);
  }

  body {
    font-family: "Inter", sans-serif;
  }

  .navbar-brand {
    font-weight: 900;
    color: #450066;
  }

  #gradient {
    font-size: 60px;
    font-weight: 800;
    line-height: 93.5%;
    /* or 73px */
    letter-spacing: -0.0457em;
    background: radial-gradient(64.79% 294.87% at 13.44% 37.11%, #340948 0%, rgba(0, 0, 0, 0.87) 100%)
      /* warning: gradient uses a rotation that is not supported by CSS and may not behave as expected */
    ;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  #bgGradient {
    background: linear-gradient(92.18deg, #000000 -90.38%, rgba(46, 0, 83, 0.81) 128.07%);
  }

  #infoText {
    font-weight: 800;
    font-size: 35px;
    line-height: 93.4%;
    /* or 64px */
    letter-spacing: -0.045em;
    max-width: 60%;
    text-align: center;
    margin: 0;
  }

  #titleTournaments {
    font-weight: 800;
    font-size: 40px;
    line-height: 93.4%;
    /* or 64px */
    letter-spacing: -0.045em;
    text-align: center;
    margin: 0;
  }

  #titleForm {
    font-weight: 800;
    font-size: 50px;
    line-height: 93.4%;
    /* or 64px */

    letter-spacing: -0.045em;

    background: radial-gradient(106% 295.35% at 3.12% -55.78%, #f5ca0b 0%, #FFFFFF 100%)
      /* warning: gradient uses a rotation that is not supported by CSS and may not behave as expected */
    ;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  #imgGames {
    align-content: center;
    align-items: center;
    justify-content: center;
  }

  #info {
    font-weight: 400;
    font-size: 12px;
    opacity: 35%;

  }

  #email {
    align-content: center;
    align-items: center;
    justify-content: center;
  }

  .btn btn-outline {
    background-color: var(--purple);
    border-color: var(--purple);
  }

  .masterhead {
    min-height: 100vh;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
  }

  .font {
    font-size: 14px;
  }

  .controls {
    width: 55%;

  }
</style>

</html>