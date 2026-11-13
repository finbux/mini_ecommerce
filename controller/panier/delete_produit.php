<?php
require_once('controller/auth_check.php'); // le contrôle de connexion vu plus haut

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

if ($id > 0 && isset($_SESSION['panier'][$id])) {
    unset($_SESSION['panier'][$id]);

    $_SESSION['message'] = "Le produit a été retiré du panier";
    $_SESSION['type_message'] = "success";
}

header("Location: ?route=show_panier");
exit();