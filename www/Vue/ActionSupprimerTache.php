<?php
include 'session.php';
include '../Controller/SuppressionTacheController.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Validation Supression</title>
</head>
<body>
<?php
        include '../Model/Header.php';
    ?>


<?php
SupprimerTache($_REQUEST["ID"]);

use ActionPage\Action;
$Action = new Action();
$Action->RedirectToURL("ListeTache.php");
?>
<h1 class="p-0 m-0" style="font-size: 45px; color: #f9a328;">Supperssion réussi</h1>
<a class="btn btn-primary" href="ListeTache.php">Retour a la page précédente</a>
<?php
        include '../Model/Footer.html';
    ?>
</body>
</html>