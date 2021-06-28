<?php

function SupprimerTache($UnId)
{
	try 
	{  	 	 
		$base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql = 'CALL Supression_Tache(:ID)	';
		try
		{
			$resultat = $base->prepare($sql);
			$resultat->bindParam(':ID', $UnId);
			$resultat->execute();		
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