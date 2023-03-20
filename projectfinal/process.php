<?php
    /*
    **Sample Page for passing Data to game page   
    */

    $user = isset($_POST['user'])? $_POST['user']:'kuberSingh';
    $pass = isset($_POST['pass'])? $_POST['pass']:'1234';
    $score = isset($_COOKIE['score'])? $_COOKIE['score']:'cookie not set';
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'projectfinal';

    $connection = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);

    $result=$connection->query("SELECT * FROM players");

    while($each_row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '        ID : ' . $each_row['player_id'] . '<br>';
        echo 'First Name : ' . $each_row['player_username'] . '<br>';
        echo 'Last Name  : ' . $each_row['player_password'] . '<br>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
</head>
<body>
    <form action="game.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"><br><br>
            
            <label for="level_select"></label>
            <select name="level_select" id="level_select"><br><br>
            <?php
                for($i=1;$i<6;$i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
            <br><br><input type="submit" name="submit" value="submit">                
            </select>
            </form>
    
</body>
</html>