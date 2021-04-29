<?php
include 'session.php';
include '../Controller/ModificationTacheController.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Validation Modification</title>
</head>
<body>
<?php
        include '../Model/Header.php';
    ?>

<?php
ModifierTache($_REQUEST["ID_Tache"],$_REQUEST["Titre"],$_REQUEST["Description"],$_REQUEST["Avancement"]);

use ActionPage\Action;
$Action = new Action();
$Action->RedirectToURL("ListeTache.php");

?>
<h1 class="p-0 m-0" style="font-size: 45px; color: #f9a328;">Modification réussi</h1>
<a class="btn btn-primary" href="ListeTache.php">Retour a la page précédente</a>
<?php
        include '../Model/Footer.html';
    ?>
</body>
</html>