<?php
session_start();

if(empty($_SESSION["email"])){
    $_SESSION["current"] = $_SERVER["REQUEST_URI"];
    header('Location: /Vue/login.php');
}
else {
    echo $_SERVER["REQUEST_URI"];
    if($_SERVER["REQUEST_URI"] == '/Vue/login.php'){
        header('Location: /Vue/Welcome.php');
    }
}

?>