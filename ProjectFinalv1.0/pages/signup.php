<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['userName'])){
        $mail = $_POST['email'];
        $passcode = $_POST['password'];
        $passcode = password_hash($passcode, PASSWORD_BCRYPT);
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $username = $_POST['userName'];
        $currentTime = date("Y-m-d H:i:s");        
        $query = "INSERT INTO users (fName, lName, userName, email, password, registrationTime) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($query);
        if (!$stmt) {            
            echo "Error preparing statement: " . $connection->error;
        } else {            
            $stmt->bind_param('ssssss', $fname, $lname, $username, $mail, $passcode, $currentTime);            
            $result = $stmt->execute();
            if ($result) {
              session_start();
              $_SESSION["signup_message"] = "Sign Up Successful. Kindly Log in";
                header("location: login.php");                
            } else {                
              if (mysqli_errno($connection) == 1062) {
                // catch "Duplicate entry" error
                echo '<h3>This user already exists.</h3>';
              } else {
                  echo "Error executing statement: " . $stmt->error;
              }
            }
        }
    } else {
        echo '<h3>Fields cannot be empty.</h3>';
    }
}
?>
<!DOCTYPE html>
  <html>
    <head>
    <title>SignUp</title>    
    <link rel="stylesheet" href="../assets/css/styles.css">
  </head>
  <body>
    <?php if(!empty($message)): ?>
      <p><?= $message ?></p>
    <?php endif; ?>
    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>
    <form action="signup.php" method="post">
      <input type="text" name="fName" placeholder="Enter your firstname">
      <input type="text" name="lName" placeholder="Enter your lastname">        
      <input type="text" name="userName" placeholder="Enter your username">
      <input type="text" name="email" placeholder="Enter your mail">
      <input type="password" name="password" placeholder="Enter your password">
      <input type="password" name="confirm_password" placeholder="Confirm your password">     
      <input type="submit" value="Send">
    </form>
  </body>
  </html>  
<?php
include('../partials/footer.php');
?>