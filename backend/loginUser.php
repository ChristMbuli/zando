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

if (isset($_POST['login'])) {

    if (!empty($_POST['email']) and !empty($_POST['mdp'])) {
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);

        // Préparer la requête pour vérifier les identifiants de l'utilisateur
        $stmt = $conn->prepare('SELECT id, name, profil, phone, email, adresse, password, role, online FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($mdp, $user['password'])) {
            // Vérifier si l'utilisateur est déjà en ligne
            if ($user['online'] == 1) {
                $msgErrors = "Vous êtes déjà connecté.";
            } else {
                // Stocker les informations de l'utilisateur dans la session
                $_SESSION['user'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_profil'] = $user['profil'];
                $_SESSION['user_number'] = $user['phone'];
                $_SESSION['localisation'] = $_SESSION['adresse'];
                $_SESSION['user_email'] = $user['email'];

                // Mettre à jour la colonne 'online' à 1 pour cet utilisateur
                $stmt_update = $conn->prepare('UPDATE users SET online = 1 WHERE id = ?');
                $stmt_update->execute([$user['id']]);

                // Vérifier le rôle de l'utilisateur et l'adresse
                if ($user['role'] == 'seller') {
                    // Rediriger le vendeur selon l'adresse définie
                    if (!empty($user['adresse'])) {
                        header('Location: ../private/index.php');
                    } else {
                        header('Location: ../private/infos.php');
                    }
                } else {
                    // Vérifiez si une URL de redirection est stockée dans localStorage
                    echo '<script>
                        const redirectUrl = localStorage.getItem("redirectUrl");
                        if (redirectUrl) {
                            // Rediriger vers l\'URL stockée
                            window.location.href = redirectUrl;
                            // Effacer l\'URL du stockage local après redirection
                            localStorage.removeItem("redirectUrl");
                        } else {
                            // Rediriger vers "index.php" sinon
                            window.location.href = "../index.php";
                        }
                    </script>';
                    exit;
                }


            }
        } else {
            $msgError = "Email ou mot de passe incorrect.";
        }
    } else {
        $msgError = "Completez tous les champs...";
    }
}