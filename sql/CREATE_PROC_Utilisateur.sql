CREATE PROCEDURE SetUtilisateurEducaOps(
    NomUti VARCHAR(38),
    GroupUti INT,
    EmailUti VARCHAR(100),
    MotDePasse VARCHAR(100)
)
BEGIN
INSERT INTO Utilisateur (UtiNomComplet, UtiGroupe, UtiEmail, UtiMotDePasse)
    VALUE (NomUti, GroupUti, EmailUti, MotDePasse);
END;

CREATE PROCEDURE GetUtilisateurEducaOps(
    EmailUtilisateur VARCHAR(100),
    MotDePasse VARCHAR(100)
)
BEGIN
SELECT COUNT(*) FROM Utilisateur
WHERE
        UtiEmail = EmailUtilisateur
  AND
        UtiMotDePasse = MotDePasse;
END;

CALL GetUtilisateurEducaOps('antonin.lemoine@gmail.com', '123');

CALL SetUtilisateurEducaOps('AntoninL',1,'antonin.lemoine@gmail.com','123');