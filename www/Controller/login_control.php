<?php
require "../Classe/SQLRequest.php";

use SQL\SQLAccount;

$SQLAccount = new SQLAccount();

if($SQLAccount->VerifAccountOK($_REQUEST['email'], $_REQUEST['password'])){
    $_SESSION["email"]=$_REQUEST['email'];
    echo $_SESSION["current"];
    header('Location: /Vue/Welcome.php');
}

?>