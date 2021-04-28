
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
	<div class="container mb-3 mt-3">
	<h1 class="p-0 m-0" style="font-size: 45px; color: #f9a328;">Ajouter une tache</h1>
	<form class="mt-4" action="ActionAjouterTache.php" method="POST">
		<table class="table table-striped">
			<tr>
				<td>Titre</td>
				<td>
					<input  class="form-control" type="text" name="Titre" value="" size="40" maxlength="40"/>
				</td>
			</tr>
			<tr>
				<td>Description</td>
				<td>
					<textarea class="form-control" rows="5" name="Description" id="comment"></textarea>
				</td>
			</tr>
			<tr>
				<td>Avancement :</td>
				<td>
					<input type="radio" id="En Cours" name="Avancement" value="0"checked>
					<label for="0">En Cours</label>
					<br />
					<input type="radio" id="Terminée" name="Avancement" value="1">
					<label for="1">Terminée</label>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input class="btn btn-success" type="submit" name="Envoyer" value="Envoyer">
					<input class="btn btn-danger" type="reset" name="Annuler" value="Annuler">
					
				</td>
			</tr>
		</table>
	</form>
	 <a class="btn btn-warning" href="ListeTache.php">Retour a la page précédente</a>
	 </div>
	 <?php
        include '../Model/Footer.html';
    ?>

</body>
</html>
