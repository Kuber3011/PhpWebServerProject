<?php
ob_start();
include('db.php');
ob_clean();
$reg = $_SESSION['registrationOrder'];
$randomLettersString = $_GET['letters'];
$randomLetters = explode(',', $randomLettersString);
$sorted_array = sort($randomLetters);
if(strtolower($_POST['txt1']) == strtolower($randomLetters[0]) && strtolower($_POST['txt2']) == strtolower($randomLetters[5])){
    echo '<br/><br/>Correct Answer';
    $_SESSION['level']++;
    echo '<br/><br/><a href="game'.$_SESSION['level'].'.php">Move to next Level</a>';
    echo '<br/><br/><a href="history.php">Quit</a>';
}else{
    $_SESSION['lives']--;
    if($_SESSION['lives']<=0){
        $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
            VALUES(now(), 'failure', 6, '$reg')";
        $connection->query($query1);
        $_SESSION['row_inserted'] = true;
        header("location: history.php");
    }
    echo '<a href="game5.php">Your answer is incorrect. Please try again</a>';
    echo '<br/><br/><a href="history.php">Quit</a>';
}
