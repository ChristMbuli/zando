<?php
// Chargement de la configuration de la base de données depuis un fichier externe
require 'config.php';

try {
    // Créer une nouvelle instance de PDO avec les paramètres de connexion
    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8;', DB_USER, DB_PASS);

    // Configurer PDO pour lancer des exceptions en cas d'erreurs
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connexion réussie
    // echo "Connexion réussie à la base de données.";

} catch (PDOException $e) {
    // Afficher l'erreur de connexion
    die('Erreur de connexion : ' . $e->getMessage());
}