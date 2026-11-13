
<div class="container py-5">

    <!-- Retour boutique -->
    <div class="mb-4">
        <a href="index.php" class="back-link">
            <i class="fa-solid fa-arrow-left me-2"></i>
            Retour à la boutique
        </a>
    </div>

    <div class="row g-5">

        <!-- Image du produit -->
        <div class="col-md-6">

            <div class="product-image-box">
                <img
                    src="assets/uploads/<?= htmlspecialchars($produit['image']) ?>"
                    alt="<?= htmlspecialchars($produit['nom']) ?>"
                    width="450"
                    onerror="this.onerror=null;this.src='assets/img/no-image.png';"
                >
            </div>

        </div>
        <!-- Informations produit -->
        <div class="col-md-6">

            <div class="product-details">

                <span class="product-badge">
                    Produit disponible
                </span>

                <h1 class="product-title mt-3">
                    <?= htmlspecialchars($produit['nom']) ?>
                </h1>

                <div class="product-price my-3">
                    <?= number_format($produit['prix'], 2, ',', ' ') ?> €
                </div>

                <p class="text-muted">
                    <?= !empty($produit['description'])
                        ? nl2br(htmlspecialchars($produit['description']))
                        : 'Aucune description disponible.' ?>
                </p>

                <hr class="my-4">

        
                <!-- Ajout au panier -->
                <form action="?route=add_panier" method="GET">
                    <input
                        type="hidden"
                        name="id"
                        value="<?= (int)$produit['id'] ?>"
                    >

                    <button type="submit"
                            class="btn btn-nexora w-100">
                        <i class="fa-solid fa-cart-plus me-2"></i>
                        Ajouter au panier
                    </button>

                </form>

                <!-- Date de publication -->
                <p class="text-muted small mt-4">
                    <i class="fa-regular fa-calendar me-2"></i>
                    Publié le
                    <?= !empty($produit['created_at'])
                        ? date('d/m/Y', strtotime($produit['created_at']))
                        : 'Date inconnue' ?>
                </p>

            </div>

        </div>

    </div>

</div>
