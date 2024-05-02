<?php

// Vérifier les données POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Assurez-vous que l'ID du produit est fourni
    $productId = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_NUMBER_INT);

    if ($productId) {
        // Requête SQL pour supprimer l'article du panier de l'utilisateur
        $query = 'DELETE FROM cards WHERE id_user = ? AND id_product = ?';
        $stmt = $conn->prepare($query);
        $stmt->execute([$userId, $productId]);

        // Rediriger vers la page du panier après la suppression
        header('Location: my_cart.php');
        exit();
    }
}

// Si la méthode de requête n'est pas POST ou si les données ne sont pas correctement fournies, rediriger ou afficher un message
die("Requête invalide.");