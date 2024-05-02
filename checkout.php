<?php
require ('./backend/singleProduct.php');
require ('./backend/orderAdd.php');
require ('./backend/security2.php');

include ('./components/head.php');
include ('./components/header.php'); ?>

<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <?php if (isset($msgError)) { ?>
            <div class="card mb-4 border shadow-0 " style="background-color:red;">
                <div class="p-4 d-flex justify-content-between">
                    <div class="">
                        <h5 class="text-white">Message Erreur</h5>
                        <p class="mb-0 text-wrap text-white"><?= $msgError ?></p>
                    </div>
                    <a href="index.php" class="btn text-white" style="background-color:#F07423;">Accueil</a>

                </div>
            </div>
            <?php } else { ?>
            <div class="col-xl-8 col-lg-8 mb-4">
                <!-- Checkout -->
                <div class="card shadow-0 border">
                    <div class="p-4">
                        <?php if (isset($alert)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $alert ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php } else { ?>
                        <form method="post">
                            <h5 class="card-title mb-3">Formulaire de payment</h5>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <p class="mb-0">Nom Complet</p>
                                    <div class="form-outline">
                                        <input type="text" id="typeText"
                                            value="<?= isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '' ?>"
                                            placeholder="Nom complet" class="form-control" readonly />

                                    </div>
                                </div>
                                <input type="hidden" name="productid" value="<?= $productId ?>">
                                <input type="hidden" name="sellerid" value="<?= $storeId ?>">


                                <div class="col-6">
                                    <p class="mb-0">Adresse email</p>
                                    <div class="form-outline">
                                        <input type="email" id="typeText"
                                            value="<?= isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '' ?>"
                                            placeholder="adresse email" class="form-control" readonly />
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <p class="mb-0">Télephone</p>
                                    <div class="form-outline">
                                        <input type="text" id="typePhone"
                                            value="<?= isset($_SESSION['user_number']) ? $_SESSION['user_number'] : '' ?>"
                                            class="form-control" readonly />
                                    </div>
                                </div>


                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    required />
                                <label class="form-check-label" for="flexCheckDefault">Tenez-moi au courant des
                                    nouvelles</label>
                            </div>

                            <hr class="my-4" />

                            <h5 class="card-title mb-3">Informations d'expédition</h5>

                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <p class="mb-0">Votre adresse</p>
                                    <div class="form-outline">
                                        <input type="text" id="typeText" placeholder="Entrez votre adresse"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <p class="mb-0">Messages</p>
                                <div class="form-outline">
                                    <textarea class="form-control" id="textAreaExample1" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="float-end">
                                <a href="single.php?id=<?= $productId ?>" class="btn btn-light border">Annuler</a>
                                <button type="submit" class="btn btn-success shadow-0 border">Acheter</button>
                            </div>
                        </form>
                        <?php } ?>

                    </div>
                </div>
                <!-- Checkout -->
            </div>
            <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
                <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
                    <h6 class="mb-3">Résumé</h6>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Total prix:</p>
                        <p class="mb-2">$<?= $price ?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">TVA:</p>
                        <p class="mb-2 text-danger">+ $1.5</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">faris service:</p>
                        <p class="mb-2">$3</p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">Total price:</p>
                        <p class="mb-2 fw-bold">$149.90</p>
                    </div>

                    <hr />
                    <h6 class="text-dark my-4">Achat en cours</h6>

                    <div class="d-flex align-items-center mb-4">
                        <div class="me-3 position-relative">

                            <img src="./<?= $imagePath ?>" style="height: 96px; width: 96x;"
                                class="img-sm rounded border" />
                        </div>
                        <div class="">
                            <a href="single.php?id=<?= $productId ?>" class="nav-link">
                                <?= $title ?>
                            </a>
                            <div class="price text-muted">Total: $<?= $price ?></div>
                        </div>
                    </div>

                </div>
            </div>
            <?php } ?>

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