<?php
session_start();
  ob_start();
  require 'db.php';
  ob_clean();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    
    // Check if the username exists in the database
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    $count_row = mysqli_num_rows($result);

    if ($count_row == 1) {
        // Update the user's password in the database
        $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_query = "UPDATE users SET password='$hash_password' WHERE username='$username'";
        mysqli_query($connection, $update_query);
        $_SESSION['forgetpass'] = "Your new password has been updated successfully. Kindly Log in";
        header("location: login.php"); 
    } else {
        $error_message = "Invalid username. Please try again.";
    }
  }
?>

<!DOCTYPE html>
  <html>
    <head>
      <title>ForgotPassword</title> 
      <link rel="stylesheet" href="../assets/css/styles.css"> 
    </head>
  <body>  
    <h1>Forgot Password?</h1>
    <span>or <a href="signup.php">SignUp</a></span>
    <span>or <a href="login.php">Log IN</a></span>
        
    <form action="forgetpass.php" method="post">
      <input type="text" name="username" placeholder="Enter your username">
      <input type="password" name="new_password" placeholder="Enter new password">
      <input type="password" name="password" placeholder="Confirm Password">
      <input type="submit" name="submit" value="Send">
    </form>    
  </body>
  </html>
  <?php
  include('../partials/footer.php');
  ?>