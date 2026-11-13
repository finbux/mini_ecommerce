<?php 

require_once'model/product.php';

$produits = getAllProducts();

include_once'views/accueil.php';

?>