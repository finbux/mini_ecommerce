<?php 

// Vérifier que l'utilisateur est connecté
if (isset($_SESSION['user'])) {

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        require_once('model/product.php');
    // echo $_POST['prenom']. " nom: ". $_POST['nom']. " email: ".$_POST['email'];

        //Recupération des valeurs saisies par l'utilisateur
        $nom_input = trim($_POST['nom']);
        $prix_input = trim($_POST['prix']);
        $vendeur = $_SESSION['user']['id'];
        $description_input = trim($_POST['description']);

        if(empty($_FILES['image']['name']))
            {
                 $filename = null;
            }
            else{
                 $filename = 'nexora'.$_FILES['image']['name'];
            }
           
        
         $id = $_POST['id'];

        $extensionFile = pathinfo($filename, PATHINFO_EXTENSION);

        if ($nom_input === '') {
        $erreurs['nom'] = 'Le pseudo est obligatoire.';
        }
         if ($prix_input === '') {
        $erreurs['prix'] = 'Le prix est obligatoire.';
        }

        $destination = "assets/uploads/";

         if(!file_exists($destination)){
                mkdir($destination,0777,true);
        }

         $file = $_FILES['image'] ?? null;

         if ($file['error'] === UPLOAD_ERR_NO_FILE) {

                // En modification, on conserve l'ancienne photo
                if ($id !== '') 
                {
                    $fileName = basename($_POST['photoEdit'] ?? '');

                    if ($fileName === '') {
                        $_SESSION['message'] = "La photo existante est introuvable.";
                        $_SESSION['type_message'] = "danger";

                        header("Location: ?route=add_product");
                        exit;
                    }
                } 
        } 
        else 
        {
            // Cas 2 : une nouvelle photo est envoyée
            if ($file['error'] !== UPLOAD_ERR_OK) {
                $_SESSION['message'] = "Une erreur est survenue lors de l'envoi de la photo.";
                $_SESSION['type_message'] = "danger";
                
                header("Location: ?route=add_product");
                exit;   
            }

            if($extensionFile != 'png' && $extensionFile != 'jpeg' && $extensionFile != 'jpg' && $extensionFile != 'webp')
            {
                die("Le format n'est pas ccorect");
            }


            if(!move_uploaded_file($_FILES['image']['tmp_name'],$destination.$filename)){

                $_SESSION['message'] = "Impossible d'enregistrer la photo.";
                $_SESSION['type_message'] = "danger";
                header("Location: ?route=add_product");
                exit;

            }

        }

        if($id !== '')
            {
                   //Modifier produit
            }
            else
            {
                    if(createProduct($nom_input,$description_input,$prix_input,$filename,$vendeur))
                    {   
                        
                        $_SESSION['message'] = "Produit bien ajouté";
                        $_SESSION['type_message'] = 'success';
                        header('location:index.php');
                    }
                    else
                    {
                        $_SESSION['message'] = "Erreur dans l'ajout du produit";
                        $_SESSION['type_message'] = 'danger';
                    
                        header('location:?route=add_product');
                    }    
            }
                                   
    }
    else
    {
        include_once'views/product/add_product.php';
    }
}
else
{   
include_once'views/user/login.php';
}

?>
