<?php include_once 'views/includes/header.php'; 

if(isset($_GET['route'])){
    switch(true){
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
        
        case $_GET['route'] == 'product':
            if(isset($_GET['id'])){
                require_once ('controller/products/show.php');
            }
            else{
                     require_once ('controller/recette/all_products.php');
            }
        break;

        case $_GET['route'] == 'add_product':
            require_once ('controller/products/add_product.php');
        break;

        case $_GET['route'] == 'panier':
            require_once ('controller/panier/show.php');
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