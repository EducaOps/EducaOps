<?php
session_start();
require "../Classe/SQLRequest.php";
require "../Classe/ActionPage.php";

use ActionPage\Action;

$SQLAccount = new SQLAccount();
$Action = new Action();
$result = $SQLAccount->VerifAccountExist($_REQUEST['email'], $_REQUEST['password']);
if($result){
    $_SESSION['email']=$_REQUEST['email'];
    $_SESSION['role']=$result[0][0];
    $Action->RedirectToURL("../Vue/ListeTache.php");
}
else{
    $Action->RedirectToURL("../Vue/login.php");
}
exit;

?>