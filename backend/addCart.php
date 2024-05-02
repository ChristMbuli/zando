<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure les fichiers de connexion à la base de données et la fonction de génération d'ID
$dbPath = __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
$generatePath = __DIR__ . DIRECTORY_SEPARATOR . 'function' . DIRECTORY_SEPARATOR . 'generate_id.php';

// Inclure les fichiers
require_once $dbPath;
require_once $generatePath;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart'])) {
    if (!empty($_POST['productid']) && !empty($_POST['sellerid'])) {
        // Assurez-vous que l'utilisateur est connecté
        $userId2 = $_SESSION['user_id'];

        // Utilisation de htmlspecialchars et validation des entrées
        $productId2 = htmlspecialchars($_POST['productid']);
        $sellerId2 = htmlspecialchars($_POST['sellerid']);

        if ($productId2 && $sellerId2) {
            $date = date("Y-m-d H:i:s");
            $cartId = generateUniqueId();

            // Vérifiez si le produit est déjà dans le panier
            $req = $conn->prepare('SELECT * FROM cards WHERE id_user = ? AND id_product = ?');
            $req->execute([$userId2, $productId2]);

            if ($req->rowCount() > 0) {
                $errorMsg = "Cet article est déjà votre panier";
            } else {
                // Insertion dans la table carts
                $stm = $conn->prepare('INSERT INTO cards (id, id_user, id_product, sellerid, created_at) VALUES (?, ?, ?, ?, ?)');
                $stm->execute([$cartId, $userId2, $productId2, $sellerId2, $date]);

                // Rediriger vers cart.php après l'ajout réussi
                header('Location: my_cart.php');
                exit();
            }
        }
    }
}