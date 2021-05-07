<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=budget;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'erreur';
    die();
} 

$sql = "SELECT `exp_id`, `exp_date`, `exp_amount`, `exp_label `, `user_id`,  FROM `expenses` ";
//$req = $pdo->query($sql);
//$expenses = $req->fetchAll();
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
    <div class="position-absolute top-50 start-50 translate-middle">

        <label class="fw" for="site-search">Rechercher une Dépenses:</label>
        <input type="search" id="site-search" name="q" aria-label="Search through site content">
        
        <button><i class="fas fa-search"></i></button>
    </div>
    <table class="table table-striped table-hover table-bordered">
        <thead>
    <h1>Depenses </h1>
            <tr>
                <th>
              Date
                </th>
              
                <th>
                 Montant
                </th>
                <th>
               Achats
                </th>
                <th>
             utilisateur
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($expenses as $expense) : ?>
            <tr>
                <td><?= $expense['exp_id'] ?></td>
                <td><?= $expense['exp_date'] ?></td>
                <td><?= $expense['exp_amount'] ?></td>
                <td><?= $expense['exp_label'] ?></td>
                <td><?= $expense['user_id'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
    
<body>
<p class="position-absolute top-50 start-0 translate-middle-y">
                <button type="button" class="btn btn-primary">  <a href="accueil.php"> <i class="fas fa-angle-left left">
                </a></i> </button>
            </p>

</body>
