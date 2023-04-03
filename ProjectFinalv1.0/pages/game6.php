<?php
require '../partials/header.php';
session_start();
$_SESSION['level']=6;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include('verify6.php');
}else{
    include('gameformnumbers.php');
    $verificationURL = "game6.php?letters=$randomLettersString";
    echo '
        <h3>Write the first and last letter in the boxes below</h3><br>
        <form action='.$verificationURL.' method="post">
            <input width="50px" name="txt1" type="text" value="type1"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         
            <input width="50px" name="txt2" type="text" value="type2"></input>
            <button type="submit">Click Karo</button>
        </form>
        ';
}
include('../partials/footer.php');

