<?php
  session_start();
  $regorder = $_SESSION['registrationOrder'];
  if(isset($_SESSION['lives'])){
    $l = 6 - $_SESSION['lives'];
    if($_SESSION['lives'] > 0 && $_SESSION['lives'] != 6){
        $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
        VALUES(now(), 'incomplete', '$l', '$regorder')";
        $connection->query($query1);
        $_SESSION['row_inserted'] = true;
    }
  }
  session_unset();

  session_destroy();

  header('Location: login.php');
?>