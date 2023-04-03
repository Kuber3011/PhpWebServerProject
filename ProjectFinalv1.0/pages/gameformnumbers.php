<?php
ob_start();
include('db.php');
ob_clean();
$life = 10;
if (isset($_SESSION['lives'])){
    $life = $_SESSION['lives'];
}

$numbers = array();
while(count($numbers) < 6){
    $rand_num = rand(1, 100);
    if(!in_array($rand_num, $numbers)){
        $numbers[] = $rand_num;
    }
}
$randomLettersString = implode(',', $numbers); 
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
</head>
<body>
    <h2>Lives Left: </h2> <h3 id="lives"><?php echo $life; ?></h3>
    <h3>Given the following characters</h3><br><br><br>    
        <label id="lbl1"><?php echo $numbers[0];?></label>
        <label id="lbl2"><?php echo $numbers[1];?></label>
        <label id="lbl3"><?php echo $numbers[2];?></label>
        <label id="lbl4"><?php echo $numbers[3];?></label>
        <label id="lbl5"><?php echo $numbers[4];?></label>
        <label id="lbl6"><?php echo $numbers[5];?></label><br><br><br>        
</body>
</html>