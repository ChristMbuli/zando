<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ('../backend/updateSeller.php');
include ('../backend/security2.php');


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zando-Commerce</title>
    <script src="https://kit.fontawesome.com/e147eaff6b.js" crossorigin="anonymous"></script>
    <!-- Favicon-->
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <style>
    #map {
        height: 300px;
        width: 100%;
    }

    .view {
        margin-top: 10px;
        width: 500px;
        height: 350px;
    }

    #coordinates {
        margin-top: 10px;
        font-size: 14px;
    }
    </style>
</head>

<body>
    <?php include ('./partials/navbar.php') ?>

    <section class=" text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Ajouter votre localisation</h1>
            </div>
        </div>
    </section>

    <section class="container d-flex justify-content-around align-content-lg-around mt-5">
        <div class="container mb-4 bg-body-tertiary rounded-3 view">
            <div class="container-fluid ">
                <div id="map"></div>
            </div>
        </div>
        <div class="">
            <?php if (isset($msgError)) { ?>
            <p style="color:red"><?= $msgError ?></p>
            <?php } elseif (isset($successMsg)) { ?>
            <p style="color:green"><?= $successMsg ?></p>
            <?php } ?>
            <div id="coordinates" style="display: none;">Cliquez sur la carte pour voir les coordonnées</div>
            <form method="post" enctype="multipart/form-data">
                <input class="form-control" type="text" name="adresse" id="adresse"
                    value="<?php echo htmlspecialchars($adresse) ?>" placeholder="Adresse" required><br>
                <input class="form-control" type="text" name="longitude" id="longitude" placeholder="Longitude"
                    value="<?php echo htmlspecialchars(@$longitude); ?>" required><br>
                <input class="form-control" type="text" name="latitude" id="latitude" placeholder="Latitude"
                    value="<?php echo htmlspecialchars(@$latitude); ?>" required><br>

                <button class="btn btn-primary" type="submit" name="sauvegarder">Sauvegarder</button>
            </form>
        </div>
    </section>






    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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

        // Mettre à jour les champs d'entrée de longitude et latitude
        document.getElementById("longitude").value = e.latlng.lng;
        document.getElementById("latitude").value = e.latlng.lat;

        // Ajouter un marqueur à l'emplacement cliqué
        L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);

        // Effectuer la requête de géocodage inverse pour obtenir l'adresse
        getAddressFromLatLng(e.latlng.lat, e.latlng.lng);
    });

    function getAddressFromLatLng(lat, lng) {
        var url =
            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data && data.address) {
                    // Supprimer "République démocratique du Congo" de l'adresse
                    var address = data.display_name.replace(/République démocratique du Congo/g, '');
                    // Mettre à jour la valeur de l'input 'adresse' avec l'adresse récupérée
                    document.getElementById("adresse").value = address.trim();
                    console.log("Adresse: " + address.trim());
                } else {
                    console.log("Aucune adresse trouvée pour ces coordonnées.");
                }
            })
            .catch(error => console.error("Erreur lors de la récupération de l'adresse:", error));
    }
    </script>




</body>

</html>