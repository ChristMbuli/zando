<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ('../backend/productSeller.php');
require ('../backend/security2.php');

include ('partials/head.php');
include ('partials/navbar.php') ?>

<section class=" text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Vos Articles</h1>
            <p class="">
                <a href="./new_product.php" class="btn btn-primary my-2 me-3">Nouveau article<i
                        class="fa-solid fa-plus"></i></a>
                <a href="./new_category.php" class="btn btn-secondary my-2 me-3">Nouvelle category <i
                        class="fa-solid fa-plus"></i></a>
            </p>
        </div>
    </div>
</section>

<div class="album py-3 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 g-3">
            <?php

            foreach ($articles as $article) { ?>
            <div class="col">
                <div class="card shadow-sm">
                    <a href="#">
                        <img src="../<?= htmlspecialchars($article['image']) ?>" alt="" class="card-img">
                    </a>

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4><?= htmlspecialchars($article['title']) ?></h4>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-dark h4">$ <?= htmlspecialchars($article['price']) ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if (isset($Message)) { ?>
            <p><?= $Message ?></p>
            <?php } ?>
        </div>
    </div>

</div>



<?php include ('partials/footer.php') ?>