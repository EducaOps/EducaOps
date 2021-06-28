<?php
session_start();
require "../Classe/ActionPage.php";
use ActionPage\Action;

$Action = new Action();

session_destroy();
$Action->RedirectToURL("/Vue/ListeTache.php");
?>