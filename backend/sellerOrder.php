<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// Inclure les fichiers de connexion à la base de données
require_once __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';

// Vérifier si un `seller_id` est fourni
if (isset($_SESSION['user_id'])) {
    // Sanitize `seller_id` pour éviter les injections SQL
    $sellerId = htmlspecialchars($_SESSION['user_id']);

    // Préparer la requête SQL pour sélectionner les commandes par `seller_id`
    $stmt = $conn->prepare('
    SELECT
        o.id AS order_id,
        o.created_at AS order_date,
        o.actions AS actions,
        p.title AS product_title,
        p.price,
        u.name AS user_name,
        u.profil AS user_profile
    FROM orders o
    JOIN products p ON o.product_id = p.id
    JOIN users u ON o.user_id = u.id
    WHERE o.seller_id = ?
');
    // Exécuter la requête avec `seller_id` comme paramètre
    $stmt->execute([$sellerId]);

    // Récupérer tous les résultats
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les commandes
    if ($orders) {

    } else {
        $Message = "Vous n'avez aucune Commande";
    }
} else {
    $Message = "Il y a une erreur !.";
}