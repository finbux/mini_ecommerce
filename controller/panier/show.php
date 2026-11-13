<?php
require_once('model/product.php');

if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "Vous devez vous connecter pour voir votre panier";
    $_SESSION['type_message'] = "danger";
    header("Location: ?route=login");
    exit();
}

$lignes = [];
$total  = 0;

foreach ($_SESSION['panier'] ?? [] as $idProduit => $quantite) {
    $produit = findById($idProduit);

    if (!$produit) {
        unset($_SESSION['panier'][$idProduit]);
        continue;
    }

    $sousTotal = $produit['prix'] * $quantite;
    $total    += $sousTotal;

    $lignes[] = [
        'id'         => $idProduit,
        'nom'        => $produit['nom'],
        'prix'       => $produit['prix'],
        'quantite'   => $quantite,
        'sous_total' => $sousTotal,
    ];
}

require_once('views/panier/show.php');