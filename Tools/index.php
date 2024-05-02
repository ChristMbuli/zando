<?php session_start();
require ('./backend/allProducts.php');
include ('./components/head.php') ?>
<?php include ('./components/navbar.php') ?>
<?php include ('./components/hero.php') ?>


<!-- Section-->
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 g-3">

            <?php while ($row = $query->fetch()) { ?>

            <div class="col">
                <div class="card shadow-sm">
                    <a href="details.php?id=<?= htmlspecialchars($row['id']) ?>">
                        <img src="<?= htmlspecialchars($row['image']) ?>" alt="" class="card-img">
                    </a>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5><?= htmlspecialchars($row['title']) ?></h5>
                            <span class="badge text-bg-primary"><?= htmlspecialchars($row['category_name']) ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="my_cart.php" class="btn btn-sm btn-outline-secondary">Ajouter au
                                    panier</a>
                            </div>
                            <small class="text-body-secondary fw-bold h4">$
                                <?= htmlspecialchars($row['price']) ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>




        </div>
    </div>
</div>

<style>
.card-img {
    width: 100%;
    /* L'image occupe toute la largeur de la carte */
    height: auto;
    /* Laissez la hauteur de l'image s'ajuster automatiquement */
    object-fit: cover;
    /* Permet à l'image de couvrir toute la carte tout en maintenant son aspect ratio */
    max-height: 300px;
    /* Limite la hauteur maximale de l'image à 300px */
}

.card {
    max-height: 450px;
    /* Limite la hauteur maximale de la carte à 400px */
    display: flex;
    flex-direction: column;
}

.card-body {
    flex-grow: 1;
    /* Permet d'ajuster la taille du texte dans la carte en fonction de l'image */
}
</style>




<?php include ('./components/footer.php') ?>