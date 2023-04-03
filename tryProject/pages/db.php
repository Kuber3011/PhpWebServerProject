<?php
  define('HOST','localhost');
  define('USER','root');
  define('PASS','');
  $tabname1='users';
  $tabname3='score';

  $connection = new mysqli(HOST, USER, PASS);

  $dbname1 = 'login_database';
  $connection->query("CREATE DATABASE IF NOT EXISTS $dbname1;");

  //3-Connect to the DB customer
  mysqli_select_db($connection, $dbname1);


  $createTbPlayer=$connection->query("CREATE TABLE IF NOT EXISTS $tabname1( 
      fName VARCHAR(50) NOT NULL, 
      lName VARCHAR(50) NOT NULL,
      email  VARCHAR(50) NOT NULL,
      password VARCHAR(255) NOT NULL, 
      userName VARCHAR(20) NOT NULL UNIQUE,
      registrationTime DATETIME NOT NULL,
      id VARCHAR(200) GENERATED ALWAYS AS (CONCAT(UPPER(LEFT(fName,2)),UPPER(LEFT(lName,2)),UPPER(LEFT(userName,3)),CAST(registrationTime AS SIGNED))),
      registrationOrder INTEGER AUTO_INCREMENT,
      PRIMARY KEY (registrationOrder)
  )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");

  $connection->query("CREATE TABLE $tabname3( 
    scoreTime DATETIME NOT NULL, 
    result ENUM('success', 'failure', 'incomplete'),
    livesUsed INTEGER NOT NULL,
    FOREIGN KEY (registrationOrder) REFERENCES users(registrationOrder)
  )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");

  //6-Insert data into the TABLE users
  $password='mypoPass84!';
  $passCode=password_hash($password, PASSWORD_DEFAULT);
  $firstname='Patrick';
  $lastname='Saint-Louis';
  $username='SaiVid456';
  $currentTime='now()';
  $mail = 'somet@asd.com';    
  $q = "INSERT INTO users(fName, lName, email, userName, password, registrationTime) VALUES('$firstname','$lastname', '$mail', '$username', '$password', $currentTime)";    
  $connection->query($q);
  $result=$connection->query("SELECT registrationOrder FROM users WHERE userName='$username';"); 
  //8-Save the data selected from the TABLE Player
  $count_row = $result->num_rows;
  echo $count_row;

  $password='kuber1234';
  $passCode=password_hash($password, PASSWORD_DEFAULT);
  $firstname='Kuber';
  $lastname='Singh';
  $username='kuber';
  $currentTime='now()';
  $mail = 'kuber@gmail.com';
  $q = "INSERT INTO users(fName, lName, email, userName, password, registrationTime) VALUES('$firstname','$lastname', '$mail', '$username', '$password', $currentTime)";    
  $connection->query($q);
  $password='1234';
  $passCode=password_hash($password, PASSWORD_DEFAULT);
  $firstname='Surya';
  $lastname='Prakash';
  $username='suraj';
  $currentTime='now()';
  $mail = 'suraj@gmail.com';
  $q = "INSERT INTO users(fName, lName, email, userName, password, registrationTime) VALUES('$firstname','$lastname', '$mail', '$username', '$password', $currentTime)";    
  $connection->query($q);

    


?>
