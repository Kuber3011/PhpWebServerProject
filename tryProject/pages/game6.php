<?php
    require 'db.php'; 
    session_start();
    $regorder = $_SESSION['registrationOrder'];
    $life = $_SESSION['livesAvailable']; 
    if(isset($_COOKIE['game_result_5'])){
        if ($_COOKIE['game_result_5'] == "won"){
            echo ' YOU won your last game ';
            $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
                VALUES(now(), 'success', '$life', '$regorder')";
            $connection->query($query1);
            unset($_COOKIE['game_result_5']);
        }
    }
    // if(isset($_COOKIE['game_result_5'])){
    //     echo 'nai gayi';
    // }else{
    //     echo 'gayi finally';
    // }
    


    // $_SESSION['gamestat'] = "";
    // $regorder = $_SESSION['registrationOrder'];
    // $life = $_SESSION['livesAvailable'];
    // if(isset($_COOKIE['game_result_6'])){
    //     echo 'if(isset($_COOKIE))';
    // }

    // if(isset($_COOKIE['game_result_6'])){
    //     $_SESSION['gamestat'] = $_COOKIE['game_result_5'];
    //     unset($_COOKIE['game_result_6']);
    // }
    // echo 'cookie: ';
    // var_dump($_COOKIE['game_result_6']);
    // echo 'stat: ';
    // var_dump($_SESSION['gamestat']);
    // if($_SESSION['gamestat'] == "won"){
    //     echo ' YOU won your last game ';
    //     $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
    //         VALUES(now(), 'success', '$life', '$regorder')";
    //     $connection->query($query1);
    //     $_SESSION['gamestat'] = "";
    //     unset($_COOKIE['game_result_6']);
    //     header("Location: history.php");
    // }
    // var_dump($_SESSION['gamestat']);

    // if($_SESSION['gamestat'] == "lost"){
    //     echo 'You Failed. Try Again';
    //     $_SESSION['livesAvailable'] = $_SESSION['livesAvailable'] - 1;
    //     var_dump($_SESSION['livesAvailable']);
    //     unset($_COOKIE['game_result_6']);
    //     $_SESSION['gamestat'] = "";
    // }
    // var_dump($_SESSION['gamestat']);

    $life = $_SESSION['livesAvailable'];

    $num_array = [];

    for($i = 0; $i<100; $i++){
        array_push($num_array, $i+1);
    }
    $chara = [];
    $len = count($num_array);
    for ($i = 0; $i < 6; $i++) {
        $x = $num_array[random_int(0, $len-1)];
        array_push($chara, $x);
        foreach ($num_array as $key => $value){
            if ($value == $x) {
                unset($num_array[$key]);
            }
        }
        // $num_array = array_diff($num_array,[$x]);
        $len -= 1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Level 6</title>
    <style>
        label{
            color: red;
            padding: 30px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../javascript/level6.js"></script>

</head>
<body>
    <h2>Lives Left: </h2> <h3 id="lives"><?php echo $life; ?></h3>
    <h3>Given the following characters</h3><br><br><br>
    <form action="game5.php" method="post">
        <label id="lbl1"><?php echo $chara[0];?></label>
        <label id="lbl2"><?php echo $chara[1];?></label>
        <label id="lbl3"><?php echo $chara[2];?></label>
        <label id="lbl4"><?php echo $chara[3];?></label>
        <label id="lbl5"><?php echo $chara[4];?></label>
        <label id="lbl6"><?php echo $chara[5];?></label><br><br><br>
        <h3>Write the first and last letter in the boxes below</h3><br>
        <input width="50px" id="txt1" type="text" value="type1"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         
        <input width="50px" id="txt2" type="text" value="type2"></input>
        <button type="button" onclick="check()">Click Karo</button>
    </form>
</body>
</html>