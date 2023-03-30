<?php

    session_start();

    if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
    }
    
    require 'db.php';   
  
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /php-login");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }
?>


<!DOCTYPE html>
  <html>
    <head>
      <title>Login</title> 
      <link rel="stylesheet" href="assets/css/styles.css">       
      
    </head>
  <body>
  <?php require 'partials/header.php'?>


    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>
    <span>or <a href="forgatpass.php">Forget your password?</a></span>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    
    <form action="login.php" method="post">
      <input type="text" name="email" placeholder="Enter your mail">
      <input type="password" name="password" placeholder="Enter your password">
      <input type="submit" value="Send">


    </form>
    
  </body>

  </html>    