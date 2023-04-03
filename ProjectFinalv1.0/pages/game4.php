<?php
require '../partials/header.php';
session_start();
$_SESSION['level']=4;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include('verifydesc.php');
}else{
    include('gameformnumbers.php');
    $verificationURL = "game4.php?letters=$randomLettersString";
    echo '<h3>Write the numbers in descending order in the given boxes</h3><br>';
    include('sampleform.php');
}
include('../partials/footer.php');
