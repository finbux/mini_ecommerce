
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Science+Gothic:wght@100..900&display=swap" rel="stylesheet">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

    <title>Nexora</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="navbar navbar-expand-lg  px-4">
        <a href="index.php"><img src="assets/img/logo.png" alt="logo-site" width="400px"></a>
        <button class="navbar-toggler" type="text" data-bs-toggle="collapse" data-bs-target="#navbarNexora">
            <span class="navbar-toggler-icon"></span>
        </button>
        <nav class="collapse navbar-collapse" id="navbarNexora">
                    <!-- Liens du menu et barre de recherche (poussés vers la droite grâce à ms-auto) -->
                    <ul class="navbar-nav ms-auto align-items-lg-center gap-3">
                        <li class="nav-item">
                            <a class=" fw-bold" href="#">Notre catalogue</a>
                        </li>
                        <li class="nav-item">
                            <input type="text" class="form-control" placeholder="Rechercher un produit...">
                        </li>
                        
                        <!-- Bloc Connexion / Inscription -->
                        <li class="nav-item text-center text-lg">
                            <?php if(isset($_SESSION['user']))
                            {
                                echo '<a href="?route=profile">'.$_SESSION['user']['pseudo'].'</a>';
                                echo "<br>";
                                echo '<a href="?route=logout">Se déconnecter</a>';
                            }   
                            else
                            {
                                ?>
                                <a href="?route=login" class="btn-sm w-100 mb-1">Se connecter</a>
                                <div class="small"><a href="?route=register">S'inscrire en 1 clic</a></div>
                                <?php
                            }
                            ?>
                           
                        </li>

                        <!-- Icône Panier -->
                        <li class="nav-item text-center">
                            <a href="?route=panier" class="nav-link position-relative px-2">
                                <i class="fa-solid fa-cart-shopping fs-4 "></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                                    0
                                </span>
                            </a>
                        </li>
                    </ul>
            </nav>
    </header>
    <?php 
  if(isset($_SESSION['message'])){
    echo "<div class=\"container alert alert-".$_SESSION['type_message']." role=\"alert\">";
    echo "<p>".$_SESSION['message']."</p>";
    echo "</div>";

    unset($_SESSION['message']);
    unset($_SESSION['type_message']);

  }

?>
    <main class="container-fluid flex-grow-1"">

    