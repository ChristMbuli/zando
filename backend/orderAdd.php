<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// Inclure les fichiers de connexion à la base de données et la fonction de génération d'ID
require_once __DIR__ . DIRECTORY_SEPARATOR . 'function' . DIRECTORY_SEPARATOR . 'generate_id.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productid'], $_POST['sellerid'])) {


    $userId = $_SESSION['user_id'];

    // Sanitize les entrées utilisateur
    $productId = htmlspecialchars($_POST['productid']);
    $sellerId = htmlspecialchars($_POST['sellerid']);

    if ($productId && $sellerId) {
        // Vérification de la colonne actions
        $stmtCheck = $conn->prepare('SELECT actions FROM orders WHERE user_id = ? AND product_id = ?');
        $stmtCheck->execute([$userId, $productId]);
        $row = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        // Vérifier si la valeur de 'actions' est NULL
        if ($row && is_null($row['actions'])) {
            $alert = 'Votre commande est en cours de traitement.';
        } else {
            $date = date("Y-m-d H:i:s");
            $orderId = generateUniqueId();

            // Préparation et exécution de l'insertion dans la base de données
            $stmt = $conn->prepare('INSERT INTO orders (id, user_id, product_id, seller_id, created_at) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$orderId, $userId, $productId, $sellerId, $date]);

            // Rediriger vers cart.php avec un message de succès
            $alert = "Commande effectuée avec success !";
        }
    }
}