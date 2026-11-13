<?php
require_once 'controller/auth_check.php';
require_once 'model/comment.php';

$id          = (int) ($_POST['id'] ?? 0);
$commentaire = $id > 0 ? findCommentById($id) : null;

if ($commentaire && $commentaire['user_id'] == $_SESSION['user']['id']) {
    deleteComment($id);
    $_SESSION['message'] = "Commentaire supprimé";
    $_SESSION['type_message'] = "success";
    $produitId = (int) $commentaire['produit_id'];
} else {
    $_SESSION['message'] = "Action non autorisée";
    $_SESSION['type_message'] = "danger";
    $produitId = 0;
}

header("Location: " . ($produitId ? "?route=product&id=" . $produitId : "?route=home"));
exit();