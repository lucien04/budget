<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=budget;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'erreur';
    die();
} 
$sql= "SELECT
users.`user_id`,
`first_name`,
`last_name`,
`birth_date`,
`inc_id`
FROM
`users`
LEFT JOIN `incomes` ON `users`.`user_id`=`incomes`.`user_id`";

 
$req = $pdo->query($sql);
$users = $req->fetchAll();
$req = $pdo->query($sql);
$user = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<div class="container">
    <h1>Utilisateurs(es)</h1>
    
    <tbody>
        <div class="row">
            <?php foreach($users as $user) : ?>
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <a class="" href="user.php?user_id=<?= $user['user_id'] ?>"><img class="img-fluid"
                                src="assets/img/<?= $user['user_id'] ?>.png" alt="">cliquez pour plus d'infos</a>
                       
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <p class="position-absolute top-50 start-0 translate-middle-y">
                <button type="button" class="btn btn-primary">  <a href="accueil.php"> <i class="fas fa-angle-left left">
                </a></i> </button>
            </p>