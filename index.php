<?php
session_start();

require ('./backend/allProducts.php');

include ('./components/head.php') ?>

<!--Main Navigation-->
<?php include ('./components/header.php') ?>
<!-- Products -->
<section>
    <!-- Jumbotron -->
    <div class=" text-white py-5" style="background-image: url('./assets/img/banner.png')">
        <div class="container py-5">
            <h1 class="text-dark">
                Meilleurs produits et <br>
                marques dans notre magasin
            </h1>
            <p class="text-dark">
                Produits tendance, prix d'usine, excellent service
            </p>
            <button type="button" class="btn btn-light text-dark mb-3">
                Apprence encore plus
            </button>

            <a href="#product" class="learn btn btn-light shadow-0 text-primary pt-2 border mb-3">
                <span class="buy pt-1 text-dark ">Achetez maintenant</span>
            </a>
            <style>
            .learn:hover {
                background-color: #F07423;
                color: white;
            }

            .buy:hover {

                color: white;
            }
            </style>
        </div>
    </div>
    <div class="mt-5" id="product"></div>
    <!-- Jumbotron -->
    <div class="container my-5">
        <header class="mb-4">
            <h3>Nouveau produits</h3>
        </header>

        <div class="row">
            <?php while ($row = $query->fetch()) { ?>
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="card w-100 my-2 shadow-2-strong">
                    <a href="single.php?id=<?= htmlspecialchars($row['id']) ?>"><img
                            src="<?= htmlspecialchars($row['image']) ?>" class="card-img-top"
                            style="aspect-ratio: 1 / 1" /></a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                        <p class="card-text">$ <?= htmlspecialchars($row['price']) ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Products -->

<!-- Feature -->
<section class="mt-5" style="background-color: #f5f5f5;">
    <div class="container text-dark pt-3">
        <header class="pt-4 pb-3">
            <h3>Pourquoi nous choisir</h3>
        </header>

        <div class="row mb-4">
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
                    <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                        <i class="fas fa-camera-retro fa-2x fa-fw floating" style="color: #F07423"></i>
                    </span>
                    <figcaption class="info">
                        <h6 class="title">Prix ​​raisonnables</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
                    <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                        <i class="fas fa-star fa-2x fa-fw floating" style="color: #F07423"></i>
                    </span>
                    <figcaption class="info">
                        <h6 class="title">Meilleure qualité</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
                    <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                        <i class="fas fa-plane fa-2x fa-fw floating" style="color: #F07423"></i>
                    </span>
                    <figcaption class="info">
                        <h6 class="title">Livraison internationale</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
                    <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                        <i class="fas fa-users fa-2x fa-fw floating" style="color: #F07423"></i>
                    </span>
                    <figcaption class="info">
                        <h6 class="title">Satisfaction du client</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
                    <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                        <i class="fas fa-thumbs-up fa-2x fa-fw floating" style="color: #F07423"></i>
                    </span>
                    <figcaption class="info">
                        <h6 class="title">Clients satisfaits</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
            <div class="col-lg-4 col-md-6">
                <figure class="d-flex align-items-center mb-4">
                    <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                        <i class="fas fa-box fa-2x fa-fw floating" style="color: #F07423"></i>
                    </span>
                    <figcaption class="info">
                        <h6 class="title">Milliers d'articles</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                    </figcaption>
                </figure>
                <!-- itemside // -->
            </div>
            <!-- col // -->
        </div>
    </div>
    <!-- container end.// -->
</section>
<!-- Feature -->

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
