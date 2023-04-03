<?php
ob_start();
include('db.php');
ob_clean();
$randomLettersString = $_GET['letters'];
$randomLetters = explode(',', $randomLettersString);
$sorted_array = sort($randomLetters);
$livesUsed = 6 - $_SESSION['lives'];
$reg = $_SESSION['registrationOrder'];
if($_POST['txt1'] == $randomLetters[0] && $_POST['txt2'] == $randomLetters[5]){
    echo '<br/><br/>Congratulations. You won';
    $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
    VALUES(now(), 'success', '$livesUsed', '$reg')";
    $connection->query($query1);
    $_SESSION['row_inserted'] = true;
    echo '<br/><br/><a href="game1.php">Play Again</a>';
    echo '<br/><br/><a href="history.php">Quit</a>';
    $_SESSION['lives'] = 0;
}else{
    echo '<a href="game6.php">Your answer is incorrect. Please try again</a>';
    echo '<br/><br/><a href="history.php">Quit</a>';
    $_SESSION['lives']--;
    if($_SESSION['lives']<=0){
        $query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
            VALUES(now(), 'failure', 6, '$reg')";
        $connection->query($query1);
        $_SESSION['row_inserted'] = true;
        header("location: history.php");
    }
}

