<?php

class SQLAccount
{
    public function VerifAccountExist($email, $motdepasse){

        try 
        {
            $response = [];
            $base = new PDO('mysql:host=db;dbname=BD_EducaOps', 'root', 'root');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = 'CALL GetUtilisateurEducaOps(:Email, :MotDePasse)';
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

        return array_values($response[0])[0] == 1;
    }
}