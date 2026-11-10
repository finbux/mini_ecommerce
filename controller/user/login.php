<?php 
require_once'model/user.php';

$erreurs = [];
$success = false;
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    $emailSaisi = trim($_POST['email']);
    $pwdSaisi = trim($_POST['password']);

    if (!filter_var($emailSaisi, FILTER_VALIDATE_EMAIL)) {
            $erreurs['email'] = "L'adresse email n'est pas valide.";
        }

        $password_regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
        // $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 


        if (!preg_match($password_regex, $pwdSaisi)) {
            $erreurs['pwd'] = 'Le mot de passe doit contenir au moins 8 caractères, avec une minuscule, une majuscule et un chiffre.';
        }

        if(empty($erreurs)){
            
            if (seConnecter($emailSaisi,$pwdSaisi)) {
                header('Location:index.php');
                exit();
            }
        }
    }
include_once'views/user/login.php';


?>