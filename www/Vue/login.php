<?php
require "../Classe/ActionPage.php";
use ActionPage\Action;

$Action = new Action();

session_start();

if($_SERVER["REQUEST_URI"] == '/Vue/login.php'){
    $Action->RedirectToURL("/index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
        include '../Model/login_form.html';
    ?>
</body>
</html>

