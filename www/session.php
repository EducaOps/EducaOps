<?php

if(empty($_SESSION['email'])){
    header('Location: /Vue/login.php');
}

?>