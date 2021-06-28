<div class="container-fluid bg-danger text-white p-3 d-flex">
        <div class="p-2  bg-light rounded">
                <img class="rounded" src="../content/img/cnam.png" width="180px"/>
        </div>
        <div class="p-2">
                <h2 class="m-0 ml-3">EducaOps</h2>
        </div>
    <?php
    if(isset($_SESSION['email'])){
        echo
            '<div class="p-2 ml-auto mb-auto mt-auto">' .
                'Bonjour <b>' . $_SESSION['NomComplet'] . '</b>' . ' vous êtes un <b>' . $_SESSION['role_libelle'] . '</b>' .
            '</div>' .
            '<div class="p-2 mb-auto mt-auto">' .
                '<a class="btn btn-warning" href="../Vue/ActionDeconnexion.php">' .
                    'Deconnexion' .
                ' </a>' .
            '</div>';
    }
    ?>
</div>