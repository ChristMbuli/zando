<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$generatePath = __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'function' . DIRECTORY_SEPARATOR . 'generate_id.php';
include $generatePath;


if (isset($_POST['add'])) {
    if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['category']) && !empty($_FILES['image']['name']) && !empty($_POST['stock'])) {

        //stocker les informations entrée au formulaire dans les variables
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $price = htmlspecialchars($_POST['price']);
        $category = htmlspecialchars($_POST['category']);
        $stock = htmlspecialchars($_POST['stock']);

        $date = date("Y-m-d H:i:s");
        $productId = generateUniqueId();
        $sellerId = $_SESSION['user_id'];


        // Générer un nom d'image unique basé sur le timestamp et un nombre aléatoire
        //$image_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        //$image_name = time() . rand(1000, 9999) . '.' . $image_extension;
        //$picture_path = 'assets/images/' . $image_name;

        $image_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_name = time() . rand(1000, 9999) . '.' . $image_extension;

        // Construire le chemin absolu du répertoire cible
        $baseDir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images';
        $picture_path = $baseDir . DIRECTORY_SEPARATOR . $image_name;

        if (!file_exists($baseDir)) {
            mkdir($baseDir, 777, true);
        }

        // Déplacer l'image téléchargée dans le répertoire cible
        if (move_uploaded_file($_FILES['image']['tmp_name'], $picture_path)) {
            // Préparer et exécuter la requête SQL pour insérer les données dans la base de données
            $stmt_insert = $conn->prepare('INSERT INTO products (id, title, price, description, image, stock, category, storeid, createdat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');

            $relative_path = 'assets/images/' . $image_name;
            // Lier les paramètres à la requête préparée
            $stmt_insert->bindValue(1, $productId, PDO::PARAM_STR);
            $stmt_insert->bindValue(2, $title, PDO::PARAM_STR);
            $stmt_insert->bindValue(3, $price, PDO::PARAM_STR);
            $stmt_insert->bindValue(4, $description, PDO::PARAM_STR);
            $stmt_insert->bindValue(5, $relative_path, PDO::PARAM_STR);
            $stmt_insert->bindValue(6, $stock, PDO::PARAM_STR);
            $stmt_insert->bindValue(7, $category, PDO::PARAM_STR);
            $stmt_insert->bindValue(8, $sellerId, PDO::PARAM_STR);
            $stmt_insert->bindValue(9, $date, PDO::PARAM_STR);


            // Exécuter la requête préparée
            if ($stmt_insert->execute()) {
                $SuccessMsg = "Article à jouter avec succes !";
            } else {
                $msgError = "Une erreur s'est produite lors de l'ajout d'un article.";
            }

            // Fermer la requête préparée
            $stmt_insert->closeCursor();
        } else {
            $msgError = "Échec du téléchargement de l'image.";
        }

    } else {
        $msgError = "Completez tous les champs";
    }
}