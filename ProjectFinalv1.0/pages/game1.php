<?php
require '../partials/header.php';
session_start();
$_SESSION['row_inserted'] = false;
$_SESSION['level']=1;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include('verify.php');
}else{
    include('gameformletters.php');
    $verificationURL = "game1.php?letters=$randomLettersString";
    echo '<h3>Write the letters in asscending order in the given boxes</h3><br>';
    include('sampleform.php');
}
include('../partials/footer.php');

