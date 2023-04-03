<?php
ob_start();
    require 'db.php';
ob_clean();
    $life = 10;
    if (isset($_SESSION['lives'])){
        $life = $_SESSION['lives'];
    }
    $alphabets = range('A', 'Z');
    shuffle($alphabets);
    $randomLetters = array_slice($alphabets, 0, 6);
    $randomLettersString = implode(',', $randomLetters);    
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
</head>
<body>
    <h2>Lives Left: </h2> <h3 id="lives"><?php echo $life; ?></h3>
    <h3>Given the following characters</h3><br><br><br>
        <label id="lbl1"><?php echo $randomLetters[0];?></label>
        <label id="lbl2"><?php echo $randomLetters[1];?></label>
        <label id="lbl3"><?php echo $randomLetters[2];?></label>
        <label id="lbl4"><?php echo $randomLetters[3];?></label>
        <label id="lbl5"><?php echo $randomLetters[4];?></label>
        <label id="lbl6"><?php echo $randomLetters[5];?></label><br><br><br>        
</body>
</html>