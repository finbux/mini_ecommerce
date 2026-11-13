<?php 
require_once'model/product.php';

// Vérifier que l'utilisateur est connecté
if (isset($_SESSION['user'])) 
{
   
   if(isset($_POST['id'])){
        
        if(delete($_POST['id'])){
            $_SESSION['message'] = "Suppression réussie";
            $_SESSION['type_message'] = "success";

            header('location: ?route=profile');
        }
        else{
            $_SESSION['message'] = "Echec lors de la suppression";
            $_SESSION['type_message'] = "danger";

            header('location: ?route=profile');
        }
   }
}
else
{   
include_once'views/user/login.php';
}

?>
