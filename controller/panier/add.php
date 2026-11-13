<?php
require_once('model/product.php');

if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "Vous devez vous connecter pour ajouter des produits";
    $_SESSION['type_message'] = "danger";
    header("Location: ?route=login");
    exit();
}

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

if ($id > 0 && findById($id)) {
    $_SESSION['panier'][$id] = ($_SESSION['panier'][$id] ?? 0) + 1;
}

header("Location: ?route=show_panier");
exit();