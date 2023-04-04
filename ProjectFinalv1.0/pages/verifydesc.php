<?php
ob_start();
include('db.php');
ob_clean();
include('verfunc.php');
$reg = $_SESSION['registrationOrder'];

$randomLettersString = $_GET['letters'];
$randomLetters = explode(',', $randomLettersString);
$sorted_array = rsort($randomLetters);
$inp_arr = $_POST['txt'];

foreach ($randomLetters as $key => $value) {
    $randomLetters[$key] = strtolower($value);
}
foreach ($inp_arr as $key => $value) {
    $inp_arr[$key] = (string)($value);
}
foreach ($inp_arr as $key => $value) {
    $inp_arr[$key] = strtolower($value);
}
$result = check_result($randomLetters,$inp_arr);
echo $result[1];
if($result[0]==0){
    echo '<br/><br/><a href="game'.$_SESSION['level'].'.php">Try this level again </a>';
    $_SESSION['lives']--;
    if($_SESSION['lives']<=0){
        $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
            VALUES(now(), 'failure', 6, '$reg')";
        $connection->query($query1);
        $_SESSION['row_inserted'] = true;
        header("location: history.php");
    }
    echo '<br/><br/><a href="history.php">Quit</a>';    
}else{
    $_SESSION['level']++;
    echo '<br/><br/><a href="game'.$_SESSION['level'].'.php">Move to next Level</a>';
    echo '<br/><br/><a href="history.php">Quit</a>';
}