<?php
require '../partials/header.php';
session_start();
$_SESSION['level']=5;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include('verify5.php');
}else{
    include('gameformletters.php');
    $verificationURL = "game5.php?letters=$randomLettersString";
    echo'
        <form action='.$verificationURL.' method="post">
        <h3>Write the first and last letter in the boxes below</h3><br>
        <input width="50px" id="txt1" name="txt1" type="text" value=""></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         
        <input width="50px" id="txt2" name="txt2" type="text" value=""></input>
        <button type="submit">Click Karo</button>
        </form>
    ';
}
include('../partials/footer.php');