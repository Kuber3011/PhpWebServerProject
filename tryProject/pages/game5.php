<?php
    require 'db.php';
    session_start();
    $_SESSION['gamestat'] = "";
    $regorder = $_SESSION['registrationOrder'];
    $life = $_SESSION['livesAvailable'];
    if(isset($_COOKIE['game_result_5'])){
        echo $_COOKIE['game_result_5'];
    }




    // if(isset($_COOKIE['game_result_5'])){
    //     echo 'if(isset($_COOKIE))';
    // }

    // if(isset($_COOKIE['game_result_5'])){
    //     $_SESSION['gamestat'] = $_COOKIE['game_result_5'];
    // }
    // var_dump($_SESSION['gamestat']);
    // if($_SESSION['gamestat'] == "won"){
    //     echo ' YOU won your last game ';
    //     $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
    //         VALUES(now(), 'success', '$life', '$regorder')";
    //     $connection->query($query1);
    //     unset($_COOKIE['game_result_5']);
    //     $_SESSION['gamestat'] = "";
    //     header("Location: game6.php");
    // }
    // var_dump($_SESSION['gamestat']);

    // if($_SESSION['gamestat'] == "lost"){
    //     echo 'You Failed. Try Again';
    //     $_SESSION['livesAvailable'] = $_SESSION['livesAvailable'] - 1;
    //     var_dump($_SESSION['livesAvailable']);
    //     unset($_COOKIE['game_result_5']);
    //     $_SESSION['gamestat'] = "";
    // }

    // echo 'cookie: ';
    // var_dump($_COOKIE['game_result_5']);
    // echo 'stat: ';
    // var_dump($_SESSION['gamestat']);

    $life = $_SESSION['livesAvailable'];
    
    function generateRandomString($length = 6) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $x = $characters[random_int(0, $charactersLength - 1)];
            $characters = str_replace($x,'',$characters);
            $charactersLength -= 1;
            $randomString .= $x;
        }
        return $randomString;
    }
    $string1 = generateRandomString(6);
    $chara = str_split($string1);   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            color: red;
            padding: 30px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../javascript/level5.js"></script>

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