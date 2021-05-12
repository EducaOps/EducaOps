<?php

function LaTache($UnId)
{ 	
    $LaTache;
    try {  	 	 
		$base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
		
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		try
		{
			$resultat = $base->prepare('SELECT Titre_Tache, Description_Tache, Avancement_Tache FROM tache where ID_Tache = :ID');
	        $resultat->bindParam(':ID', $UnId);
	        $resultat->execute();
            $LaTache = $resultat->fetch();
		    $resultat ->closeCursor();
		}
		catch(Exeption $erreur)
		{
			echo $erreur->getMessage();
		}
	}
	catch (Exeption $erreur)
	{
		echo 'Erreur de connexion a la bd : '  . $erreur->getMessage();
	}
    return $LaTache;
}


function ModifierTache($UnId, $UnTitre,$UneDescription, $UnAvancement)
{
	try 
	{  	 	 
		$base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql = 'CALL Modification_Tache(:ID, :Titre, :Description, :Avancement)';		
		try
		{
			$resultat = $base->prepare($sql);
			$resultat->bindParam(':Titre', $UnTitre);
			$resultat->bindParam(':Description', $UneDescription);
			$resultat->bindParam(':Avancement', $UnAvancement);
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