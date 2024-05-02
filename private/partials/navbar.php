<?php require ('../backend/logoutUser.php') ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">Mbuli-Commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="new_product.php">Nouveau</a></li>

                <li class="nav-item"><a class="nav-link" href="orders.php">Commande</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Message</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Partenaires</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
                <?php
                // Vérifiez si $_SESSION['localisation'] est null
                if (isset($_SESSION['localisation']) && $_SESSION['localisation'] === null) {
                    // Si la valeur de $_SESSION['localisation'] est null, affichez le <li>
                    ?>
                <li class="nav-item"><a class="nav-link infos" href="infos.php">Cliquer ici</a></li>
                <?php
                }
                ?>

            </ul>

            <div class="d-flex justify-content-center align-items-center gap-5">
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../<?= $_SESSION['user_profil'] ?>" alt="mdo" width="32" height="32"
                            class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../">Mode Client</a></li>
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
            </div>
        </div>
    </div>
</nav>

<style>
@keyframes bounce {

    0%,
    100% {
        transform: translateY(0);
        color: var(--color-primary);
    }

    50% {
        transform: translateY(-3px);
        color: red;
    }
}

.infos {
    display: inline-block;
    animation: bounce 1s infinite;
}
</style>