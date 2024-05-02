<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure le fichier de connexion à la base de données
$dbPath = __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
include $dbPath;

// Vérifiez que les variables d'entrée existent et définissez une valeur par défaut en cas de null
$adresse = htmlspecialchars($_POST['adresse'] ?? '');
$longitude = htmlspecialchars($_POST['longitude'] ?? '');
$latitude = htmlspecialchars($_POST['latitude'] ?? '');

// Vérifiez si le formulaire a été soumis
if (isset($_POST['sauvegarder'])) {
    // Vérifiez que les champs requis sont remplis
    if ($adresse !== '' && $longitude !== '' && $latitude !== '') {
        // Récupérez l'ID de l'utilisateur à partir de la session
        $userId = $_SESSION['user_id'];

        // Préparez la requête SQL pour mettre à jour les données de l'utilisateur
        $stmt_update = $conn->prepare('UPDATE users SET adresse = ?, lat = ?, log = ? WHERE id = ?');

        // Liez les valeurs aux paramètres de la requête préparée
        $stmt_update->bindValue(1, $adresse, PDO::PARAM_STR);
        $stmt_update->bindValue(2, $latitude, PDO::PARAM_STR);
        $stmt_update->bindValue(3, $longitude, PDO::PARAM_STR);
        $stmt_update->bindValue(4, $userId, PDO::PARAM_STR);

        // Exécutez la requête préparée
        if ($stmt_update->execute()) {
            header('Location: ./index.php');
        } else {
            echo "Erreur lors de la mise à jour des informations.";
        }

        // Fermez la requête préparée
        $stmt_update->closeCursor();
    } else {
        echo "Veuillez remplir tous les champs requis.";
    }
}