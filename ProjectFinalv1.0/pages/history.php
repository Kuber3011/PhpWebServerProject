<?php
ob_start();
    require 'db.php'; 
ob_clean();
require '../partials/header.php';
    session_start();
    $regorder = $_SESSION['registrationOrder'];
    if(isset($_SESSION['lives'])){
        $l = 6 - $_SESSION['lives'];
        if($_SESSION['lives'] > 0 && !isset($_SESSION['row_inserted'])){
            $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
            VALUES(now(), 'incomplete', '$l', '$regorder')";
            $connection->query($query1);
        }
    }
    $_SESSION['lives'] = 6;
    var_dump($_SESSION['lives']);  //Change value here    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        td, th{
            padding: 5px;
            border: 1px solid black;
        }
        label{  
            color: blue;
            width: 50px;
            padding: 5px 10px;
            background-color: #e0e0e0;
            border: 1px solid black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h3>Player Details</h3>
<?php
    echo "<div><label>First Name :</label><label>".$_SESSION['fName']."    </label></div><br>";
    echo "<div><label>Last Name  :</label><label>".$_SESSION['lName']."    </label></div><br>";
    echo "<div><label>Email      :</label><label>".$_SESSION['email']."    </label></div><br>";
    echo '<br/><br/><a href = "game1.php"> PLAY GAME </a><br/><br/>';
    echo '<table>';
    echo '<tr><th>Reg.Order</th><th>ScoreTime</th><th>Result</th><th>LivesUsed</th></tr>';
    $result = $connection->query("SELECT scoreTime, result, livesUsed FROM score WHERE registrationOrder='$regorder';");    
    $count_row = $result->num_rows;
    for ($i = 1; $i <= $count_row; ++$i){
        $each_row = $result->fetch_array(MYSQLI_ASSOC);
        echo '<tr>';
        echo '<td>'.$regorder.'</td>';
        foreach ($each_row as $section => $item){ 
            echo '<td>'.$item.'</td>';
        }
        echo '</tr>';
    }

    echo '</table>';  
    include('../partials/footer.php');      
?> 
</body>
</html>

