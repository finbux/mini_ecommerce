<?php
require_once('model/product.php');


if($_SESSION['user'])
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if($id > 0 && findById($id)){
            
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = [];
            }

            if (isset($_SESSION['panier'][$id])) {
                $_SESSION['panier'][$id]++;
            } else {
                $_SESSION['panier'][$id] = 1;
                
            }

            

            $panier = $_SESSION['panier'] ?? [];

            foreach ($panier as $idProduit => $quantite) {
                
                    $produit = findById($idProduit);
                
                    if (!$produit) {
                        unset($_SESSION['panier'][$idProduit]); // produit disparu de la base
                        continue;
                    }
                    $total = 0;
                    // ⚠️ Adapte 'nom' et 'prix' aux colonnes de ta table
                    $sousTotal = $produit['prix'] * $quantite;
                    $total = $total + $sousTotal;
                
                    $lignes[] = [
                        'id'         => $idProduit,
                        'nom'        => $produit['nom'],
                        'prix'       => $produit['prix'],
                        'quantite'   => $quantite,
                        'sous_total' => $sousTotal,
                    ];

                }
                    require_once('views/panier/show.php'); 

        }
         
    }
    else{
        $_SESSION['message'] = "Vous devez vous connecter pour ajouter des produits";
        $_SESSION['type_message'] = "danger";
        header("Location: ?route=login");
    }
    require_once('views/panier/show.php'); 
?>


