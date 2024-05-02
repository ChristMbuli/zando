<?php
// Inclure les fichiers de connexion à la base de données
$dbPath = __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
require_once $dbPath;


// Récupérer l'identifiant de l'utilisateur connecté
$userIdd = @$_SESSION['user_id'];

// Requête SQL pour compter le nombre total d'articles dans le panier de l'utilisateur connecté
$queryy = 'SELECT COUNT(*) AS total_articles FROM cards WHERE id_user = ?';
$stmtt = $conn->prepare($queryy);
$stmtt->execute([$userIdd]);

// Récupérer le résultat
$resultt = $stmtt->fetch(PDO::FETCH_ASSOC);

// Afficher le nombre total d'articles dans le panier
if ($resultt !== false && $resultt['total_articles'] !== null) {
    $totalArticles = (int) $resultt['total_articles'];
    $totalArticles;
} else {
    $msg = 'Votre panier est vide.';
}