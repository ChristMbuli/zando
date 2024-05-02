<?php
session_start();

if (isset($_POST['sauvegarder'])) {
    if (
        !empty($_POST['adresse']) && !empty($_POST['longitude']) && !empty($_POST['latitude']) &&
        !empty($_FILES['profil']['name'])
    )
        ;

    $adresse = htmlspecialchars($_POST['adresse']);
    $longitude = htmlspecialchars($_POST['longitude']);
    $latitude = htmlspecialchars($_POST['latitude']);

    $userId = $_SESSION['user_id'];

    // Vérifier si $_SESSION['user_id'] existe existe déjà dans la base de données
    $stmt_check = $conn->prepare('SELECT COUNT(*) FROM users WHERE id = ?');
    $stmt_check->execute([$userId]);
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {
        $msgError = "Vos données sont incorrect !";
    } else {
        // Générer un nom de profil unique basé sur le timestamp et un nombre aléatoire
        $image_extension = pathinfo($_FILES['profil']['name'], PATHINFO_EXTENSION);
        $image_name = time() . rand(1000, 9999) . '.' . $image_extension;
        $picture_path = 'assets/images/' . $image_name;

        // Déplacer le profil téléchargée dans le répertoire cible
        if (move_uploaded_file($_FILES['profil']['tmp_name'], $picture_path)) {
            // Préparer et exécuter la requête SQL pour mettre à jours les données dans la base de données
            $stmt_insert = $conn->prepare('UPDATE users SET profil = ? AND adresse = ? AND log = ? AND lat = ? WHERE id = ? ');

            // Lier les paramètres à la requête préparée
            $stmt_insert->bindValue(1, $picture_path, PDO::PARAM_STR);
            $stmt_insert->bindValue(2, $adresse, PDO::PARAM_STR);
            $stmt_insert->bindValue(3, $longitude, PDO::PARAM_STR);
            $stmt_insert->bindValue(5, $latitude, PDO::PARAM_STR);
            $stmt_insert->bindValue(6, $userId, PDO::PARAM_STR);



            // Exécuter la requête préparée
            if ($stmt_insert->execute()) {
                $SuccessMsg = "Données mis à jours avec succes";

            } else {
                $msgError = "Une erreur s'est produite lors de la mise à jours";
            }

            // Fermer la requête préparée
            $stmt_insert->closeCursor();
        } else {
            $msgError = "Échec du téléchargement du profil.";
        }
    }

} else {
    $msgError = "Veuillez remplir tous les champs.";
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte de la RDC</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <style>
    #map {
        height: 500px;
        width: 50%;
    }

    #coordinates {
        margin-top: 10px;
        font-size: 14px;
    }
    </style>
</head>

<body>
    <h1>ajouter vos informations</h1>
    <div id="map"></div>
    <div id="coordinates">Cliquez sur la carte pour voir les coordonnées</div>

    <form method="post">
        <input type="file" name="profil" placeholder="photo profil"><br>
        <input type="text" name="adresse" placeholder="adresse"><br>
        <input type="text" name="logitude" placeholder="longitude"><br>
        <input type="text" name="latitude" placeholder="latitude"><br>

        <button type="submit" name="sauvegarder">Sauvegarder</button>
    </form>



    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script>
    var map = L.map('map').setView([-2.981434, 23.822889], 5);

    var mapLink = "<a href='http://openstreetmap.org'>OpenStreetMap</a>";
    L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
        attribution: "Leaflet &copy; " + mapLink + ", contribution",
        maxZoom: 18,
    }).addTo(map);

    map.on("click", function(e) {
        // Afficher la latitude et la longitude dans la console et dans l'élément avec l'ID "coordinates"
        console.log("Latitude: " + e.latlng.lat + ", Longitude: " + e.latlng.lng);
        document.getElementById("coordinates").innerHTML = "Latitude: " + e.latlng.lat + ", Longitude: " + e
            .latlng.lng;

        // Vous pouvez ajouter ici d'autres fonctionnalités liées au clic, par exemple, ajouter un marqueur.
        L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
    });
    </script>
</body>

</html>