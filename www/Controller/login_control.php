<?php
require "../Classe/SQLRequest.php";
require "../Classe/ActionPage.php";

use ActionPage\Action;
use SQLAccount;

$SQLAccount = new SQLAccount();
$Action = new Action();

if($SQLAccount->VerifAccountExist($_REQUEST['email'], $_REQUEST['password'])){
    session_start();
    $_SESSION['email']=$_REQUEST['email'];
    $Action->RedirectToURL("../index.php");
}

?>