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
            '<div class="p-2 ml-auto">' .
                'Bonjour ' . $_SESSION['email'] .
            '</div>' .
            '<div class="p-2">' .
                '<button class="btn btn-warning">' .
                    'Deconnexion' .
                ' </button>' .
            '</div>';
    }
    ?>
</div>