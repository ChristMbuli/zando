<?php
require ('./backend/addFeedback.php');

include ('./components/head.php');


include ('./components/header.php') ?>

<style>
.success-message {
    color: green;
    margin-top: 20px;
    display: flex;
    align-items: center;
    opacity: 0;
    animation: fadeInOutAndMove 4s ease-in-out forwards;
}

/* Animation pour le message de succès avec l'emoji qui bouge */
@keyframes fadeInOutAndMove {
    0% {
        opacity: 0;
        transform: translateX(0);
    }

    20% {
        opacity: 1;
        transform: translateX(10px);
    }

    80% {
        opacity: 1;
        transform: translateX(-10px);
    }

    100% {
        opacity: 0;
        transform: translateX(0);
    }
}
</style>
<section class=" text-center container">
    <div class="row py-lg-3">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Donnez-nous vos retours, nos extraterrestres les adorent ! 👽
            </h1>
        </div>
    </div>
</section>
<main class="container mb-5">
    <div class="row g-5">
        <div class="col-md-4 col-lg-6 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Message</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div class="lh-basse">Nous testons notre nouvelle application. et on aimerait savoir
                        ce que vous en pensez ! <br /> Soyez honnêtes : aimez-vous notre design, notre navigation, nos
                        fonctionnalités ? Ou trouvez-vous que c'est aussi compliqué qu'un puzzle de l'espace ? 🧩 <br />

                        Partagez vos idées et vos suggestions, même les plus farfelues ! 😏 <br /> Envoyez-nous un
                        commentaires

                        💌 Nos extraterrestres sont prêts à lire vos retours !

                        Merci et amusez-vous bien ! 🎉
                    </div>
                </li>

            </ul>

        </div>



        <div class="col-md-3 col-lg-6">
            <?php if (isset($msgError)) { ?>
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                <?= $msgError ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
            <?php if (isset($successMsg)) { ?>

            <div class="alert alert-success alert-dismissible fade show success-message" role="alert">
                🙂<?= $successMsg ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="pseudo"
                            placeholder="Entrez un pseudo qui tue ! 💥 ">
                    </div>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="message"
                            placeholder="Un commentaire flexible comme un 🥷🏾" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                    </div>

                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-lg text-white" name="send" type=" submit"
                    style="background-color: #F07423;">Envoyer
                    🚀</button>
            </form>
        </div>




    </div>
</main>


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