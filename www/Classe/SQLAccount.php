<?php

class SQLAccount
{
    public function VerifAccountExist($email, $motdepasse){

        try 
        {
            $base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = 'CALL GetVerifUtilisateurExist(:Email, :MotDePasse)';
            try
            {
                $resultat = $base->prepare($sql);
                $resultat->bindParam(':Email', $email);
                $resultat->bindParam(':MotDePasse', $motdepasse);
                $resultat->execute();
                $response = $resultat->fetchAll();
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
        
        if(count($response) == 1){
            return $response;
        }
        return false;
    }
}