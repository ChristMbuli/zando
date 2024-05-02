<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ('../backend/sellerOrder.php');

require ('../backend/security2.php');

include ('partials/head.php');
include ('partials/navbar.php') ?>
<section class=" text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Vos Commandes</h1>
        </div>
    </div>
</section>
<div class="container">


    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Nom cliens</th>
                <th>Produits</th>
                <th>Prix</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($orders as $order) { ?>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="../<?= $order['user_profile'] ?>" alt="" style="width: 45px; height: 45px"
                            class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1"><?= $order['user_name'] ?></p>
                            <p class="text-muted mb-0">ref: <?= $order['order_id'] ?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1"><?= $order['product_title'] ?></p>
                    <p class="text-muted mb-0">ref: <?= $order['order_id'] ?></p>
                </td>
                <td>
                    <span class="fw-normal mb-1">$ <?= $order['price'] ?></span>
                </td>

                <td>
                    <button type="submit" class="btn btn-light border text-danger icon-hover-danger"><i
                            class="fa-solid fa-xmark"></i></button>

                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include ('partials/footer.php') ?>