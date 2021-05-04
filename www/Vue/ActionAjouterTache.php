<?php
include 'session.php';
include '../Controller/AjouterTacheController.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Validation ajout</title>
</head>
<body>
<?php
        include '../Model/Header.php';
    ?>


<?php
AjouterTache($_REQUEST["Titre"],$_REQUEST["Description"],$_REQUEST["Avancement"]);
use ActionPage\Action;
$Action = new Action();
$Action->RedirectToURL("ListeTache.php");
?>
<h1 class="p-0 m-0" style="font-size: 45px; color: #f9a328;">Ajout réussi</h1>
<a class="btn btn-primary" href="ListeTache.php">Retour a la page précédente</a>
<?php
        include '../Model/Footer.html';
    ?>
</body>
</html>