<?php
  require_once 'user_controller.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Dev | Nova tarefa</title>
  <link rel="stylesheet" href="assets/styles/base/normalize.css">
  <link rel="stylesheet" href="assets/styles/base/colors.css">
  <link rel="stylesheet" href="assets/styles/layout/l-nav.css">
  <link rel="stylesheet" href="assets/styles/layout/l-container.css">
  <link rel="stylesheet" href="assets/styles/layout/l-center.css">
  <link rel="stylesheet" href="assets/styles/layout/l-form.css">
  <link rel="stylesheet" href="assets/styles/layout/l-alert.css">
  <link rel="stylesheet" href="assets/styles/module/animation.css">
  <link rel="stylesheet" href="assets/styles/module/lead.css">
  <link rel="stylesheet" href="assets/styles/module/form.css">
  <link rel="stylesheet" href="assets/styles/module/button.css">
  <link rel="stylesheet" href="assets/styles/module/icon.css">
  <link rel="stylesheet" href="assets/styles/module/menu.css">
  <link rel="stylesheet" href="assets/styles/module/alert.css">
  <link rel="stylesheet" href="assets/styles/state/is.css">


  <script src="https://kit.fontawesome.com/fe0f6eac9b.js" crossorigin="anonymous"></script>
</head>
<body class="l-container">
  <?php if(isset($_GET['error']) && $_GET['error'] === 'task') { ?>

    <div class="l-alert">
      <article class="alert alert-error">
        <p class="alert-text">
          Desculpe, algo deu errado, tente novamente mais tarde...
          <i class="fa-solid fa-face-frown-open icon"></i>
        </p>
      </article>
    </div>

  <?php } ?>

  <?php if(isset($_GET['success']) && $_GET['success'] === 'task') { ?>

    <div class="l-alert">
      <article class="alert alert-success shake ">
        <p class="alert-text">
          Sua tarefa foi registrada
          <i class="fa-solid fa-check icon"></i>
        </p>
      </article>
    </div>

  <?php } ?>

  <header>
    <div class="lead">
      <h1 class="lead-title">
        Nova tarefa
        <i class="fa-solid fa-plus"></i>
      </h1>
      <p class="lead-text">Descreva a tarefa que você tem que fazer</p>
      <hr class="lead-hr">
    </div>

    <nav class="l-nav">
        <button class="icon nav-toggler">
          <i class="fa-solid fa-bars-staggered"></i>
          <span class="is-hidden-sr-except">Menu</span>
        </button>
      
        <ul class="menu is-hidden">
          <li class="menu-item">
            <a class="menu-link" href="home.php">
              <i class="fa-solid fa-clipboard-list"></i>
              Início
            </a>
          </li>
          
          <li class="menu-item">
            <a class="menu-link" href="all_tasks.php">
              <i class="fa-solid fa-list"></i>
              Todas tarefas
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="new_task.php">
              <i class="fa-solid fa-plus"></i>
              Nova tarefa
            </a>
          </li>

          <!-- disabled links -->
          <!-- <li class="menu-item">
            <a class="menu-link" href="home.php">
              <i class="fa-solid fa-chart-simple"></i>
              Dashboard
            </a>
          </li>

          <li class="menu-item">
            <a class="menu-link" href="home.php">
              <i class="fa-solid fa-user"></i>
              My account
            </a>
          </li> -->

          <li class="menu-item">
            <a class="menu-link" href="user_controller.php?action=log-out">
              <i class="fa-solid fa-right-from-bracket"></i>
              Sair
            </a>
          </li>
        </ul>
      </nav>
  </header>

  <main>
    <form id="new-task-form" action="task_controller.php?action=add" method="POST" class="l-form form">

      <div class="form-control">
        <input type="text" name="task" id="task" class="text-input" placeholder="Type the task title">
        <label for="task" class="floating-label">Tarefa</label>
      </div>

      <div class="form-control">
        <textarea name="description" id="description" class="text-input" placeholder="Descreva sua task" rows="10"></textarea>
        <label for="description" class="floating-label">Descrição <small>(opcional)</small></label>
      </div>

      <div class="l-center">
        <button class="button" type="button" onclick="goBack()">Voltar</button>
        <button class="button button-bluepurple" type="submit">Adicionar</button>
      </div>
    </form>
  </main>
  
  <script src="assets/js/main.js"></script>
</body>
</html>