<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure les fichiers de connexion à la base de données
$dbPath = __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
include $dbPath;

if (isset($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);

    // Vérifier si l'adresse e-mail est correcte
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msgError = "L'adresse e-mail est invalide.";
    } else {
        // Vérifier si l'e-mail existe dans la base de données
        $stmt_check = $conn->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
        $stmt_check->execute([$email]);
        $count = $stmt_check->fetchColumn();

        if ($count == 0) {
            $msgError = "L'adresse e-mail introuvable";
        } else {
            // Préparer la requête pour mettre à jour la colonne 'online' à 0 pour cet utilisateur
            $stmt_update = $conn->prepare('UPDATE users SET online = 0 WHERE email = ?');
            $stmt_update->execute([$email]);

            // Vérifier si la mise à jour a réussi
            if ($stmt_update->rowCount() > 0) {
                // Détruire la session
                session_destroy();
                header('Location: ./signin.php');
                exit();
            } else {
                $msgError = "Une erreur s'est produite !";
            }
        }
    }
}