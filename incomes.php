<?php
require_once __DIR__ . '/librairies/database.php';
require 'functions.php';
$pdo = db_connect();

$error = false;
// Liste des categorie pour le select du formulaire
$incomes_categories = incomes_categories_list($pdo);
$errors = [];
// Liste des utilisateurs pour le select du formulaire
$users = users_list($pdo);
$errors = [];


// Le formulaire a été soumis
if (!empty($_POST)) {

    // vérifie que le nom est bien renseigné
    if (empty($_POST['inc_cat_id'])) {
        $errors['inc_cat_id'] = 'Le champ est requis';
    } else if (!filter_var($_POST['inc_cat_id'], FILTER_VALIDATE_INT)) {
        $errors['inc_cat_id'] = 'La valeur renseignée est incorrecte !';
    }
    if (empty($_POST['inc_amount'])) {
        $errors['inc_amount'] = 'Le champ est requis';
    }
    if (empty($_POST['inc_receipt_date'])) {
        $errors['inc_receipt_date'] = 'Le champ est requis';
    }
    // else if (!filter_var($_POST['inc_receipt_date'], FILTER_VALIDATE_INT)) {
    //     $errors['inc_receipt_date'] = 'La valeur renseignée est incorrecte !';
    // }
 

    if (empty($errors)) {
        $inc_cat_id = (int) htmlentities($_POST['inc_cat_id']);
        $inc_amount = htmlentities($_POST['inc_amount']);
        $inc_receipt_date = htmlentities($_POST['inc_receipt_date']);
        $user_id = (int) htmlentities($_POST['user_id']);
        if (updateIncomes($pdo, $inc_amount, $inc_receipt_date,$inc_cat_id, $user_id)){
        $success = true;
        }
    }
}
$title = 'Ajouter un ';
require_once 'header.php';
?>
<main>
    <div class="container">
        <?php if (isset($success)) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p> revenus utilisateur créé avec succès !</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <div class="col-md-6">
            <div class="position-absolute top-50 start-50 ">
                <form action="" method="post">
                    <div class="col-md-6">
                        <label class="mb-3" for="title">Montant</label>
                        <input type="number" id="tentacles" name="inc_amount">
                        <p class="mb-0 text-danger"><?= $errors['inc_amount'] ?? '' ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="name">catégorie</label>
                        <select name="inc_cat_id" id="inc_cat_id">
                            <?php foreach ($incomes_categories as $incomes_categorie) : ?>
                            <option value="<?= $incomes_categorie['inc_cat_id'] ?>">
                                <?= $incomes_categorie['inc_cat_name'] ?>
                            </option>
                    </div>
                    <?php endforeach; ?>
                    </select>
                    <div class="col-md-2">
                        <label for="name">utilisateurs</label>
                        <select name="user_id" id="user_id">
                            <?php foreach ($users as $user) : ?>
                            <option value="<?= $user['user_id'] ?>">
                                <?= $user['first_name'] ?>
                            </option>
                    </div>
                    <?php endforeach; ?>
                    </select>
                    <div class="col-md-2">
                    <label class="mb-3" for="name">date de réception</label>
                    <input type="date" id="inc_receipt_date" name="inc_receipt_date" value="">

                    <p class="mb-0 text-danger"><?= $error ? 'Le champ est requis' : '' ?></p>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Enregister">
                </form>
            </div>
        </div>
    </div>
</main>
<p class="position-absolute top-50 start-0 translate-middle-y">
                <button type="button" class="btn btn-primary">  <a href="accueil.php"> <i class="fas fa-angle-left left">
                </a></i> </button>
            </p>
<body>