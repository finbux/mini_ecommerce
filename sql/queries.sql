
CREATE DATABASE IF NOT EXISTS mini_commerce
CHARACTER SET utf8mb4

USE mini_commerce;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(250) NOT NULL,
    created_at DATETIME
);

CREATE TABLE produit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    prix DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    vendeur INT,
    created_at DATETIME,
    Foreign Key (vendeur) REFERENCES user (id)
)

CREATE TABLE commentaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenu TEXT NOT NULL,
    created_at DATETIME,
    user_id INT,
    produit_id INT,
    Foreign Key (user_id) REFERENCES user (id),
    Foreign Key (produit_id) REFERENCES produit (id)
)