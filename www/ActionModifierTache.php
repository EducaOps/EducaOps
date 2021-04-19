<?php
include 'Controller/ModificationTacheController.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
ModifierTache($_REQUEST["ID_Tache"],$_REQUEST["Titre"],$_REQUEST["Description"],$_REQUEST["Avancement"]);
?>
<p>Action reussi</p> 
<a href="ListeTache.php">Retour a la page principale</a>
</body>
</html>