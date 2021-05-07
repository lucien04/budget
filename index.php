<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=budget;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo 'erreur';
    die();
}
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

<body class="vh-100">
    
    <div class="container home">
        <!-- Content here -->
        <header class="header">
          
      
        </header>
        
        <main class="main">
            <article>
            <h1 class=" ms-5">Application de gestion de finance personnelle</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Curabitur cursus neque ante. arcu vitae facilisis tempus. <br>
                    arcu vitae facilisis tempus.consectetur adipiscing elit.
                    Curabitur cursus neque ante. </p>
                <h2 class="btn"> télécharger l'application </h2>
                <div class="end-rigth">
             <a href="https://www.apple.com/fr/ios/app-store/"> <i  class="fab fa-app-store fs-1"></i>appStore</a>
                
                 <a href="https://play.google.com/store/apps?hl=fr&gl=US"> <i class="fas fa-play fs-1"></i>playstore</a>
                    </div>
                    
                <div class="text-center">
                    <button type="button" class="btn btn-primary">Essayer l'application </button>
                </div>
                
                <div></div>
                <div></div>
                <div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </article>
            <p class="fixed"> 
                <button type="button" class="btn btn-primary">  <a href="accueil.php"> <i class="fas fa-angle-right right">
                </a></i> </button>
            </p>
        </main>
    </div>
    <footer class="text-center">
        lucien &copy;
        <?php echo date('Y'); ?>
        All rights reserved LUKA LUXE
    </footer>
</body>
</html>
