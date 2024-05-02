<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css">
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>


    <div id="map" height: 80vh width: 100%;></div>


    <script>
    // Créer la carte et la centrer sur une position par défaut
    var map = L.map('map').setView([-2.981434, 23.822889], 5);

    // Récupération des données de l'utilisateur (coordonnées, photo, et nom)
    const StoreData = <?php echo $infosDataJson; ?>;

    // Ajouter les tuiles de la carte à partir d'OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 18,
    }).addTo(map);

    // Créer une icône personnalisée pour l'utilisateur
    var userIcon = L.icon({
        iconUrl: StoreData.profil,
        iconSize: [50, 50], // Taille de l'icône personnalisée
    });

    // Créer un marqueur avec les coordonnées de l'utilisateur et l'icône personnalisée
    var marker = L.marker([StoreData.lat, StoreData.log], {
        icon: userIcon
    }).addTo(map);

    // Ajouter une info-bulle au marqueur
    marker.bindPopup(`
        <p><img src="${StoreData.profil}" alt="Image de profil" width="50" /></p>
        <strong>Vendeur:</strong> ${StoreData.seller_name}<br>
        <strong>Latitude:</strong> ${StoreData.lat}<br>
        <strong>Longitude:</strong> ${StoreData.log}
    `);
    </script>

    </body>

</html>