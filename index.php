<?php include_once 'views/includes/header.php'; 

if(isset($_GET['route'])){
    switch(true){
        // route user
        case $_GET['route'] == 'login':
            require_once ('controller/user/login.php');
        break;

        case $_GET['route'] == 'register':
            require_once ('controller/user/register.php');
        break;

        case $_GET['route'] == 'logout':
            require_once ('controller/user/logout.php');
        break;

        case $_GET['route'] == 'profile':
            require_once ('controller/user/profil.php');
        break;
        
         //  ROUTE PRODUIT
        case $_GET['route'] == 'product':
            if(isset($_GET['id'])){
                require_once ('controller/products/show.php');
            }
            else{
                     require_once ('controller/products/all_products.php');
            }
        break;

        case $_GET['route'] == 'add_product':
            require_once ('controller/products/add_product.php');
        break;

        case $_GET['route'] == 'update_product':

                require_once ('controller/products/update_product.php');
        
        break;

        case $_GET['route'] == 'delete_product':
           
                require_once ('controller/products/delete_product.php');
            
        break;
            
        //Route panier
        case $_GET['route'] == 'show_panier':
           
                require_once ('controller/panier/show.php');
            
        break;

        case $_GET['route'] == 'add_panier':

                 require_once('controller/panier/add.php');
     
        break;

        case $_GET['route'] == 'remove_product':
                 require_once('controller/panier/delete_produit.php');
     
        break;

         case $_GET['route'] == 'panier/update':
            require_once ('controller/panier/update_panier.php');
        break;

        case $_GET['route'] == 'panier/delete':
            require_once ('controller/panier/delete_panier.php');
        break;
        
        case $_GET['route'] == 'search':
            require_once ('controller/products/search.php');
        break;

        case $_GET['route'] == 'add_comment':
            require_once('controller/products/add_comment.php');
            break;

        case $_GET['route'] == 'delete_comment':
            require_once('controller/products/delete_comment.php');
            break;
            
        default:
            die('404 PAGE NOT FOUND ');
        bnreak;
    }
}
else{

    require_once ('controller/home.php');

}


include_once 'views/includes/footer.php'; ?>