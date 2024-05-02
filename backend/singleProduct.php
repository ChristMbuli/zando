<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$route_db = __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
include $route_db;

$cardsHtml = "";

// Vérifier si un identifiant de produit a été passé dans l'URL
if (isset($_GET['id'])) {
    // Valider l'identifiant pour s'assurer qu'il s'agit d'une chaîne de caractères
    $productId = htmlspecialchars($_GET['id']);

    // Préparer la requête SQL pour vérifier si le produit existe et obtenir ses détails
    $stmt = $conn->prepare('SELECT p.id, p.title, p.description, p.price, p.image, p.stock,p.storeid,c.title as category_name,
                            c.id as cat_id, u.name as seller_name, u.profil, u.adresse, u.lat, u.log
                            FROM products p
                            JOIN categories c ON p.category = c.id
                            JOIN users u ON p.storeid = u.id
                            WHERE p.id = ?');
    $stmt->bindValue(1, $productId, PDO::PARAM_STR);

    // Exécuter la requête
    $stmt->execute();

    // Vérifier s'il y a un résultat
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $infosData[] = [
            "lat" => htmlspecialchars($row['lat']),
            "log" => htmlspecialchars($row['log']),
            "profil" => htmlspecialchars($row['profil']),
            "adresse" => htmlspecialchars($row['adresse']),
            "seller_name" => htmlspecialchars($row['seller_name'])
        ];

        // Extraire les détails du produit
        $title = htmlspecialchars($row['title']);
        $description = htmlspecialchars($row['description']);
        $price = htmlspecialchars($row['price']);
        $imagePath = htmlspecialchars($row['image']);
        $categoryName = htmlspecialchars($row['category_name']);
        $categoryId = htmlspecialchars($row['cat_id']);
        $stock = htmlspecialchars($row['stock']);
        $storeId = htmlspecialchars($row['storeid']);

        // Extraire les informations du vendeur
        $sellerName = htmlspecialchars($row['seller_name']);
        $sellerProfile = htmlspecialchars($row['profil']);
        $adresseSeller = htmlspecialchars($row['adresse']);
        $latitude = htmlspecialchars($row['lat']);
        $longitude = htmlspecialchars($row['log']);

        $infosDataJson = json_encode($infosData);
        //echo $infosDataJson;

        // Préparer une nouvelle requête SQL pour récupérer tous les produits de la même catégorie
        $stmt2 = $conn->prepare('SELECT p.id as id_product, p.title, p.price, p.image, p.category, c.id
     FROM products p
     JOIN categories c ON p.category = c.id
     WHERE p.category = ? ');
        $stmt2->bindValue(1, $categoryId, PDO::PARAM_STR);
        $stmt2->execute();

        // Exécuter la requête et afficher les résultats
        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            // Afficher les détails de chaque produit de la même catégorie

            $cardsHtml .= ' <div class="d-flex mb-3">
            <a href="single.php?id=' . htmlspecialchars($row2['id_product']) . '" class="me-3" >
                <img src="' . htmlspecialchars($row2['image']) . '" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
            </a>
            <div class="info">
                <a href="#" class="nav-link mb-1">
                ' . htmlspecialchars($row2['title']) . '
                </a>
                <strong class="text-dark">$' . htmlspecialchars($row2['price']) . '</strong>
            </div>
        </div>';
        }


        // Fermer la requête
        $stmt2->closeCursor();



    } else {
        // Afficher un message si le produit n'est pas trouvé
        $msgError = "Le produit demandé n'a pas été trouvé.";
    }

    // Fermer la requête
    $stmt->closeCursor();


} else {
    // Afficher un message si aucun identifiant de produit n'est passé
    $msgError = "Aucun identifiant de produit spécifié.";
}