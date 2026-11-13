<?php
 require_once('config/db.php');

function addComment($produitId, $userId, $contenu)
{
    $db = connectToDatabase();
    $stmt = $db->prepare(
        "INSERT INTO commentaires (produit_id, user_id, contenu)
         VALUES (:produit_id, :user_id, :contenu)"
    );
    return $stmt->execute([
        ':produit_id' => $produitId,
        ':user_id'    => $userId,
        ':contenu'    => $contenu,
    ]);
}

function getCommentsByProduct($produitId)
{
    $db = connectToDatabase();
    $stmt = $db->prepare(
        "SELECT c.id, c.contenu, c.created_at, c.user_id, u.pseudo
         FROM commentaires c
         JOIN user u ON u.id = c.user_id
         WHERE c.produit_id = :produit_id
         ORDER BY c.created_at DESC"
    );
    $stmt->execute([':produit_id' => $produitId]);
    return $stmt->fetchAll();
}

function findCommentById($id)
{
    $db = connectToDatabase();
    $stmt = $db->prepare("SELECT * FROM commentaires WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

function deleteComment($id)
{
       $db = connectToDatabase();

    $stmt = $db->prepare("DELETE FROM commentaires WHERE id = :id");
    return $stmt->execute([':id' => $id]);
}