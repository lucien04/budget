<?php
require_once __DIR__ . '/librairies/database.php';
require 'functions.php';
$pdo = db_connect();


$errors = [];
// Le formulaire a été soumis
if (!empty($_POST)) {

    // vérifie que le nombre est bien renseigné
    if (empty($_POST['user_id'])) {
        $errors['user_id'] = 'Le champ est requis';
    }else if(!filter_var($_POST['user_id'], FILTER_VALIDATE_INT)){
        $errors['user_id'] = 'La valeur renseignée est incorrecte !';
    }
    if (empty($_POST['inc_amount'])) {
        $errors['inc_amount'] = 'Le champ est requis';
    }
    if (empty($_POST['exp_amount'])) {
        $errors['exp_amount'] = 'Le champ est requis';
    }

   
}
$title = 'Ajouter un utilisateur';
require_once 'header.php';
?>

<main>
    <div class="container">
        <?php if (isset($success)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p> modifié avec succès !</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-5 bg-light p-3">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="mb-3" for="title">Revenus</label>
                        <input type="number" id="tentacles" name="tentacles" min="0" 
                        type="text" value="<?= $user_infos['inc_amount'] ?>">
                        <p class="mb-0 text-danger"><?= $errors['inc_amount'] ?? '' ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="mb-3" for="title">Depenses</label>
                        <input type="number" id="tentacles" name="tentacles" min="0" 
                        type="text" value="<?= $user_infos['exp_amount'] ?>">

                        <p class="mb-0 text-danger"><?= $errors['exp_amount'] ?? '' ?></p>
                    </div>
                    
                    <input type="hidden" name="user_id" value="<?= htmlentities($user_id) ?>">
                    <input class="btn btn-primary" type="submit" value="Enregister">
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/footer.php';
