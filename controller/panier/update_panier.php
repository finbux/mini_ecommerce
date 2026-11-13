<?php
require_once('controller/auth_check.php'); // contrôle de connexion

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantite']) && is_array($_POST['quantite'])) {
    
    foreach ($_POST['quantite'] as $idProduit => $qte) {
        $idProduit = (int) $idProduit;
        $qte       = (int) $qte;

        // On ne modifie que les produits déjà présents dans le panier
        if (!isset($_SESSION['panier'][$idProduit])) {
            continue;
        }

        if ($qte > 0) {
            $_SESSION['panier'][$idProduit] = min($qte, 99); // plafond de sécurité
        } else {
            unset($_SESSION['panier'][$idProduit]); // quantité 0 = suppression
        }
    }

    $_SESSION['message'] = "Votre panier a été mis à jour";
    $_SESSION['type_message'] = "success";
}

header("Location: ?route=show_panier");
exit();