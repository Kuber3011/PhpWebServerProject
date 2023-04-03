
<?php
    require 'db.php'; 
    session_start();
    $regorder = $_SESSION['registrationOrder'];
    $_SESSION['livesAvailable'] = 6;  //Change value here
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
        label{
            padding: 20px;
            color: blue;
            width: 50px;
            /* border: 3px solid blue; */
        }
    </style>
</head>
<body>
<?php
    $fields = [];
    $values = [];
    $result=$connection->query("SELECT scoreTime, result, livesUsed FROM score WHERE registrationOrder='$regorder';");
    $each_row = $result->fetch_array(MYSQLI_ASSOC);    
    echo "<label>First Name :</label><label>".$_SESSION['fName']."    </label><br>";
    echo "<label>Last Name  :</label><label>".$_SESSION['lName']."    </label><br>";
    echo "<label>Email      :</label><label>".$_SESSION['email']."    </label><br>";
    echo '<br/><br/><a href = "game5.php"> PLAY GAME </a><br/><br/>';
    $count_row = $result->num_rows;
    for ($i = 1 ; $i <= $count_row ; ++$i){
        foreach ($each_row as $section => $item){ 
            echo '<label>'.$section.' :   </label>';
            echo '<label>'.$item.'</label><br>';
            echo '<br>';        
        }
    }
        
?>  
 
</body>
</html>

