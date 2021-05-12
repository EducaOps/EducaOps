 <?php
 //Liste des taches en cours
 function TachesEnCour()
 {
    $ArrayEnCour;
    try {  	 	 
		$base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
		
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		try
		{
			$resultat = $base->query('CALL Tache_En_Cour');
			$ArrayEnCour = $resultat->FetchAll();
		    //fermeture de la rq
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
    return $ArrayEnCour;
 }
//Nombre de taches en cour
 function CountEnCour()
 {
    $nombreTachesEnCour;
     try {  	 	 
         $base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
         
         $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         try
         {
             $resultat = $base->query('CALL Tache_En_Cour');
             $nombreTachesEnCour = $resultat->rowCount();
             $resultat ->closeCursor();
         }
         catch(Exeption $erreur)
         {
             echo  $erreur->getMessage();
         }
     }
     catch (Exeption $erreur)
     {
         echo 'Erreur de connexion a la bd : '  . $erreur->getMessage();
     }
     return $nombreTachesEnCour;
 }
//Liste des taches fini
 function TachesFini()
 {

    $ArrayFini;
     try {  	 	 
         $base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
         $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         try
         {
             $resultat = $base->query('CALL Tache_Fini');
             $ArrayFini = $resultat->fetchAll();
             $resultat ->closeCursor();
         }
         catch(Exeption $erreur)
         {
             echo $erreur->getMessage();
         }
     }
     catch (Exeption $erreur)
     {
         die('Erreur de connexion a la bd : '  . $erreur->getMessage());
     }
     return $ArrayFini;
 }
//Nombre de taches fini
 function CountFini()
 {
    $nombreTachesFini;
     try {  	 	 
         $base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
         $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         try
         {
             $resultat = $base->query('CALL Tache_Fini');
             $nombreTachesFini = $resultat->rowCount();

             $resultat ->closeCursor();
         }
         catch(Exeption $erreur)
         {
            echo $erreur->getMessage();
         }
     }
     catch (Exeption $erreur)
     {
         die('Erreur de connexion a la bd : '  . $erreur->getMessage());
     }
     return $nombreTachesFini;

 }

 //Liste des utilisateur
 function ListeUtilisateur()
 {
    $ListeUtilisateur;
    try {  	 	 
		$base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
		
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		try
		{
			$resultat = $base->query('CALL GetUtilisateurEducaOps');
			$ListeUtilisateur = $resultat->FetchAll();
		    //fermeture de la rq
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
    return $ListeUtilisateur;
}
?>
