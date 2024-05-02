<?php
// Inclure le fichier de connexion à la base de données
$route_db = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
include $route_db;

try {
    // Préparer la requête pour récupérer toutes les catégories
    $stmt = $conn->prepare('SELECT id, title, image FROM categories');
    
    // Exécuter la requête
    $stmt->execute();

    // Récupérer tous les résultats
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fermer la requête préparée
    $stmt->closeCursor();
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des catégories</title>
    <!-- Ajouter des styles de base pour mieux présenter la liste -->
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>

    <h1>Liste des catégories</h1>

    <!-- Vérifier si des catégories ont été récupérées -->
    <?php if (!empty($categories)) : ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <!-- Parcourir toutes les catégories et les afficher -->
            <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo htmlspecialchars($category['id']); ?></td>
                <td><?php echo htmlspecialchars($category['title']); ?></td>
                <td><img src="<?php echo htmlspecialchars($category['image']); ?>"
                        alt="<?php echo htmlspecialchars($category['title']); ?>" style="width: 100px;"></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
    <p>Aucune catégorie disponible.</p>
    <?php endif; ?>

</body>

</html>