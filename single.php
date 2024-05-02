<?php
session_start();
require ('./backend/singleProduct.php');
require ('./backend/addCart.php');

include ('./components/head.php');
include ('./components/header.php') ?>

<?php if (isset($msgError)) { ?>
<div class="container py-3">
    <div class="card mb-4 border shadow-0" style="background-color:red;">
        <div class="p-4 d-flex justify-content-between">
            <div class="">
                <h5 class="text-white">Message Erreur</h5>
                <p class="mb-0 text-wrap text-white"><?= $msgError ?></p>
            </div>
            <a href="index.php" class="btn text-white" style="background-color:#F07423;">Accueil</a>

        </div>
    </div>
</div>
<?php } else { ?>
<!-- content -->
<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                        href="./<?= $imagePath ?>">
                        <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                            src="./<?= $imagePath ?>" />
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                        href="./<?= $imagePath ?>" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="./<?= $imagePath ?>" />
                    </a>
                </div>
                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        <?= $title ?>
                    </h4>
                    <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-1">
                                4.5
                            </span>
                        </div>
                        <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 articles</span>
                        <span class="text-success ms-2"><?= $stock ?></span>
                    </div>

                    <div class="mb-3">
                        <?php $r = $price + 15 ?>
                        <span class="text-decoration-line-through me-3">$ <?= $r ?></span>
                        <span class="h5 me-3">$ <?= $price ?></span>
                        <!-- <span class="text-muted">/per box</span> -->
                    </div>
                    <p>
                        <?= $description ?>
                    </p>
                    <div class="row">
                        <dt class="col-3">Type:</dt>
                        <dd class="col-9"><?= $categoryName ?></dd>
                        <dt class="col-3">Boutique:</dt>
                        <dd class="col-9"> <a href="#"><?= $sellerName ?></a> </dd>
                        <dt class="col-3">Adresse:</dt>
                        <dd class="col-9"><?= $adresseSeller ?></dd>
                    </div>

                    <hr />
                    <?php if (isset($errorMsg)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $errorMsg ?> <a href="my_cart.php" class="fw-bold text-dark">voir le panier ?</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?>


                    <div class="d-flex">

                        <?php if (isset($_SESSION['user'])) { ?>
                        <a href="checkout.php?id=<?= $productId ?>" class="btn  shadow-0 text-white me-4"
                            style="background-color: #F07423">
                            Acheter </a>
                        <form method="post">
                            <input type="text" name="productid" value="<?= $productId ?>" readonly hidden>
                            <input type="text" name="sellerid" value="<?= $storeId ?>" readonly hidden>
                            <button type="submit" name="cart" class="btn btn-primary shadow-0 me-4"> <i
                                    class="me-1 fa fa-shopping-basket"></i>
                                Ajouter au panier
                            </button>
                        </form>

                        <?php } else { ?>
                        <a href="./auth/signin.php" id="add-to-cart" class="btn  shadow-0 text-white me-4"
                            style="background-color: #F07423">
                            Acheter </a>
                        <a href="./auth/signin.php" class="btn btn-primary shadow-0 me-4"> <i
                                class="me-1 fa fa-shopping-basket"></i>
                            Ajouter au panier
                        </a>
                        <?php } ?>

                    </div>


                </div>
            </main>
        </div>
    </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4">
    <div class="container">
        <div class="row gx-4">
            <div class="col-lg-8 mb-4">
                <div class="border rounded-2 px-3 py-2 bg-white">
                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item d-flex" role="presentation">
                            <a class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab"
                                aria-controls="ex1-pills-1" aria-selected="true">Localisation</a>
                        </li>

                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div id="map" style="height: 300px; width: 100%;"></div>

                    <!-- Pills content -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="px-0 border rounded-2 shadow-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Articles similaires</h5>
                            <!--  -->
                            <?= $cardsHtml ?>
                            <!--  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>


<!-- Footer -->
<footer class="text-center text-lg-start text-muted mt-3" style="background-color: #F07423;color: white">
    <!-- Section: Links  -->
    <section class="">
        <div class="container text-white text-center text-md-start pt-4 pb-4">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-12 col-lg-3 col-sm-12 mb-2">
                    <!-- Content -->
                    <a href="home.php" target="_blank" class="">
                        <img src="./assets/img/logo2.png" height="100" />
                    </a>
                    <p class="mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, a?
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-6 col-sm-4 col-lg-2">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-2">
                        Liens Rapide
                    </h6>
                    <ul class="list-unstyled mb-4">
                        <li><a class="text-white" href="#">A propos</a></li>
                        <li><a class="text-white" href="#">Partenaires</a></li>
                        <li><a class="text-white" href="#">Categories</a></li>
                        <li><a class="text-white" href="#">Blogs</a></li>
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-6 col-sm-4 col-lg-2">
                    <!-- Links -->
                    <h6 class="text-uppercase  fw-bold mb-2">
                        Informations
                    </h6>
                    <ul class="list-unstyled mb-4">
                        <li><a class="text-white" href="#">Centre d'aide</a></li>
                        <li><a class="text-white" href="#">Remboursement</a></li>
                        <li><a class="text-white" href="#">Information livraison</a></li>
                        <li><a class="text-white" href="#">Fonctionnement</a></li>
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-6 col-sm-4 col-lg-2">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-2">
                        Supports
                    </h6>
                    <ul class="list-unstyled mb-4">
                        <li><a class="text-white" href="#">Politique Cookies</a></li>
                        <li><a class="text-white" href="#">Politique de confidentialité</a></li>
                        <li><a class="text-white" href="#">Mon compte</a></li>
                        <li><a class="text-white" href="#">Parametres</a></li>
                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-12 col-sm-12 col-lg-3">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-2">NEWSLETTER</h6>
                    <p class="text-white">Stay in touch with latest updates about our products and offers</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control border" placeholder="Email" aria-label="Email"
                            aria-describedby="button-addon2" />
                        <button class="btn btn-light border shadow-0" type="button" id="button-addon2"
                            data-mdb-ripple-color="dark">
                            Join
                        </button>
                    </div>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <div class="">
        <div class="container">
            <div class="d-flex justify-content-between py-4 border-top">
                <!--- payment --->
                <div>
                    <i class="fab fa-lg fa-cc-visa text-dark"></i>
                    <i class="fab fa-lg fa-cc-amex text-dark"></i>
                    <i class="fab fa-lg fa-cc-mastercard text-dark"></i>
                    <i class="fab fa-lg fa-cc-paypal text-dark"></i>
                </div>
                <!--- payment --->

                <!--- language selector --->
                <div class="dropdown dropup">
                    <a class="dropdown-toggle text-dark" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown"
                        aria-expanded="false"> <i class="flag-united-kingdom flag m-0 me-1"></i>Retour haut </a>
                </div>
                <!--- language selector --->
            </div>
        </div>
    </div>
</footer>
<!-- Footer -->

<?php include ('./components/footer.php') ?>



<script>
// Créer la carte et la centrer sur une position par défaut
var map = L.map('map').setView([-2.981434, 23.822889], 5);

// Récupération des données de l'utilisateur
const StoreData = <?php echo $infosDataJson; ?>;

// Ajouter les tuiles de la carte à partir d'OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 18,
}).addTo(map);

// Vérifiez si les données de l'utilisateur sont présentes
if (StoreData && StoreData.length > 0) {
    // Extraire les données de l'utilisateur
    const user = StoreData[0]; // Prendre la première entrée (puisque c'est un tableau)

    // Convertir les coordonnées en nombres flottants
    const lat = parseFloat(user.lat);
    const log = parseFloat(user.log);

    // Créer une icône personnalisée pour l'utilisateur
    var userIcon = L.divIcon({
        className: 'user-icon', // Nom de classe pour les styles CSS
        iconSize: [30, 30], // Taille de l'icône
        html: `<div style="background-image: url('${user.profil}'); width: 30px; height: 30px; background-size: cover; border-radius: 50%; border: 2px solid #ccc;"></div>`
    });


    // Centrer la carte sur les coordonnées de l'utilisateur
    map.setView([lat, log],
        13); // La carte sera centrée sur les coordonnées de l'utilisateur avec un niveau de zoom de 13

    // Créer un marqueur avec les coordonnées de l'utilisateur et l'icône personnalisée
    var marker = L.marker([lat, log], {
        icon: userIcon
    }).addTo(map);

    // Ajouter une info-bulle au marqueur
    marker.bindPopup(`
        <p><img src="${user.profil}" alt="Image de profil" width="50" /></p>
        <strong>Vendeur:</strong> ${user.seller_name}<br>
        <strong>Adresse:</strong> ${user.adresse}<br>
    `);
} else {
    console.error("Aucune donnée utilisateur trouvée dans StoreData.");
}
</script>