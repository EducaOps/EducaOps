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
			$resultat = $base->query('SELECT ID_Tache, Titre_Tache, Description_Tache FROM tache where Avancement_Tache = 0');
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
             $resultat = $base->query('SELECT ID_Tache, Titre_Tache, Description_Tache FROM tache where Avancement_Tache = 0');
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
             $resultat = $base->query('SELECT ID_Tache, Titre_Tache, Description_Tache FROM tache where Avancement_Tache = 1');
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
             $resultat = $base->query('SELECT ID_Tache, Titre_Tache, Description_Tache FROM tache where Avancement_Tache = 1');
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
?>
