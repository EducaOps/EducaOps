<?php
include '../Controller/ListeTacheController.php';
include "session.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Liste des taches</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<?php
        include '../Model/Header.html';
    ?>
<a class="btn btn-primary btn-lg" href="AjouterTache.php">ajouter une tache</a>
<h1 class="p-0 m-0" style="font-size: 45px; color: #f9a328;">Liste des taches en cours</h1>
	<table class="table table-striped"><tr><th>Titre</th><th>Description</th><th>Modifier</th><th>Supprimer</th><tr>
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
		   </td>
		   <td>
			   <a href="ActionSupprimerTache.php?ID=<?php echo $value[0]?>" >Supprimer</a> 
		   </td></tr>
		   <?php
 	  	}
		?>
	</table>

	<h1 class="p-0 m-0" style="font-size: 45px; color: #f9a328;">Liste des taches en terminées</h1>
	<table class="table table-striped"><tr><th>Titre</th><th>Description</th><th>Options</th>
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
	<?php
        include '../Model/Footer.html';
    ?>
</body>
</html>
