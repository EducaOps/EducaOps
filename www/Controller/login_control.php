<?php
session_start();
require "../Classe/SQLRequest.php";
require "../Classe/ActionPage.php";

use ActionPage\Action;

$SQLAccount = new SQLAccount();
$Action = new Action();


if($SQLAccount->VerifAccountExist($_REQUEST['email'], $_REQUEST['password'])){
    $_SESSION['email']=$_REQUEST['email'];
    $Action->RedirectToURL("../Vue/ListeTache.php");
}
else{
    $Action->RedirectToURL("../Vue/login.php");
}
exit;

?>