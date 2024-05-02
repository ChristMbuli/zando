<?php
session_start();
require ('../backend/displayCategory.php');
require ('../backend/addCategory.php');
include ('partials/head.php');
include ('partials/navbar.php') ?>

<section class=" text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Ajouter une nouvelle Category</h1>
            <p class="">
                <a href="./new_product.php" class="btn btn-primary my-2 me-3">Nouveau produit ici <i
                        class="fa-solid fa-plus"></i></a>
            </p>
        </div>
    </div>
</section>

<main class="container mb-5">
    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Categories disponible</span>
            </h4>
            <ul class="list-group mb-3">
                <?php while ($categories = $req->fetch()) { ?>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0"><?= htmlspecialchars($categories['title']); ?></h6>
                    </div>
                    <span class="text-body-secondary">120</span>
                </li>
                <?php } ?>

            </ul>

        </div>
        <div class="col-md-7 col-lg-8">
            <?php if (isset($msgError)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $msgError ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } elseif (isset($SuccessMsg)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $SuccessMsg ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="Nom de la catégorie">
                    </div>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="image">
                    </div>

                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" name="add" type=" submit">Ajouter <i
                        class="fa-solid fa-plus"></i></button>
            </form>
        </div>
    </div>
</main>



<?php include ('partials/footer.php') ?>
