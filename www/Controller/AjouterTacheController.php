<?php
//creer fonction ajout tache

function AjouterTache($UnTitre,$UneDescription, $UnAvancement)
{
	try 
	{  	 	 
		$base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql = 'INSERT INTO tache (Titre_Tache, Description_Tache, Avancement_Tache) VALUES (:Titre, :Description, :Avancement)	';
		try
		{
			$resultat = $base->prepare($sql);
			$resultat->bindParam(':Titre', $UnTitre);
			$resultat->bindParam(':Description', $UneDescription);
			$resultat->bindParam(':Avancement', $UnAvancement);
			$resultat->execute();
			$resultat ->closeCursor();
		}
		catch(Exeption $erreur)
		{
			die('erreur lors de la selection dans la table : ' . $erreur->getMessage());
		}
	}
	catch (Exeption $erreur)
	{
		die('Erreur de conenction a la bd : '  . $erreur->getMessage());
	}
}


?>