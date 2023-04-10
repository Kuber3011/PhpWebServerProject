<?php
  define('HOST','localhost');
  define('USER','root');
  define('PASS','');
  $tabname1='users';
  $tabname3='score';

  $connection = new mysqli(HOST, USER, PASS);

  $dbname1 = 'php_kidsgames';
  $connection->query("CREATE DATABASE IF NOT EXISTS $dbname1;");

  //3-Connect to the DB 

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

$createTbScore=$connection->query("CREATE TABLE IF NOT EXISTS $tabname3( 
    scoreTime DATETIME NOT NULL, 
    result ENUM('success', 'failure', 'incomplete'),
    livesUsed INTEGER NOT NULL,
    registrationOrder INTEGER,
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
  $q = "INSERT INTO users(fName, lName, email, userName, password, registrationTime) VALUES('$firstname','$lastname', '$mail', '$username', '$passCode', $currentTime)";    
  $connection->query($q);
  $result=$connection->query("SELECT registrationOrder FROM users WHERE userName='$username';"); 

  $count_row = $result->num_rows;
  $password='kuber1234';
  $passCode=password_hash($password, PASSWORD_DEFAULT);
  $firstname='Kuber';
  $lastname='Singh';
  $username='kuber';
  $currentTime='now()';
  $mail = 'kuber@gmail.com';
  $q = "INSERT INTO users(fName, lName, email, userName, password, registrationTime) VALUES('$firstname','$lastname', '$mail', '$username', '$passCode', $currentTime)";    
  $connection->query($q);
  $password='1234';
  $passCode=password_hash($password, PASSWORD_DEFAULT);
  $firstname='Surya';
  $lastname='Prakash';
  $username='suraj';
  $currentTime='now()';
  $mail = 'suraj@gmail.com';
  $q = "INSERT INTO users(fName, lName, email, userName, password, registrationTime) VALUES('$firstname','$lastname', '$mail', '$username', '$passCode', $currentTime)";    
  $connection->query($q); 

  $q = "SELECT * FROM score";
  $result = $connection->query($q);
  if($result->num_rows == 0){
    $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
    VALUES(now(), 'success', 4, 1)";
    $connection->query($query1);
    $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
    VALUES(now(), 'failure', 6, 2)";
    $connection->query($query1);
    $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
    VALUES(now(), 'incomplete', 5, 3)";
    $connection->query($query1);
  }

