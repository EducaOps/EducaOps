<?php
include '../Controller/SuppressionTacheController.php';
//include "session.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Validation Supression</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
        include '../Model/Header.html';
    ?>


<?php
SupprimerTache($_REQUEST["ID"]);
?>
<h1 class="p-0 m-0" style="font-size: 45px; color: #f9a328;">Supperssion réussi</h1>
<a class="btn btn-primary" href="ListeTache.php">Retour a la page précédente</a>
<?php
        include '../Model/Footer.html';
    ?>
</body>
</html>