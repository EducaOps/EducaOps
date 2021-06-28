# EducaOps

## Procédure d'installation de l'evironnement de développement :
Avant de mettre en place l'environement de développement vous aurez besoin de **docker**
vous pouvez le téléchargé et l'installer à cette adresse https://www.docker.com/get-started

```
git clone https://github.com/EducaOps/EducaOps.git
cd .\EducaOps\

docker-compose up
```

Vous pourrez ensuite accéder aux pages suivantes :
* phpMyAdmin => http://localhost:90
* EducaOps => http://localhost:80


### Installation de la base de données
Accéder a votre base de données MySQL a travers la platforme phpMyAdmin précédement installé via : http://localhost:90.

Pour vous connecter au SGBD utiliser les identifiants suivant :
```
* Utilisateur : root
* Mot de passe : root
```

Pour importer la base de données EducaOps vous devez suivre ce chemin
```
-> Clique sur l'onglet "importer"
-> Puis choisir un fichier (sql/BD_EducaOps.sql) et exécuté en bas à droite de l'écran
```

Une fois la base de données inseré vous pouvez vous connecter au site <b> Educaops</b> via le lien suivant : http://localhost:80.

## S'indentifier à la platforme EducaOps
Pour ce connecter à la platforme plusieurs identifiants exist.
(Pours inserer de nouveaux utilisteurx dans la base de données vous devez rediger une requête SQL)

### Utilisateur Admin
```
* Mail : admin@admin.admin
* Mot de passe : admin
```
Cette utilisateur à accées à l'ensemble des fonctionnalités de la platforme.

### Utilisateur Elève
```
* Mail : Eleve@eleve.eleve
* Mot de passe : eleve
```
Cette Utilisateur peut simplement modifier une tâche mais pas en ajouter.

### Utilisateur Professeur
```
* Mail : prof@prof.prof
* Mot de passe : prof
```
Cette utilisateur peut gérer toute les tâhes des éléves enregistrés en base de données.