<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure les fichiers de connexion à la base de données et la fonction de génération d'ID
$dbPath = __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
$generatePath = __DIR__ . DIRECTORY_SEPARATOR . 'function' . DIRECTORY_SEPARATOR . 'generate_id.php';

// Inclure les fichiers
include $dbPath;
include $generatePath;

if (isset($_POST['register'])) {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['mdp']) && !empty($_POST['role']) && !empty($_FILES['profil']['name'])) {

        // Stocker les données entrées dans les variables
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $role = htmlspecialchars($_POST['role']);
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        $date = date("Y-m-d H:i:s");
        $userId = generateUniqueId();
        $online = 0;

        // Vérifier si l'utilisateur existe déjà dans la base de données
        $stmt_check = $conn->prepare('SELECT COUNT(*) FROM users WHERE name = ? AND phone = ? AND email = ?');
        $stmt_check->execute([$name, $phone, $email]);
        $count = $stmt_check->fetchColumn();

        if ($count > 0) {
            $msgError = "Ses informations existe déjà !";
        } else {
            // Générer un nom de profil unique basé sur le timestamp et un nombre aléatoire
            $image_extension = pathinfo($_FILES['profil']['name'], PATHINFO_EXTENSION);
            $image_name = time() . rand(1000, 9999) . '.' . $image_extension;

            // Construire le chemin absolu du répertoire cible
            $baseDir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images';
            $picture_path = $baseDir . DIRECTORY_SEPARATOR . $image_name;

            // Vérifier si le répertoire cible existe, sinon le créer
            if (!file_exists($baseDir)) {
                mkdir($baseDir, 0777, true);
            }

            // Déplacer le profil téléchargé dans le répertoire cible
            if (move_uploaded_file($_FILES['profil']['tmp_name'], $picture_path)) {
                // Préparer et exécuter la requête SQL pour insérer les données dans la base de données
                $stmt_insert = $conn->prepare('INSERT INTO users (id, name, profil, phone, email, role, online, password, createdat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');

                $stmt_insert->bindValue(1, $userId, PDO::PARAM_STR);
                $stmt_insert->bindValue(2, $name, PDO::PARAM_STR);
                // Utiliser le chemin relatif pour le profil dans la base de données
                $stmt_insert->bindValue(3, 'assets/images/' . $image_name, PDO::PARAM_STR);
                $stmt_insert->bindValue(4, $phone, PDO::PARAM_STR);
                $stmt_insert->bindValue(5, $email, PDO::PARAM_STR);
                $stmt_insert->bindValue(6, $role, PDO::PARAM_STR);
                $stmt_insert->bindValue(7, $online, PDO::PARAM_INT);
                $stmt_insert->bindValue(8, $mdp, PDO::PARAM_STR);
                $stmt_insert->bindValue(9, $date, PDO::PARAM_STR);

                // Exécuter la requête préparée
                if ($stmt_insert->execute()) {
                    header('Location: ./signin.php');
                } else {
                    $msgError = "Une erreur s'est produite lors de l'enregistrement de la catégorie.";
                }

                // Fermer la requête préparée
                $stmt_insert->closeCursor();
            } else {
                $msgError = "Échec du téléchargement du profil.";
            }
        }
    } else {
        $msgError = "Completez tous les champs...";
    }
}