<?php
require '../partials/header.php';
session_start();
$_SESSION['level']=3;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include('verify.php');
}else{
    include('gameformnumbers.php');
    $verificationURL = "game3.php?letters=$randomLettersString";
    echo '<h3>Write the numbers in asscending order in the given boxes</h3><br>';
    include('sampleform.php');
}
include('../partials/footer.php');