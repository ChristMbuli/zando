<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['logout'])) {
    if (isset($_SESSION['user'])) {
        // Mettre à jour la colonne "online" à 0 pour indiquer que le user est hors ligne
        $updateOnlineStatus = $conn->prepare('UPDATE users SET online = 0 WHERE id = :userId');
        $updateOnlineStatus->execute(array('userId' => $_SESSION['user_id']));

        // Détruire la session
        session_destroy();


        header('Location: ./index.php');


    }
}