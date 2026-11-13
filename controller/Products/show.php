<?php 

require_once 'model/product.php';
require_once 'model/comment.php';


if(isset($_GET['id'])){

    $produit = findById($_GET['id']);
    $commentaires = getCommentsByProduct($_GET['id']);

    if(!$produit)
        {
            header('Location: index.php');
        }
    require_once 'views/product/show.php';

}

?>