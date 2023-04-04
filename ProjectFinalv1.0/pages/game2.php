<?php
require '../partials/header.php';
session_start();
$_SESSION['level']=2;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include('verifydesc.php');
}else{
    include('gameformletters.php');
    $verificationURL = "game2.php?letters=$randomLettersString";
    echo '<h3>Write the letters in descending order in the given boxes</h3><br>';
    include('sampleform.php');
}
include('../partials/footer.php');

