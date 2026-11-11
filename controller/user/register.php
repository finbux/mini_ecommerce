<?php 

require_once('model/user.php');

// ===== Contrôleur : traitement du formulaire =====
$erreurs = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // echo $_POST['prenom']. " nom: ". $_POST['nom']. " email: ".$_POST['email'];

    //Recupération des valeurs saisies par l'utilisateur
    $pseudoSaisi = trim($_POST['pseudo']);
    $emailSaisi = trim($_POST['email']);
    $pwdSaisi = trim($_POST['password']);
    $mdp2 = trim($_POST['password2']);

    // SECURISER NOTRE APPLICATION AVEC DES VERIFICATIONS DE SAISIE UTILISATEUR
   // Vérifications de la saisie
    if ($pseudoSaisi === '') {
        $erreurs['prenom'] = 'Le pseudo est obligatoire.';
    }

    if (!filter_var($emailSaisi, FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "L'adresse email n'est pas valide.";
    }elseif (checkEmailExist($emailSaisi)){
        $erreurs['email'] = "l'adresse mail existe déja, veuilliez en choisir une autre";
    }

    $password_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
    // $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 


    if (!preg_match($password_regex, $pwdSaisi)) {
        $erreurs['password'] = 'Le mot de passe doit contenir au moins 8 caractères, avec une minuscule, une majuscule et un chiffre.';
    }

    if($pwdSaisi !== $mdp2){
        $erreurs['mdp2'] = "Les mot de passe ne sont pas identiques";
    }
    if(empty($erreurs)){

    $hash = password_hash($pwdSaisi,PASSWORD_DEFAULT);
        if(createUser($pseudoSaisi,$emailSaisi,$hash)){
            $success = true;
            
        }
    }

}


include_once'views/user/register.php';





?>