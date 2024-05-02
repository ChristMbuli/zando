<?php
// Inclure les fichiers de connexion à la base de données
$dbPath = __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
include $dbPath;


session_start();
// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user']) && $_SESSION['user']) {
    // Récupérer l'ID de l'utilisateur connecté
    $userId = $_SESSION['user_id'];

    // Préparer la requête pour obtenir les articles de l'utilisateur connecté
    $stmt = $conn->prepare('SELECT id, title, price, image FROM products WHERE storeid = ?');
    $stmt->execute([$userId]);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier s'il y a des articles
    if (count($articles) > 0) {
        // Parcourir les articles et les afficher

    } else {
        // Message si aucun article trouvé
        $Message = "Vous n'avez aucun article";
    }
} else {
    // Rediriger l'utilisateur s'il n'est pas connecté
    header('Location: ../auth/signin.php');
    exit;
}