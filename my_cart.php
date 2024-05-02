<?php
session_start();
require ('./backend/singleProduct.php');
require ('./backend/cartUser.php');

include ('./components/head.php');
include ('./components/header.php'); ?>

<section class="bg-light my-5 mb-5">
    <div class="container">
        <div class="row">
            <!-- cart -->
            <div class="col-lg-9">
                <div class="card border shadow-0">
                    <div class="m-4">
                        <h4 class="card-title mb-4">Votre Panier</h4>

                        <?php if (isset($alert)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $alert ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php } else { ?>
                        <?= $cardsHtml ?>
                        <?php } ?>


                    </div>

                    <div class="border-top pt-4 mx-4 mb-4">
                        <p><i class="fas fa-truck text-muted fa-lg"></i>Livraison gratuite sous 1 à 2 semaines</p>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut
                            aliquip
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card shadow-0 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total price:</p>
                            <p class="mb-2">$329.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Discount:</p>
                            <p class="mb-2 text-success">-$60.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">TAX:</p>
                            <p class="mb-2">$14.00</p>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total price:</p>
                            <p class="mb-2 fw-bold">$283.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- summary -->


        </div>
    </div>
</section>

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