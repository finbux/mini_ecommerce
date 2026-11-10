<?php
    require_once('config/db.php');


    //CREATE
    function createProduct($nom,$description, $prix,$image,$vendeur):bool{

    $db = connectToDatabase();
    date_default_timezone_set('Europe/Paris');
    $datetime = date('Y-m-d H:i:s');

    $sql = $db->prepare("
    INSERT INTO produit (nom,description,prix,image,vendeur,created_at) VALUES (:nom,:description,:prix,:image,:vendeur,:created_at)");

    $sql->bindValue(":nom",$nom);
    $sql->bindValue(":description",$description);
    $sql->bindValue(":prix",$prix);
    $sql->bindValue(":image",$image);
    $sql->bindValue(":vendeur",$vendeur);
    $sql->bindValue(":created_at",$datetime);

    $sql->execute();
    
    return ($sql->rowCount() > 0) ? true : false;
}

//Read
function getAllProducts()
{   
    $db = connectToDatabase();

    $sql = $db->query("
        SELECT * FROM produit
    ");

    $data = $sql->fetchAll();

    return $data;

}

function findById($id){

    $db = connectToDatabase();
    
    $sql = $db->prepare("SELECT * FROM  produit WHERE id = :id");

    $sql->bindValue(':id',$id);

    $sql->execute();

    return $sql->fetch(PDO::FETCH_ASSOC);
}

function findByUser($user){

    $db = connectToDatabase();
    
    $sql = $db->prepare("SELECT * FROM  produit WHERE vendeur = :id");

    $sql->bindValue(':id',$user);
    $sql->execute();
   $data = $sql->fetchAll();

    return $data;   
}


?>