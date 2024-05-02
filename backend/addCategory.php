<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Inclure les fichiers de connexion à la base de données et la fonction de génération d'ID
//$dbPath = __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
$generatePath = __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'function' . DIRECTORY_SEPARATOR . 'generate_id.php';

// Inclure les fichiers
//include $dbPath;
include $generatePath;

if (isset($_POST['add'])) {
    // Vérifier que tous les champs requis sont remplis
    if (!empty($_POST['title']) && !empty($_FILES['image']['name'])) {
        // Échapper et valider les entrées utilisateur
        $title = htmlspecialchars($_POST['title']);
        $categoryId = generateUniqueId();

        // Vérifier si la catégorie existe déjà dans la base de données
        $stmt_check = $conn->prepare('SELECT COUNT(*) FROM categories WHERE title = ?');
        $stmt_check->execute([$title]);
        $count = $stmt_check->fetchColumn();

        if ($count > 0) {
            $msgError = "La catégorie avec le nom '$title' existe déjà.";
        } else {
            // Générer un nom d'image unique basé sur le timestamp et un nombre aléatoire
            $image_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $image_name = time() . rand(1000, 9999) . '.' . $image_extension;

            // Construire le chemin absolu du répertoire cible
            $baseDir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images';
            $picture_path = $baseDir . DIRECTORY_SEPARATOR . $image_name;

            // Vérifier si le répertoire cible existe, sinon le créer
            if (!file_exists($baseDir)) {
                mkdir($baseDir, 0777, true);
            }

            // Déplacer l'image téléchargée dans le répertoire cible
            if (move_uploaded_file($_FILES['image']['tmp_name'], $picture_path)) {
                // Préparer et exécuter la requête SQL pour insérer les données dans la base de données
                $stmt_insert = $conn->prepare('INSERT INTO categories (id, title, images) VALUES (?, ?, ?)');

                // Lier les paramètres à la requête préparée
                $stmt_insert->bindValue(1, $categoryId, PDO::PARAM_STR);
                $stmt_insert->bindValue(2, $title, PDO::PARAM_STR);
                $stmt_insert->bindValue(3, 'assets/images/' . $image_name, PDO::PARAM_STR);

                // Exécuter la requête préparée
                if ($stmt_insert->execute()) {
                    $SuccessMsg = "Catégorie '$title' enregistrée avec succès.";

                } else {
                    $msgError = "Une erreur s'est produite lors de l'enregistrement de la catégorie.";
                }

                // Fermer la requête préparée
                $stmt_insert->closeCursor();
            } else {
                $msgError = "Échec du téléchargement de l'image.";
            }
        }
    } else {
        $msgError = "Veuillez remplir tous les champs.";
    }
}
