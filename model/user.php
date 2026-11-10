<?php

require_once('config/db.php');

// CRUD - CREATE

function createUser($pseudo, $email, $pwd):bool{

    $db = connectToDatabase();
    date_default_timezone_set('Europe/Paris');
    $datetime = date('Y-m-d H:i:s');
    
    $sql = $db->prepare("
    INSERT INTO USER (pseudo,email,password,created_at) VALUES (:pseudo,:email,:pwd,:date)");

    $sql->bindValue(":pseudo",$pseudo);
    $sql->bindValue(":email",$email);
    $sql->bindValue(":pwd",$pwd);
    $sql->bindValue(":date",$datetime);

    $sql->execute();
    
    return ($sql->rowCount() > 0) ? true : false;
}

function checkEmailExist($email): bool{
    $db = connectToDatabase();

    $sql = $db->prepare("SELECT * FROM user WHERE email = :email ");

    $sql->bindValue(':email',$email);

    $sql->execute();

    return ($sql->rowCount() > 0) ? true : false;

}

// Fonction pour se connecter

function seConnecter($email,$pwd):bool{
    $db = connectToDatabase();

    $sql = $db->prepare("SELECT * FROM user WHERE email = :email");
    $sql->bindValue(":email",$email);
    $sql->execute();

    $data = $sql->fetch();

    if (password_verify($pwd,$data['password'])) {
        $_SESSION['user'] = $data;
        return true;
    }
    else{
        return false;
    }

}

?>