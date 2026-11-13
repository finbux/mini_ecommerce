<?php
require_once'controller/auth_check.php';
require_once'model/product.php';

    $id = (int) ($_POST['id'] ?? $_GET['id'] ?? 0);
    $produit = $id > 0 ? findById($id) : null;
    
    if (!$produit) {
        $_SESSION['message'] = "Produit introuvable";
        $_SESSION['type_message'] = "danger";
        header("Location: ?route=profile");
        exit();
    }

    if ($produit['vendeur'] != $_SESSION['user']['id']) {
        $_SESSION['message'] = "Vous ne pouvez pas modifier ce produit";
        $_SESSION['type_message'] = "danger";
        header("Location: ?route=profile");
        exit();
    }
$erreurs = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom         = trim($_POST['nom'] ?? '');
    $prix        = $_POST['prix'] ?? '';
    $description = trim($_POST['description'] ?? '');
    $image       = $produit['image'];   
    $ancienneImage = null;

    // --- Validation ---
    if ($nom === '' || mb_strlen($nom) > 150) {
        $erreurs['nom'] = "Le nom est obligatoire (150 caractères maximum).";
    }

    if (!is_numeric($prix) || (float) $prix <= 0) {
        $erreurs['prix'] = "Le prix doit être un nombre supérieur à 0.";
    }

    // --- Nouvelle image (facultative) ---
    if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {

        if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $erreurs['image'] = "Erreur lors de l'envoi de l'image.";
        } else {
            $autorises = [
                'image/jpeg' => 'jpg',
                'image/png'  => 'png',
                'image/webp' => 'webp',
            ];
            // On vérifie le vrai type du fichier, pas seulement son extension
            $mime = (new finfo(FILEINFO_MIME_TYPE))->file($_FILES['image']['tmp_name']);

            if (!isset($autorises[$mime])) {
                $erreurs['image'] = "Format accepté : JPG, PNG ou WEBP.";
            }else {
                $nouveauNom = uniqid('prod_', true) . '.' . $autorises[$mime];

                if (move_uploaded_file($_FILES['image']['tmp_name'], 'assets/uploads/' . $nouveauNom)) {
                    $ancienneImage = $produit['image'];
                    $image         = $nouveauNom;
                } else {
                    $erreurs['image'] = "Impossible d'enregistrer l'image.";
                }
            }
        }
    }
    if (empty($erreurs)) {
        updateProduit($id, $nom, (float) $prix, $description, $image);

        // On supprime l'ancienne image seulement si une nouvelle l'a remplacée
        if ($ancienneImage && is_file('assets/uploads/' . $ancienneImage)) {
            unlink('assets/uploads/' . $ancienneImage);
        }

        $_SESSION['message'] = "Votre produit a été modifié";
        $_SESSION['type_message'] = "success";
        header("Location: ?route=profile"); // ou la page du produit
        exit();
    }

    // Erreur : on réaffiche ce que l'utilisateur a saisi
    $produit['nom']         = $nom;
    $produit['prix']        = $prix;
    $produit['description'] = $description;


}
require_once'views/product/update_product.php';
?>