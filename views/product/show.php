
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
                <form action="?route=add_panier" method="POST">
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
<section class="mt-5">
    <h4 class="mb-3">Commentaires (<?= count($commentaires) ?>)</h4>

    <?php if (isset($_SESSION['user'])): ?>
        <form action="?route=add_comment" method="POST" class="mb-4">
            <input type="hidden" name="produit_id" value="<?= (int) $produit['id'] ?>">
            <textarea name="contenu" class="form-control mb-2" rows="3"
                      maxlength="1000" required
                      placeholder="Votre commentaire..."></textarea>
            <button type="submit" class="btn btn-nexora">Publier</button>
        </form>
    <?php else: ?>
        <div class="alert alert-info">
            <a href="?route=login">Connectez-vous</a> pour laisser un commentaire.
        </div>
    <?php endif; ?>

    <?php if (empty($commentaires)): ?>
        <p class="text-muted">Aucun commentaire pour le moment.</p>
    <?php else: ?>
        <?php foreach ($commentaires as $com): ?>
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <strong><?= htmlspecialchars($com['pseudo']) ?></strong>
                        <small class="text-muted">
                            <?= date('d/m/Y à H:i', strtotime($com['created_at'])) ?>
                        </small>
                    </div>

                    <p class="mb-0 mt-2"><?= nl2br(htmlspecialchars($com['contenu'])) ?></p>

                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $com['user_id']): ?>
                        <form action="?route=delete_comment" method="POST" class="mt-2"
                              onsubmit="return confirm('Supprimer ce commentaire ?')">
                            <input type="hidden" name="id" value="<?= (int) $com['id'] ?>">
                            <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
</div>
