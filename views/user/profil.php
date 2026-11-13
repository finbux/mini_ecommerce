

<div class="container mb-4">

    <div class="card profile-card mx-auto p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Mes produits</h4>

            <span class="badge bg-dark">
              
            </span>
        </div>

        <?php if (!empty($produits)): ?>
        
            <div class="row g-3">

                <?php foreach ($produits as $produit): ?>

                    <div class="col-6 col-md-4">

                        <div class="product-profile-card"> 

                            <img
                            <?php if(is_null($produit['image'])){
                                echo' src="assets/img/no-image.png"';
                            }
                            else{
                                echo' src="assets/uploads/'.$produit['image'].'"';
                            }
                            ?>   
                                width="150"
                                alt="<?= htmlspecialchars($produit['nom']) ?>"
                                class="img-fluid"
                            >

                            <h6 class="mt-2">
                                <?= htmlspecialchars($produit['nom']) ?>
                            </h6>

                            <p class="fw-bold mb-0">
                                <?= number_format($produit['prix'], 2, ',', ' ') ?> €
                            </p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="dialog" data-bs-target="#">
                                    Modifier
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="dialog" data-bs-target="#deleteDialog">
                                    Supprimer
                            </button>

                            <dialog class="dialog" id="deleteDialog">
                                <div class="dialog-header">
                                    <h1 class="dialog-title">Suppression produit </h1>
                                  
                                </div>
                                <div class="dialog-body">
                                    <p>Voulez vous supprimer le produit : <?= htmlspecialchars($produit['nom']) ?> ?</p>
                                </div>
                                <div class="dialog-footer">
                                    <form action="?route=delete_product" method="post">
                                        <input type="hidden" name="id"value="<?= htmlspecialchars($produit['id']) ?>">
                                    
                                        <button type="submit" class="btn btn-danger">Oui</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="dialog">Annuler</button>
                                    </form>
                                </div>
                            </dialog>
                        </div>

                    </div>
                    
                    
                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="text-center py-4">
                <i class="fa-solid fa-box-open fa-2x mb-3 text-muted"></i>

                <p class="text-muted mb-0">
                    Vous n'avez pas encore publié d'annonce.
                </p>
            </div>

        <?php endif; ?>

        <a href="?route=add_product" class="btn btn-nexora w-100 mt-4">
            <i class="fa-solid fa-plus me-2"></i>
            ajouter un produit
        </a>

    </div>

</div>



<section id="profile">
    <div class="container py-5">

        <div class="card profile-card mx-auto p-4">

            <div class="text-center mb-4">

                <h3>
                    <?= htmlspecialchars($_SESSION['user']['pseudo']) ?>
                </h3>

                <p class="text-muted">Mon espace personnel</p>

            </div>

            <div class="profile-info">
                <div class="info-item">
                    <small>Adresse e-mail</small>
                    <p><?= htmlspecialchars($_SESSION['user']['email']) ?></p>
                </div>

                <div class="info-item">
                    <small>Membre depuis le</small>
                    <p>
                        <?= date(
                            'd/m/Y',
                            strtotime($_SESSION['user']['created_at'])
                        ) ?>
                    </p>
                </div>

            </div>

            <a href="#"
            class="btn btn-nexora w-100 mt-4">
                Modifier mon profil
            </a>

        </div>

    </div>


</section>