<?php
require_once __DIR__ . '/librairies/database.php';
require 'functions.php';
$pdo = db_connect();

$error = false;
// Liste des categorie pour le select du formulaire
$expenses = expenses_list($pdo);
$errors = [];
// Liste des utilisateurs pour le select du formulaire
$users = users_list($pdo);
$errors = [];


// Le formulaire a été soumis
if (!empty($_POST)) {

    // vérifie que le nom est bien renseigné
 if (empty($_POST['exp_id'])) {
 $errors['exp_id'] = 'Le champ est requis';
 } else if (!filter_var($_POST['exp_id'], FILTER_VALIDATE_INT)) {
 $errors['exp_id'] = 'La valeur renseignée est incorrecte !';
 }
 if (empty($_POST['exp_amount'])) {
 $errors['exp_amount'] = 'Le champ est requis';
 }
 else if (!filter_var($_POST['exp_amount'], FILTER_VALIDATE_INT)) {
 $errors['exp_amount'] = 'La valeur renseignée est incorrecte !';
 }
 if (empty($_POST['exp_label'])) {
 $errors['exp_label'] = 'Le champ est requis';
 }
 else if (!filter_var($_POST['exp_label'], FILTER_VALIDATE_INT)) {
 $errors['exp_label'] = 'La valeur renseignée est incorrecte !';
 }
 if (empty($_POST['exp_date'])) {
 $errors['exp_date'] = 'Le champ est requis';
 }
 else if (!filter_var($_POST['exp_date'], FILTER_VALIDATE_INT)) {
 $errors['exp_date'] = 'La valeur renseignée est incorrecte !';
 }
    var_dump($errors);

    if (empty($errors)) {
        $exp_id = (int) htmlentities($_POST['exp_id']);
        $exp_amount = htmlentities($_POST['exp_amount']);
        $exp_label = htmlentities($_POST['exp_label']);
        $exp_date = htmlentities($_POST['exp_date']);
        $user_id = (int) htmlentities($_POST['user_id']);
        if (updateExpenses($pdo, $exp_amount, $exp_date,$exp_id,$exp_label, $user_id)){
        $success = true;
        }
    }
}
$title = 'Ajouter un ';
require_once 'header.php';
?>
<main>
    <div class="container md-1">
        <?php if (isset($success)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p> Dépenses utilisateur créé avec succès !</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div  class="position-absolute top-50 start-50">
                <form action="" method="post">
                <div class="col-md-6">
                    <label class="mb-3" for="title">Montant</label>
                        <input type="number" id="exp_amount" name="exp_amount">
                        <p class="mb-0 text-danger"><?= $errors['exp_amount'] ?? '' ?></p>
</div>
<div class="col-md-4">
    <label for="name">Achats</label>
    <select name="exp_id" id="exp_id">
        <?php foreach ($expenses as $expense) : ?>
        <option value="<?= $expense['exp_id'] ?>">
            <?= $expense['exp_label'] ?>
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
    <label class="mb-3" for="name">date</label>
    <input type="date" id="exp_date" name="exp_date" value="">
</div>
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