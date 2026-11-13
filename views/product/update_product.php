

<div class="container py-5">

    <div class="card product-form mx-auto p-4">

        <h3 class="mb-2">Modifier un produit</h3>
        <p class="text-muted mb-4">
           Modifier votre article
        </p>

        <form action="?route=update_product"
              method="POST"
              enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?=  isset($produit['id']) ? $produit['id'] : '' ;?>">
            <div class="mb-3">
                <label class="form-label">Nom du produit *</label>
                <input
                    type="text"
                    name="nom"
                    placeholder="Ex : Casque Bluetooth"
                    maxlength="150"
                    value="<?=  isset($produit['nom']) ? $produit['nom'] : '' ;?>"
                    required
                    class="form-control <?= isset($erreurs['nom']) ? ' is-invalid' : '' ; ?>"
                                <?php if (isset($erreurs['nom'])): ?>aria-invalid="true" aria-describedby="nom-erreur"<?php endif; ?>>
                                <?php if (isset($erreurs['nom'])): ?>
                                <div id="nom-erreur" class="invalid-feedback"><?= htmlspecialchars($erreurs['nom']) ?></div>
                                <?php endif; ?>
                
                
            </div>

            <div class="mb-3">
                <label class="form-label">Prix (€) *</label>
                <input
                    type="number"
                    name="prix"
                    placeholder="49.90"
                    min="0.01"
                    step="0.01"
                    value="<?=  isset($produit['prix']) ? $produit['prix'] : '' ;?>"
                    required
                    class="form-control <?= isset($erreurs['prix']) ? ' is-invalid' : '' ; ?>"
                                <?php if (isset($erreurs['prix'])): ?>aria-invalid="true" aria-describedby="nom-erreur"<?php endif; ?>>
                                <?php if (isset($erreurs['prix'])): ?>
                                <div id="nom-erreur" class="invalid-feedback"><?= htmlspecialchars($erreurs['prix']) ?></div>
                                <?php endif; ?>
                
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                   <textarea name="description" class="form-control" rows="4"
             placeholder="Décrivez votre produit..."><?= htmlspecialchars($produit['description'] ?? '') ?></textarea>
                <small class="text-muted">
                    Facultatif
                </small>
            </div>                      
            <div class="mb-3">
                <label class="form-label">Image du produit</label>
                <img src="assets/uploads/<?=  isset($produit['image']) ? $produit['image'] : '' ;?>" alt="image produit" width="200">
                <input
                    type="file"
                    name="image"
                    accept="image/jpeg,image/png,image/webp"
                    class="form-control  <?= isset($erreurs['image']) ? ' is-invalid' : '' ; ?>"
                                <?php if (isset($erreurs['image'])): ?>aria-invalid="true" aria-describedby="nom-erreur"<?php endif; ?>>
                                <?php if (isset($erreurs['image'])): ?>
                                <div id="nom-erreur" class="invalid-feedback"><?= htmlspecialchars($erreurs['image']) ?></div>
                                <?php endif; ?>
                
                <small class="text-muted">
                    Facultatif - JPG, PNG ou WEBP.
                </small>
            </div>

            <div class="mb-4">
                <label class="form-label">Vendeur</label>
                <input
                    type="text"
                    class="form-control"
                    name="vendeur"
                    value="<?php echo htmlspecialchars($_SESSION['user']['pseudo']) ?>"
                    disabled
                >
            </div>

            <button type="submit" class="btn btn-nexora w-100">
                Modifier mon produit
            </button>

        </form>

    </div>

</div>
