<?php
  session_start();
  require_once "user_service.php";

  $userService = new UserService();
  $userModel = new User();
  
  $action = isset($_GET['action']) ? $_GET['action'] : null;

  if($action === 'log-in') {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $userModel->__set('email', $email)->__set('passwd', $passwd);
    $user = $userService->login($userModel);

    if($user) {
      $_SESSION['auth'] = true;
      $_SESSION['user'] = $user;
      header('Location: home.php');
    } else {
      session_destroy();
      header('Location: index.php?error=login');
    }
  }
  
  if($action === 'sign-up') {
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $pronoun = $_POST['pronoun'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    
    if(trim($name) && trim($birthdate) && trim($gender) && trim($pronoun) && trim($email) && $passwd) {
      $userModel
      ->__set('username', $name)
      ->__set('birthdate', $birthdate)
      ->__set('gender', $gender)
      ->__set('pronoun', $pronoun)
      ->__set('email', $email)
      ->__set('passwd', $passwd);
      
      if($userService->validateEmail($userModel)){
        if($userService->createAccount($userModel)) header('Location: index.php?success=sign-up');
        else header('Location: index.php?action=sign-up&error=generic');
      } 
      else header('Location: index.php?action=sign-up&error=sign-up-email');
    } 
    else header('Location: index.php?action=sign-up&error=sign-up');
  }
  
  if($action === 'log-out') {
    session_destroy();
    header('Location: index.php?success=log-out');
  }

  if($action !== 'sign-up' && (!$_SESSION['auth'] || !isset($_SESSION['auth']))) {
    session_destroy();
    header('Location: index.php?error=auth');
  }
?>