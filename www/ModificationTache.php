<?php
include 'Controller/ModificationTacheController.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifier une tache</title>
</head>
<body>
	<form action="ActionModifierTache.php?ID_Tache=<?php echo $_REQUEST['ID']?>" method="POST">
		<table>
			<tr>
				<td>Titre</td>
				<td>
					<input type="text" name="Titre" value="<?php echo LaTache($_REQUEST['ID'])['Titre_Tache'];?>" size="40" maxlength="40"/>
				</td>
			</tr>
			<tr>
				<td>Description</td>
				<td>
					<input type="text" name="Description" value="<?php echo  LaTache($_REQUEST['ID'])['Description_Tache'];?>" size="40" maxlength="400"/>
				</td>
			</tr>
			<tr>
				<td>Avancement</td>
				<td>
					<input type="number" name="Avancement" value="<?php echo  LaTache($_REQUEST['ID'])['Avancement_Tache'];?>" size="1" maxlength="1"/>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input type="submit" name="Envoyer" value="Envoyer">
					<input type="reset" name="Annuler" value="Annuler">
					
				</td>
			</tr>
		</table>
	</form>
	 <a href="ListeTache.php">Retour a la page précédente</a>

</body>
</html>
