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
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<div class="container">
<h1>Modifications et suppression</h1>
    
        <p class="float-end"><a href="addusers.php">Ajouter un utilisateur</a></p>
        <table class="table table-striped table-hover table-bordered">
          
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['user_id'] ?></td>
                        <td> <a href="user.php?user_id=<?= $user['user_id'] ?>"><?= $user['first_name'] ?></a> </td>
                        <td><?= date('d/m/Y', strtotime($user['birth_date']));  ?></td>
                        <td><a href="incomes.php?inc_cat_id=<?= $user['inc_id'] ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a href="?user_id=<?= $user['user_id'] ?>"><i class="fas fa-trash text-danger"></i></a></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="position-absolute top-50 start-0 translate-middle-y">
                <button type="button" class="btn btn-primary">  <a href="accueil.php"> <i class="fas fa-angle-left left">
                </a></i> </button>
            </p>
</div>
