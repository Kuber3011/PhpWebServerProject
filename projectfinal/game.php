
<?php
    $lev = isset($_POST['level_select'])? $_POST['level_select']: 1;            
    $name= isset($_POST['name'])? $_POST['name']: 'User';
    $arr = [12, 18, 24, 36, 42];    
    $total_cards = $arr[$lev-1];        
    $score = isset($_COOKIE['score'])? $_COOKIE['score']:'cookie not set';    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameTry</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/jquery-3.6.1.min.js"></script>
    <script src="javascript/cookieFnc.js"></script>
    <script src="javascript/gameplay.js"></script>
</head>
<body>
    <center>
        <?php              
            echo '<h1>Welcome '.$name.'</h1>';
            echo '<h2 align="center">Level: '.$lev.'</h2>';
            echo '<label>Moves: </label><label id="move">0</label>';                           
            $rows = floor(sqrt($total_cards));
            if (!($total_cards % $rows == 0)){
                $rows -= 1;
            }
            $columns = $total_cards/$rows;
            echo'<div class = "board"> ';
            for($i=0;$i<$total_cards;$i++){
                echo '<img class="pics" src="images/ks (1).png" alt="something">';
                if(($i+1)% $columns == 0){
                    echo '<br/>';
                }
            }
            echo '</div>';
            echo '<h2 align="right">Previous Score: '.$score.'seconds</h2>';
            echo '<div class = "tester"></div>';
        ?>
    </center>
</body>
</html>


