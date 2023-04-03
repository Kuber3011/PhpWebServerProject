<?php
  require 'db.php';
  session_start();
  if (isset($_POST['submit'])){      
    $val1 = $_POST['email'];
    $val2 = $_POST['password'];
    // var_dump($val1);
    // var_dump($val2);
    // echo 'in submit';
    $query1 = "SELECT registrationOrder, fName, lName FROM users WHERE email = '$val1' AND password = '$val2'";
    $result=$connection->query($query1);
    // var_dump($result);
    // var_dump($result->num_rows);
    $count_row = $result->num_rows;
    if($count_row != 0){
      session_start();
      for ($i = 1 ; $i <= $count_row ; ++$i){
        $each_row = $result->fetch_array(MYSQLI_ASSOC);
        foreach ($each_row as $section => $item){
          // $row_saved["row$i"]["$section"]=$item;
          // echo ' '.$section.' : '.$item.'<br>';
          $_SESSION[$section] = $item;
        }            
      }
      $_SESSION['email'] = $val1;
      $_SESSION['livesAvailable'] = 6;
      echo $_SESSION['registrationOrder'].'<br>';      
      echo $_SESSION['fName'].'<br>';
      echo $_SESSION['lName'].'<br>';
      header("Location: history.php");
    }else{
      echo "Sorry. Credentials don't match";
    }
  }
?>


<!DOCTYPE html>
  <html>
    <head>
      <title>Login</title> 
      <link rel="stylesheet" href="../assets/css/styles.css"> 
    </head>
  <body>
  <?php require '../partials/header.php'?>
    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>
    <span>or <a href="forgatpass.php">Forget your password?</a></span>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>    
    <form action="login.php" method="post">
      <input type="text" name="email" placeholder="Enter your mail">
      <input type="password" name="password" placeholder="Enter your password">
      <input type="submit" name="submit" value="Send">
    </form>    
  </body>
  </html>    