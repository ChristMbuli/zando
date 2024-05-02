<?php require ('./backend/logoutUser.php');
require ('./backend/countProduct.php'); ?>
<style>
@keyframes bounce {

    0%,
    100% {
        transform: translateY(0);
        color: #F07423;
    }

    50% {
        transform: translateY(-3px);
        color: #0EAAFF;
    }
}

.infos {
    display: inline-block;
    animation: bounce 1s infinite;
}
</style>
<header>
    <!-- Jumbotron -->
    <div class="p-3 text-center bg-white border-bottom">
        <div class="container">
            <div class="row gy-3 justify-content-arrond align-items-center">
                <!-- Left elements -->
                <div class="col-lg-2 col-sm-4 col-4">
                    <a href="index.php" class="float-start">
                        <img src="./assets/img/logo1.png" height="90" />
                    </a>
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                    <div class="d-flex float-end">
                        <a href="./feedback.php"
                            class="border rounded me-3 py-1 px-3 nav-link d-flex align-items-center infos">
                            <i class="fa-solid fa-comments"></i>
                            <p class="d-none d-md-block mb-0">Feedback</p>

                        </a>

                        <?php if (isset($_SESSION['user'])) { ?>
                        <a href="my_cart.php" class="border rounded me-3 py-1 px-3 nav-link d-flex align-items-center">
                            <i class="fas fa-shopping-cart m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">Panier</p>
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?= $totalArticles ?></span>
                        </a>
                        <div class="dropdown text-end me">
                            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= $_SESSION['user_profil'] ?>" alt="mdo" width="32" height="32"
                                    class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small">
                                <li><a class="dropdown-item" href="">Profil</a></li>
                                <li><a class="dropdown-item" href="">Compte</a></li>
                                <li><a class="dropdown-item" href="">Panier</a></li>

                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./private/">Ajouter un article</a></li>
                                <?php

                                    if (isset($_SESSION['user'])) {
                                        // Récupérer l'ID de l'utilisateur actuellement connecté
                                        $userId = $_SESSION['user_id'];

                                        // Préparer la requête pour vérifier l'état 'online' de l'utilisateur
                                        $stmt = $conn->prepare('SELECT online FROM users WHERE id = ?');
                                        $stmt->execute([$userId]);
                                        $user = $stmt->fetch(PDO::FETCH_ASSOC);

                                        // Vérifier si l'utilisateur est en ligne (online == 1)
                                        if ($user && $user['online'] == 1) {
                                            // Si l'utilisateur est en ligne, afficher le bouton de déconnexion
                                            ?>
                                <li>
                                    <form action="" method="post">
                                        <button class="dropdown-item text-danger" name="logout">
                                            Déconnexion</button>
                                    </form>
                                </li>
                                <?php
                                        }
                                    }
                                    ?>

                            </ul>
                        </div>
                        <?php } else { ?>
                        <a href="./auth/signin.php" id="conn"
                            class="me-3 border rounded py-1 px-3 nav-link d-flex align-items-center"> <i
                                class="fas fa-user-alt m-1 me-md-2"></i>
                            <p class="d-none d-md-block mb-0">Connexion</p>
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <!-- Center elements -->

                <!-- Right elements -->
                <div class="col-lg-5 col-md-6 col-6">
                    <div class="input-group float-center">
                        <div class="form-outline">

                        </div>

                    </div>
                </div>
                <!-- Right elements -->
            </div>
        </div>
    </div>
    <!-- Jumbotron -->

</header>

<script>
document.getElementById('conn').addEventListener('click', function(event) {
    // Empêche le lien de fonctionner
    event.preventDefault();
    // Stocke l'URL actuelle dans le localStorage
    localStorage.setItem('redirectUrl', window.location.href);
    // Redirige vers la page de connexion
    window.location.href = './auth/signin.php';
});
</script>