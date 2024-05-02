<?php
// Inclure les fichiers de connexion à la base de données
$dbPath = __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
require_once $dbPath;

//-------------------------------------------------------------------------

$cardsHtml = "";
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header('Location:./auth/signin.php');
}

// Récupérer l'identifiant de l'utilisateur connecté
$userId = $_SESSION['user_id'];

// Requête SQL pour récupérer les produits du panier de l'utilisateur connecté
$query = 'SELECT cards.id, products.id as productid, products.title, products.image, products.price
          FROM cards
          INNER JOIN products ON cards.id_product = products.id
          WHERE cards.id_user =?';

$stmt = $conn->prepare($query);
$stmt->execute([$userId]);

// Vérification des erreurs SQL
if ($stmt->errorCode() != '00000') {
    echo "Erreur SQL: " . $stmt->errorInfo()[2];
    exit;
}

if ($stmt->rowCount() > 0) {
    // Affichage des produits du panier
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $cardsHtml .= '
        <div class="row gy-3 mb-4">
            <div class="col-lg-5">
                <div class="me-lg-5">
                    <div class="d-flex">
                        <img src="./' . htmlspecialchars($row['image']) . '"
                            class="border rounded me-3" style="width: 96px; height: 96px;" />
                        <div class="">
                            <a href="single.php?id=' . htmlspecialchars($row['productid']) . '" class="nav-link">' . htmlspecialchars($row['title']) . '</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                <div class="">
                    <text class="h6">$ ' . htmlspecialchars($row['price']) . '</text> <br />
                    <small class="text-muted text-nowrap"> $ ' . htmlspecialchars($row['price']) . ' </small>
                </div>
            </div>
            <div
                class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                <div class="float-md-end">
                 
                <form method="post" >
                <input type="hidden" name="delete" value="1">
                <input type="hidden" name="product_id" value="' . htmlspecialchars($row['productid']) . '">
                    <button type="submit" class="btn btn-light border text-danger icon-hover-danger"><i class="fa-solid fa-xmark"></i></button>
                </form>                </div>
            </div>
        </div>';

    }
} else {
    $alert = 'Votre panier est vide.';
}

//Supprimer un article

// Traiter les données POST pour la suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) && isset($_POST['product_id'])) {
    // Valider l'ID du produit reçu
    $productId = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_STRING);

    // Si l'ID du produit est valide
    if ($productId !== false && $productId !== null) {
        // Requête SQL pour supprimer l'article du panier de l'utilisateur
        $query = 'DELETE FROM cards WHERE id_user = ? AND id_product = ?';
        $stmt = $conn->prepare($query);
        $stmt->execute([$userId, $productId]);

        // Vérifier s'il y a eu une suppression effective
        if ($stmt->rowCount() > 0) {
            // Suppression réussie
            // Rediriger vers la page du panier après la suppression
            header('Location: my_cart.php');
            exit();
        } else {
            // Aucun article n'a été supprimé
            $msg = "Aucun article à supprimer.";
        }
    } else {
        $msg = "L'ID du produit n'est pas valide.";
    }
} else {
    // Si les données POST attendues ne sont pas présentes, affichez un message ou redirigez.
    $msg = "Requête invalide.";
}