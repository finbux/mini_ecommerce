<?php 

require_once 'model/product.php';

if(isset($_GET['id'])){

    $produit = findById($_GET['id']);
    if(!$produit)
        {
            header('Location: index.php');
        }
    require_once 'views/product/show.php';

}

?>