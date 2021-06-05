<?php
include 'session.php';
include '../Controller/ListeTacheController.php';
include '../Controller/ModificationTacheController.php';

$tache_encours = TachesEnCour();
$tache_fini = TachesFini();
$tache_merge = array_merge($tache_encours, $tache_fini);
$utilisateurs = ListeUtilisateur();
$tache_eleve_encours = TachesEleveEnCour($_SESSION['email']);
$tache_eleve_fini =  TachesEleveFini($_SESSION['email']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Liste des taches</title>
</head>
<body>
<?php include '../Model/Header.php'; 
if($eleves)
{?>
    <div class=" d-flex ">
    <div class="flex-fill w-100 m-5">
        <h1 class="" style="font-size: 45px; color: #f9a328;">Liste des taches en cours</h1>
        <div class="mt-2 alert alert-warning p-1 ">
            <?php echo "Nombre de Taches en cours : <b>" . CountEleveEnCour($_SESSION['email']) . "</b>" ?>
        </div>
            <table class="table table-striped">
                <thead>
                <th>Titre</th>
                <th>Description</th>

                <th></th>
                </thead>
                <tbody>
                <?php foreach ($tache_eleve_encours as $value) 
                { ?>
                    <tr>
                        <td>
                            <?php echo $value[1]; ?>
                        </td>
                        <td>
                            <?php echo $value[2]; ?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                            
                                <a class="btn btn-warning mr-2" data-toggle="modal"
                                   data-target="#<?php echo 'modif_tahce_' . $value[0] ?>">Modifier</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </div>

    <div class="flex-fill w-100 m-5">
        <h1 class=" text-success" style="font-size: 45px;">Liste des taches terminées</h1>
        <div class="mt-2 alert alert-success p-1">
            <?php echo "Nombre de taches en terminées : <b>" .  CountEleveFini($_SESSION['email']) . "</b>" ?>
                </div>
            <table class="table table-striped ">
                <thead>
                <th>Titre</th>
                <th>Description</th>
                <th></th>
                </thead>
                <tbody>
                <?php foreach ($tache_eleve_fini as $value) 
                { ?>
                    <tr>
                        <td>
                            <?php echo $value[1]; ?>
                        </td>
                        <td>
                            <?php echo $value[2]; ?>
                        </td>>
                        <td>
                            <a class="btn btn btn-warning" data-toggle="modal"
                            data-target="#<?php echo 'modif_tahce_' . $value[0] ?>">Modifier</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </div>

</div>
<?php
}
if($professeur)
{?>

<!-- Liste des taches -->
<div class=" d-flex ">
    <div class="flex-fill w-100 m-5">
        <h1 class="" style="font-size: 45px; color: #f9a328;">Liste des taches en cours</h1>
        <div class="mt-2 alert alert-warning p-1 ">
            <?php echo "Nombre de Taches en cours : <b>" . CountEnCour() . "</b>" ?>
        </div>
            <table class="table table-striped">
                <thead>
                <th>Titre</th>
                <th>Description</th>
                <th>Élève</th>
                <th></th>
                </thead>
                <tbody>
                <?php foreach ($tache_encours as $value) 
                { ?>
                    <tr>
                        <td>
                            <?php echo $value[1]; ?>
                        </td>
                        <td>
                            <?php echo $value[2]; ?>
                        </td>
                        <td>
                            <?php echo $value[3]; ?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                            
                                <a class="btn btn-warning mr-2" data-toggle="modal"
                                   data-target="#<?php echo 'modif_tahce_' . $value[0] ?>">Modifier</a>
                                <a class="btn btn-outline-danger"
                                   href="ActionSupprimerTache.php?ID=<?php echo $value[0] ?>">Supprimer</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        
        <button class="btn btn-sm btn-outline-success p-2" data-toggle="modal" data-target="#myModal">
            Ajouter une tache
        </button>        
    </div>

    <div class="flex-fill w-100 m-5">
        <h1 class=" text-success" style="font-size: 45px;">Liste des taches terminées</h1>
        <div class="mt-2 alert alert-success p-1">
            <?php echo "Nombre de taches en terminées : <b>" . CountFini() . "</b>" ?>
        </div>

            <table class="table table-striped ">
                <thead>
                <th>Titre</th>
                <th>Description</th>
                <th>Élève</th>
                <th></th>
                </thead>
                <tbody>
                <?php foreach ($tache_fini as $value) 
                { ?>
                    <tr>
                        <td>
                            <?php echo $value[1]; ?>
                        </td>
                        <td>
                            <?php echo $value[2]; ?>
                        </td>
                        <td>
                            <?php echo $value[3]; ?>
                        </td>
                        <td>
                            <a class="btn btn btn-warning" data-toggle="modal"
                            data-target="#<?php echo 'modif_tahce_' . $value[0] ?>">Modifier</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
    </div>

</div>
<?php } ?>







<!-- Formulaire d'ajout d'une tache -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title" style="color: #f9a328;">Ajouter une tache</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="m-0" action="ActionAjouterTache.php" method="POST">
                    <table class="table table-striped m-0">
                        <tr>
                            <td>Titre</td>
                            <td>
                                <input class="form-control" type="text" name="Titre" value="" size="40" maxlength="40"
                                       required/>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <textarea class="form-control" rows="15" name="Description" id="comment"
                                          required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Assigner un élèves</td>
                            <td>
                                <select class="custom-select" name="User">
                                    <!-- Liste de tout les utilisateurs -->
                                <?php foreach ($utilisateurs as $value) 
                                {?>
                                    <option value = <?php echo $value[2] ?>><?php  echo $value[0] . " - " . $value[1];?></option>
                                <?php  
                                }
                                ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Avancement :</td>
                            <td>
                                <input type="radio" id="En Cours" name="Avancement" value="0" checked>
                                <label for="0">En Cours</label>
                                <br/>
                                <input type="radio" id="Terminée" name="Avancement" value="1">
                                <label for="1">Terminée</label>
                            </td>
                        </tr>


                    </table>
                    <input class="mt-3 btn btn-outline-success form-control" type="submit" name="Envoyer"
                           value="Enregistrer la tache">
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
            </div>

        </div>
    </div>
</div>

<!-- Formulaire de modification d'une tache -->
<?php foreach ($tache_merge as $value) { ?>
    <div class="modal fade" id="<?php echo 'modif_tahce_' . $value[0] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title" style="color: #f9a328;">Modifier une tache</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="m-0" action="ActionModifierTache.php?ID_Tache=<?php echo $value[0] ?>" method="POST">

                        <table class="table table-striped">
                            <tr>
                                <td>Titre</td>
                                <td>
                                    <input class="form-control" type="text" name="Titre"
                                           value="<?php echo LaTache($value[0])['Titre_Tache']; ?>" size="40"
                                           maxlength="40" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
                                    <textarea class="form-control" type="text" rows="15" name="Description"
                                              required><?php echo LaTache($value[0])['Description_Tache']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Avancement :</td>
                                <td>
                                    <?php if (LaTache($value[0])['Avancement_Tache']) {
                                        ?>
                                        <input type="radio" id="En Cours" name="Avancement" value="0">
                                        <label for="0">En Cours</label>
                                        <br/>
                                        <input type="radio" id="Terminée" name="Avancement" value="1" checked>
                                        <label for="1">Terminée</label>
                                        <?php
                                    } else {
                                        ?>
                                        <input type="radio" id="En Cours" name="Avancement" value="0" checked>
                                        <label for="0">En Cours</label>
                                        <br/>
                                        <input type="radio" id="Terminée" name="Avancement" value="1">
                                        <label for="1">Terminée</label>
                                        <?php
                                    } ?>
                                </td>
                            </tr>
                        </table>

                        <input class="mt-3 btn btn-success form-control" type="submit" name="Envoyer"
                               value="Enregistrer la tache">
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
<?php include '../Model/Footer.html'; ?>
</body>
</html>

