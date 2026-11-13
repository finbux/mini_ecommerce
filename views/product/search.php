<div class="container py-5">

    <h2 class="mb-4">
        Résultats pour « <?= htmlspecialchars($terme) ?> »
    </h2>

    <?php if ($terme === ''): ?>

        <div class="alert alert-info">Saisissez un mot pour lancer une recherche.</div>

    <?php elseif (empty($produits)): ?>

        <div class="alert alert-warning">Aucun produit ne correspond à votre recherche.</div>

    <?php else: ?>

        <p class="text-muted"><?= count($produits) ?> produit(s) trouvé(s)</p>

        <div class="row g-4">
            <?php foreach ($produits as $produit): ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <?php if (!empty($produit['image'])): ?>
                            <img src="assets/uploads/<?= htmlspecialchars($produit['image']) ?>"
                                 class="card-img-top" alt="<?= htmlspecialchars($produit['nom']) ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($produit['nom']) ?></h5>
                            <p class="fw-bold"><?= number_format($produit['prix'], 2, ',', ' ') ?> €</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

</div>