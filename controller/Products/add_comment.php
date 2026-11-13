<?php
require_once 'controller/auth_check.php'; // il faut être connecté
require_once 'model/product.php';
require_once 'model/comment.php';   

$produitId = (int) ($_POST['produit_id'] ?? 0);
$contenu   = trim($_POST['contenu'] ?? '');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !findById($produitId)) {
    header("Location: ?route=home");
    exit();
}

if ($contenu === '' || mb_strlen($contenu) > 1000) {
    $_SESSION['message'] = "Le commentaire doit contenir entre 1 et 1000 caractères.";
    $_SESSION['type_message'] = "danger";
} else {
    addComment($produitId, $_SESSION['user']['id'], $contenu);
    $_SESSION['message'] = "Votre commentaire a été publié";
    $_SESSION['type_message'] = "success";
}

// ⚠️ adapte à la route de ta page détail
header("Location: ?route=product&id=" . $produitId);
exit();