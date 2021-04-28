<?php
require "../Classe/ActionPage.php";
use ActionPage\Action;

$Action = new Action();

session_start();

if(empty($_SESSION['email'])){
    $_SESSION['current'] = $_SERVER['REQUEST_URI'];
    $Action->RedirectToURL("Vue/login.php");
}
else {
    echo $_SERVER['REQUEST_URI'];
    if($_SERVER["REQUEST_URI"] != 'Vue/main.php'){
        $Action->RedirectToURL("Vue/main.php");
    }
}

?>