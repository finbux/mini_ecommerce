
<?php if (empty($lignes)): ?>
 
        <div class="alert alert-info text-center py-5">
            <p class="fs-5 mb-3">Votre panier est vide.</p>
            <a class="btn btn-primary" href="index.php">Continuer mes achats</a>
        </div>
    <?php else: ?>
        <form method="post" action="?route=update_panier">
            <div class="card shadow-sm mb-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Produit</th>
                                <th class="text-end">Prix unitaire</th>
                                <th class="text-center" style="width: 130px;">Quantité</th>
                                <th class="text-end">Sous-total</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lignes as $ligne): ?>
                                <tr>
                                    <td class="fw-semibold"><?= htmlspecialchars($ligne['nom']) ?></td>
                                    <td class="text-end"><?= number_format($ligne['prix'], 2, ',', ' ') ?> €</td>
                                    <td>
                                        <input type="number"
                                               class="form-control text-center"
                                               name="quantite[<?= $ligne['id'] ?>]"
                                               value="<?= $ligne['quantite'] ?>"
                                               min="0">
                                    </td>
                                    <td class="text-end fw-semibold"><?= number_format($ligne['sous_total'], 2, ',', ' ') ?> €</td>
                                    <td class="text-center">
                                        <button type="submit"
                                                class="btn btn-outline-danger btn-sm"
                                                form="form-supprimer"
                                                formaction="?route=remove_product"
                                                name="id"
                                                value="<?= $ligne['id'] ?>"
                                                onclick="return confirm('Retirer ce produit du panier ?')">
                                            <i class="fa-solid fa-trash"></i> Supprimer
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="table-light">
                                <td colspan="3" class="text-end fs-5 fw-bold">Total</td>
                                <td class="text-end fs-5 fw-bold text-success">
                                    <?= number_format($total, 2, ',', ' ') ?> €
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
 
            <div class="d-flex flex-wrap justify-content-between gap-2">
                <a class="btn btn-outline-secondary" href="index.php">← Continuer mes achats</a>
 
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-outline-danger"
                       href="?route=panier/delete"
                       onclick="return confirm('Vider le panier ?')">Vider le panier</a>
                    <button type="submit" class="btn btn-secondary">Mettre à jour</button>
                    <a class="btn btn-success" href="commande.php">Valider la commande</a>
                </div>
            </div>
            
        </form>
        <form id="form-supprimer" method="POST"></form>
 
    <?php endif; ?>






