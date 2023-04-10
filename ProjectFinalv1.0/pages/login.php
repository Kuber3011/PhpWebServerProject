<?php
session_start();
  ob_start();
  require 'db.php';
  ob_clean();
  
  // session_start();
  if (isset($_POST['submit'])){      
    $val1 = $_POST['username'];
    $val2 = $_POST['password'];
    $query1 = "SELECT registrationOrder, fName, lName, email,password FROM users WHERE userName = '$val1'";
    $result=$connection->query($query1);
    $count_row = $result->num_rows;
    if($count_row != 0){
      $row = $result->fetch_array(MYSQLI_ASSOC);
      var_dump($row);
      if (password_verify($val2, $row['password'])){
        // session_start();
          foreach ($row as $section => $item){
            $_SESSION[$section] = $item;
          } 
        $_SESSION['userName'] = $val1;
        $_SESSION['row_inserted'] = true;
        header("Location: history.php");
      }else{
        echo 'Incorrect Password';
      }
    }else{
      echo "<h3>Sorry. Credentials don't match</h3>";
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
    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>
    <span>or <a href="forgetpass.php">Forget your password?</a></span>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <?php if(isset($_SESSION["signup_message"])){
      $m = $_SESSION["signup_message"];
      echo '<h4>'.$m.'</h4>';
    }
    ?>  
    <?php if(isset($_SESSION['forgetpass'])){
      $m = $_SESSION['forgetpass'];
      echo '<h4>'.$m.'</h4>';
    }
      ?>   
    <form action="login.php" method="post">
      <input type="text" name="username" placeholder="Enter your username">
      <input type="password" name="password" placeholder="Enter your password">
      <input type="submit" name="submit" value="Send">
    </form>    
  </body>
  </html>
  <?php
  include('../partials/footer.php');
  ?>
