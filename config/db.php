<?php


function connectToDatabase()
{
    $host = 'localhost';
    $dbname = 'mini_commerce';
    $username = 'root';
    $password = 'root';

    try {
        // return new PDO("mysql:host=localhost;dbname=dwwm1210", "root", "");
        // AUTRE Facon d'ecrire via des variables
        return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

?>