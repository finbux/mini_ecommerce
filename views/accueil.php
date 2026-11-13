<section class="img-hero">

    <button class="hero-btn-products">Voir nos produits</button>
    
    <div class="container-slogan">
        <div class="item-slogan">
            <i class="fa-solid fa-truck"></i>
            <br>
            Livraison offerte dès 50€
        </div>
        <div class="item-slogan">
           
           
           <i class="fa-solid fa-shield-halved"></i>
           <br>
           1 an de garantie
        </div>
        <div class="item-slogan">
            
            
            <i class="fa-solid fa-headset"></i>
            <br>
            Support 360
        </div>
    </div>
</section>

<h1 class="mt-5">
    Produits par catégories

    <section class="container-categories">
        <div class="item-categories">

                <img src="assets/img/nexora-audio.png" alt="categorie audio">

        </div>
        <div class="item-categories">
            
                <img src="assets/img/nexora-chargeurs.png" alt="categorie audio">
                
  
        </div>
        <div class="item-categories">
            
                <img src="assets/img/nexora-protection.png" alt="categorie audio">

        </div>
        <div class="item-categories">
            
                <img src="assets/img/nexora-autres.png" alt="categorie audio">

        </div>
    </section>

    
<section class="products-section">
    <div class="products-header">
        <h2>Nos produits</h2>
        <a href="#">Voir tout <i class="fa-solid fa-arrow-right"></i></a>
    </div>

    <div class="products-grid">


        <?php foreach($produits as $produit)
        { ?>
            <article class="product-card">
            <div class="product-image">
                <?php if(is_null($produit['image'])){
                    echo '<img src="assets/img/no-image.png">';  
                } 
                else
                {
                    echo '<img src="assets/uploads/'.$produit['image'].'" alt="Chargeur rapide">';
                }
               ?>
            </div>
            <a href="?route=product&id=<?php echo $produit['id'] ?>">
                <div class="product-info">
                    <h3><?php echo $produit['nom'] ?></h3>
                    <div class="product-bottom">
                        <span class="product-price"><?php echo $produit['prix'] ?>€</span>
                        <button class="cart-button" aria-label="Ajouter au panier">
                           <a href="?route=add_panier&id=<?= $produit['id'] ?>"><i class="fa-solid fa-cart-shopping"></i></a> 
                        </button>
                    </div>
                </div>
            </a>
        </article>

        <?php
        }
    ?>

        
    </div>
</section>

</h1>