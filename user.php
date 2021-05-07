<?php
require_once __DIR__ . '/librairies/database.php';
require 'functions.php';
$pdo = db_connect();

if (empty($_GET['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = htmlentities($_GET['user_id']);

$user_infos = user_infos($pdo, $user_id);
$title = 'Détails de l\'utilisateur';
require_once __DIR__ .'/header.php';

?>

<div class="container lss-4">
<div class="position-absolute top-50 start-50 translate-middle">
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>utilisateur(e)</th>
                <th>prenom</th>
                <th>Nom</th>
                <th>Date de naissance</th>
                <th>Revenus</th>
                <th>Depenses</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user_infos as $user_info) : ?>
                <tr>
                    <td><?= $user_info['user_id'] ?></td>
                    <td><?= $user_info['first_name'] ?></td>
                    <td><?= $user_info['last_name'] ?></td>
                    <td><?= $user_info['birth_date'] ?></td>
                    <td><?= $user_info['inc_amount'] ?></td>
                    <td><?= $user_info['exp_amount'] ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/footer.php';

