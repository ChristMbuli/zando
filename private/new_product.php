<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ('../backend/displayCategory.php');

include ('../backend/security.php');
include ('../backend/newProduct.php');
include ('partials/head.php');
include ('partials/navbar.php') ?>
<section class=" text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Ajouter un article</h1>
            <p class="">
                <a href="./new_category.php" class="btn btn-primary my-2 me-3">Nouveau Category <i
                        class="fa-solid fa-plus"></i></a>
            </p>
        </div>
    </div>
</section>
<main class="container mb-5">
    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Categories</span>
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
            <p class="text-danger"><?= $msgError ?></p>
            <?php } elseif (isset($SuccessMsg)) { ?>
            <p class="text-success"><?= $SuccessMsg ?></p>
            <?php } ?>
            <form method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="title" placeholder="Nom article" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="price" placeholder="Prix article" required>
                    </div>

                    <div class="col-6">
                        <Select class="form-select" name="stock" required>
                            <option>Quantité stock</option>
                            <option value="En stock">En Stock</option>
                            <option value="Rupture stock">Rupture Stock</option>
                        </Select>
                    </div>
                    <div class="col-6">
                        <select class="form-select" name="category" required>
                            <option value="">Category</option>
                            <?php while ($category = $reqs->fetch()) { ?>
                            <option value="<?= htmlspecialchars($category['id']); ?>">
                                <?= htmlspecialchars($category['title']); ?>
                            </option>
                            <?php } ?>

                        </select>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row gy-3">
                    <div class="col-6 form-floating">
                        <textarea name="description" class="form-control" placeholder="Leave a comment here"
                            style="height: 100px"></textarea>
                    </div>

                    <div class="col-6">
                        <label for="cc-expiration" class="form-label">Image Article</label>
                        <input type="file" class="form-control" name="image" required>

                    </div>

                </div>

                <hr class="my-4">


                <button class="w-100 btn btn-primary btn-lg" name="add" type="submit">Ajouter <i
                        class="fa-solid fa-plus"></i></button>
            </form>
        </div>
    </div>
</main>

<?php include ('partials/footer.php') ?>