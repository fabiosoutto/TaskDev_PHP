<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entrar - Task Dev</title>
  <link rel="stylesheet" href="assets/styles/base/normalize.css">
  <link rel="stylesheet" href="assets/styles/base/colors.css">
  <link rel="stylesheet" href="assets/styles/layout/l-container.css">
  <link rel="stylesheet" href="assets/styles/layout/l-form.css">
  <link rel="stylesheet" href="assets/styles/module/animation.css">
  <link rel="stylesheet" href="assets/styles/module/lead.css">
  <link rel="stylesheet" href="assets/styles/module/form.css">
  <link rel="stylesheet" href="assets/styles/module/button.css">
  <link rel="stylesheet" href="assets/styles/module/alert.css">
  <link rel="stylesheet" href="assets/styles/module/icon.css">
  <link rel="stylesheet" href="assets/styles/layout/l-center.css">
  <link rel="stylesheet" href="assets/styles/layout/l-alert.css">
  <link rel="stylesheet" href="assets/styles/state/is.css">
  <link rel="stylesheet" href="assets/styles/state/no.css">

  <script src="https://kit.fontawesome.com/fe0f6eac9b.js" crossorigin="anonymous"></script>
</head>
<body>
  <main class="l-container">

    <!-- Feedback alerts -->
    <?php if(isset($_GET['error']) && $_GET['error'] === 'sign-up') { ?>

      <div class="l-alert">
        <article class="alert alert-error">
          <p class="alert-text">
            Há um problema com suas informações fornecidas, tente novamente.
            <i class="fa-solid fa-arrow-rotate-left icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['error']) && $_GET['error'] === 'sign-up-email') { ?>

      <div class="l-alert">
        <article class="alert alert-error">
          <p class="alert-text">
            Desculpe, outro usuário está associado a este mesmo e-mail.
            <i class="fa-solid fa-at icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['error']) && $_GET['error'] === 'login') { ?>

      <div class="l-alert">
        <article class="alert alert-error">
          <p class="alert-text">
            Algo deu errado com seu login, tente novamente 
            <i class="fa-solid fa-id-card icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['error']) && $_GET['error'] === 'auth') { ?>

      <div class="l-alert">
        <article class="alert alert-error">
          <p class="alert-text">
            Por favor, autentique seu acesso.
            <i class="fa-solid fa-lock icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['success']) && $_GET['success'] === 'sign-up') { ?>

      <div class="l-alert">
        <article class="alert alert-success shake">
          <p class="alert-text">
            Sua conta foi criada com sucesso.
            <i class="fa-solid fa-face-laugh-beam icon"></i>
          </p>
        </article>
      </div>

    <?php } ?>

    <?php if(isset($_GET['success']) && $_GET['success'] === 'log-out') { ?>

      <div class="l-alert">
        <article class="alert alert-success shake">
          <p class="alert-text">
            Você saiu da sua conta com sucesso.
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </p>
        </article>
      </div>

    <?php } ?>


    <header class="lead">
      <h1 class="lead-title">
        Entrar
        <i class="fa-solid fa-arrow-right-to-bracket"></i>
      </h1>
      <p class="lead-text">Você deve fazer login na sua conta ou criá-la se não tiver uma.</p>
      <hr class="lead-hr">
    </header>

    <?php
      if(isset($_GET['action']) && $_GET['action'] == 'sign-up') {
    ?>
      <!-- Form create account -->
      <form action="user_controller.php?action=sign-up" method="POST" class="l-form form" id="sign-up-form">
        <fieldset class="form-area">
          <legend class="form-legend">
            <i class="fa-solid fa-id-card"></i>
            Suas informações
          </legend>
          <div class="form-control">
            <input type="text" name="name" id="name" placeholder="Type your name here" class="text-input">
            <label for="name" class="floating-label">Nome</label>
          </div>
    
          <div class="form-control">
            <input type="date" name="birthdate" id="birthdate" class="text-input">
            <label for="birthdate" class="floating-label">Data de nascimento</label>
          </div>
        </fieldset>

        <fieldset class="form-area">
          <legend class="form-legend no-margin">
            <i class="fa-solid fa-restroom"></i>
            Gênero e pronome preferido
          </legend>

          <div class="form-control">
            <label for="gender" class="is-hidden">Gênero</label>
            <select name="gender" id="gender" class="text-input no-margin">
              <option>-- Escolha uma opção --</option>
              <option value="MA">Masc</option>
              <option value="FE">Fem</option>
              <option value="NB">Não-binario</option>
              <option value="OT">Outro</option>
            </select>
          </div>

          <div class="form-control l-center no-padding">
            <div>
              <input type="radio" name="pronoun" id="masc" value="M">
              <label for="masc">Masculino</label>
            </div>
            
            <div>
              <input type="radio" name="pronoun" id="fem" value="F">
              <label for="fem">Feminino</label>
            </div>

            <div>
              <input type="radio" name="pronoun" id="neutral" value="N">
              <label for="neutral">Neutro</label>
            </div>
          </div>
        </fieldset>
        
        <fieldset class="form-area">
          <legend class="form-legend">
            <i class="fa-solid fa-key"></i>
            E-mail e senha para a conta
          </legend>
          <div class="form-control">
            <input type="email" name="email" id="email-c" placeholder="name@exemple.com" class="text-input" autocomplete="off">
            <label for="email-c" class="floating-label">Email</label>
          </div>

          <div class="form-control">
            <input type="password" name="passwd" id="passwd-c" placeholder="Type your password" class="text-input" autocomplete="off">
            <label for="passwd-c" class="floating-label">
              Senha
            </label>
          </div>
          <div class="form-control no-padding">
            <input type="password" name="confirm-passwd" id="confirm-passwd-c" placeholder="Confirme sua senha" class="text-input text-input-placeholder" autocomplete="off">
          </div>
        </fieldset>
        <div class="l-center">
          <button type="submit" class="button button-bluepurple">Criar conta</button>
          <button type="button" class="button" onclick="goLogin()">Voltar</button>
        </div>
      </form>

    <?php } else { ?>
      <!-- Form login -->
      <form action="user_controller.php?action=log-in" method="POST" class="l-form form">
        <fieldset class="form-area">
          <legend class="form-legend">
            <i class="fa-solid fa-key"></i>
            Informações de acesso
          </legend>

          <div class="form-control">
            <input type="email" name="email" id="email-l" placeholder="name@exemple.com" class="text-input" autocomplete="off">
            <label for="email-l" class="floating-label">Email</label>
          </div>
    
          <div class="form-control">
            <input type="password" name="passwd" id="passwd-l" placeholder="type your password" class="text-input" autocomplete="off">
            <label for="passwd-l" class="floating-label">
              Senha
            </label>
          </div>
        </fieldset>

        <div class="l-center">
          <button type="button" class="button" onclick="goCreateAccount()">
            Criar conta
          </button>
          <button type="submit" class="button button-bluepurple">
            Entrar
          </button>
        </div>
      </form>
    <?php } ?>
  </main>


  <script src="assets/js/main.js"></script>
</body>
</html>