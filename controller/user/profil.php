<?php

require_once'model/product.php';

if(isset($_SESSION['user'])){

    $produits = findByUser($_SESSION['user']['id']);
   
    include_once'views/user/profil.php';
}
else{
    include_once'views/accueil.php';
}





?>