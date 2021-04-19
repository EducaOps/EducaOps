<?php
include 'Controller/ListeTacheController.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Liste des taches</title>
</head>
<body>
<a href="AjouterTache.html">ajouter une tache</a>

<h1>Liste des taches en cours</h1>
	<table border = '1'><tr><th>Titre</th><th>Description</th><th>Options</th>
   <?php
   		echo "Nombre de Taches : ".CountEnCour() . "<br/><br/>";
   		foreach(TachesEnCour() as $value)
   		{
		   ?>
		   <tr><td>
			   <?php echo $value[1]; ?>
		   </td><td>
			   <?php echo $value[2]; ?>
		   </td><td>
			   <a href="ModificationTache.php?ID=<?php echo $value[0]?>" >Modifier</a> 
		   </td></tr>
		   <?php
 	  	}
		?>
	</table>

	<h1>Liste des taches en terminées</h1>
	<table border = '1'><tr><th>Titre</th><th>Description</th><th>Options</th>
   <?php
   		echo "Nombre de Taches : ".CountFini() . "<br/><br/>";
   		foreach(TachesFini() as $value)
   		{
		   ?>
		   <tr><td>
			   <?php echo $value[1]; ?>
		   </td><td>
			   <?php echo $value[2]; ?>
		   </td><td>
			   <a href="ModificationTache.php?ID=<?php echo $value[0]?>" >Modifier</a> 
		   </td></tr>
		   <?php
 	  	}
		?>
	</table>
</body>
</html>
