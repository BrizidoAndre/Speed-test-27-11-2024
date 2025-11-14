<?php

session_start();

$reverse = isset($_POST['reverse']) ? $_POST['reverse'] : null;

if(!$reverse){
    $_SESSION['reverse'] = '';
    header('Location: index.php');
    exit();
}
$reverse = str_split($reverse);
$reverse = array_reverse($reverse);
$reverse = implode('', $reverse);
$reverse = strtoupper($reverse);

$_SESSION['reverse'] = $reverse;
header('Location: index.php');