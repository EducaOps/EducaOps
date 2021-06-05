<?php
session_start();
require "../Classe/ActionPage.php";
use ActionPage\Action;

$Action = new Action();

if(!isset($_SESSION['email'])){
    $_SESSION['current'] = $_SERVER['REQUEST_URI'];
    $Action->RedirectToURL("login.php");
}
else {
    if($_SERVER["REQUEST_URI"] == 'Vue/login.php'){
        $Action->RedirectToURL("ListeTache.php");
    }
}
$admin = $_SESSION['role_id']==0;
$professeur = $_SESSION['role_id']==1 || $admin;
$eleves = $_SESSION['role_id']==2;

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>