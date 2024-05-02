<?php
// Inclure le fichier de configuration de la base de données
$dbPath = __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
include $dbPath;

try {
    if (isset($_POST['send'])) {
        // Vérifiez que les champs obligatoires ne sont pas vides
        if (!empty($_POST['pseudo']) && !empty($_POST['message'])) {

            $pseudo = htmlspecialchars($_POST['pseudo']);
            $message = htmlspecialchars($_POST['message']);
            $date = date("Y-m-d H:i:s");

            // Préparez et exécutez la requête d'insertion
            $insert = $conn->prepare('INSERT INTO feedbacks (pseudo, message, created_at) VALUES (?, ?, ?)');
            $insert->bindParam(1, $pseudo, PDO::PARAM_STR);
            $insert->bindParam(2, $message, PDO::PARAM_STR);
            $insert->bindParam(3, $date, PDO::PARAM_STR);

            if ($insert->execute()) {
                $successMsg = "Merci pour votre commentaire !";

            } else {
                $msgError = "Une erreur s'est produite lors de l'enregistrement de votre commentaire.";
            }

        } else {
            $msgError = "Veuillez remplir tous les champs. vous êtes vraiment sérieux(se) ! 😳";
        }
    }
} catch (Exception $e) {
    // Afficher un message d'erreur en cas d'exception
    $msgError = "Une erreur s'est produite : " . $e->getMessage();
}