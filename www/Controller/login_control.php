<?php
session_start();
require "../Classe/SQLAccount.php";
require "../Classe/ActionPage.php";

use ActionPage\Action;

$SQLAccount = new SQLAccount();
$Action = new Action();
$result = $SQLAccount->VerifAccountExist($_REQUEST['email'], $_REQUEST['password']);
if($result){
    $_SESSION['email']=$_REQUEST['email'];
    $_SESSION['NomComplet']=$result[0][0];
    $_SESSION['role_libelle']=$result[0][1];
    $_SESSION['role_id']=$result[0][2];

    $Action->RedirectToURL("../Vue/ListeTache.php");
}
else{
    $Action->RedirectToURL("../Vue/login.php");
}
exit;

?>