<?php
include 'Controller/AjouterTacheController.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
AjouterTache($_REQUEST["Titre"],$_REQUEST["Description"],$_REQUEST["Avancement"]);
?>
<p>Action reussi</p> 
<a href="ListeTache.php">Retour a la page principale</a>
</body>
</html>