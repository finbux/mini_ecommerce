<?php 
    require_once 'model/product.php';

    $terme    = trim($_GET['search'] ?? '');
    $produits = [];

    if ($terme !== '') {
        $produits = searchByTitle($terme);
    }

    require_once 'views/product/search.php';
?>