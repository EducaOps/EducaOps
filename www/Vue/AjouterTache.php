
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter une tache</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php
        include '../Model/Header.html';
    ?>
	<h1 class="p-0 m-0" style="font-size: 45px; color: #f9a328;">Ajouter une tache</h1>
	<form class="mt-4" action="ActionAjouterTache.php" method="POST">
		<table class="table table-striped">
			<tr>
				<td>Titre</td>
				<td>
					<input type="text" name="Titre" value="" size="40" maxlength="40"/>
				</td>
			</tr>
			<tr>
				<td>Description</td>
				<td>
					<input type="text" name="Description" value="" size="40" maxlength="400"/>
				</td>
			</tr>
			<tr>
				<td>Avancement :</td>
				<td>
					<input type="radio" id="En Cours" name="Avancement" value="0"checked>
					<label for="0">En Cours</label>
					<input type="radio" id="Terminée" name="Avancement" value="1">
					<label for="1">Terminée</label>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input class="btn btn-primary" type="submit" name="Envoyer" value="Envoyer">
					<input class="btn btn-primary" type="reset" name="Annuler" value="Annuler">
					
				</td>
			</tr>
		</table>
	</form>
	 <a class="btn btn-primary" href="ListeTache.php">Retour a la page précédente</a>
	 <?php
        include '../Model/Footer.html';
    ?>

</body>
</html>
