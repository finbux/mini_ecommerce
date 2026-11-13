<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "Vous devez vous connecter pour accéder au panier";
    $_SESSION['type_message'] = "danger";
    header("Location: ?route=login");
    exit();
}