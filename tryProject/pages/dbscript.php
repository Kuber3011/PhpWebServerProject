

<?php
/*
Simple process to connect the script with MySQL via MySQLi
Without showing error messages when there are.
*/

//User data
$password='mypoPass84!';
$passCode=password_hash($password, PASSWORD_DEFAULT);
$firstname='Patrick';
$lastname='Saint-Louis';
$username='SaiVid456';
$currentTime='now()';
$mail = 'somet@asd.com';

//Login info 
define('HOST','localhost');
define('USER','root');
define('PASS','');

//Database info
$dbname1='ph_login_database';
$tabname1='users';
$tabname2='authenticator';
$tabname3='score';
$vwname1='history';

//1-Connect to the DBMS MySQL
$connection = new mysqli(HOST, USER, PASS);

//2-Create the DB customer if it doesn't exist yet
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


// $connection->query("CREATE TABLE IF NOT EXISTS $tabname2(   
//     passCode VARCHAR(255) NOT NULL,
//     registrationOrder INTEGER, 
//     FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
// )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");

$connection->query("CREATE TABLE $tabname3( 
    scoreTime DATETIME NOT NULL, 
    result ENUM('success', 'failure', 'incomplete'),
    livesUsed INTEGER NOT NULL,
    registrationOrder INTEGER, 
    FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");

//view creation
$connection->query("CREATE VIEW $vwname1 AS
SELECT s.scoreTime, p.id, p.fName, p.lName, s.result, s.livesUsed 
FROM user p, score s
WHERE u.registrationOrder = s.registrationOrder;");

//5-Check that the TABLES exist
$connection->query("DESC user;");
// $connection->query("DESC authenticator;");
$connection->query("DESC score;");
$connection->query("DESC history;");

$q = "INSERT INTO users(fName, lName, userName, password, registrationTime) VALUES('$firstname','$lastname', '$username', '$password', $currentTime)";
//6-Insert data into the TABLE users
$connection->query($q);

$password='kuber1234';
$passCode=password_hash($password, PASSWORD_DEFAULT);
$firstname='Kuber';
$lastname='Singh';
$username='kuber';
$currentTime='now()';
$mail = 'kuber@gmail.com';

$q = "INSERT INTO users(fName, lName, userName, password, registrationTime) VALUES('$firstname','$lastname', '$username', '$password', $currentTime)";
//6-Insert data into the TABLE users
$connection->query($q);

//7-Select 1 column from a row of the TABLE Player
$result=$connection->query("SELECT registrationOrder FROM users WHERE userName='$username';"); 


//8-Save the data selected from the TABLE Player
$count_row = $result->num_rows;
echo $count_row;
for ($i = 1 ; $i <= $count_row ; ++$i){
    $each_row = $result->fetch_array(MYSQLI_ASSOC);
    echo '\nlikha bc\n';
    foreach ($each_row as $section => $item)
        $row_saved["row$i"]["$section"]=$item;
        echo 'likha bc\n';
}

foreach ($row_saved as $section => $item){
    foreach ($item as $key => $value){
        $oneColumn=$value;
        echo $value;
    }
}

$matching_reg_order=intval($oneColumn);
var_dump($oneColumn);
var_dump($matching_reg_order);
//6-Insert data into the TABLE Authenticator
// $insAuthent=$connection->query("INSERT INTO authenticator(passCode, registrationOrder)
// VALUES('$passCode', $matching_reg_order);");

//9-Disconnect from the DBMS MySQL
$connection->close();

?>
<!-- 
Player Table 1 
id
username
pass
firstname
lastname    
regtime

Player Table 2 for score history
id
usrname
score
level
score time

PLayer table 3 for all games played
Game num
id
username
level
status
score if complete

 -->