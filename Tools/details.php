<?php require ('./backend/singleProduct.php') ?>
<?php include ('./components/head.php') ?>
<?php include ('./components/navbar.php') ?>

<!-- Section-->
<section class="">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="./<?= $imagePath ?>" height="500" width="100" alt="..." />
            </div>
            <div class="col-md-6">
                <div class="">
                    <div class="d-flex align-items-center mt-lg-5 mb-4">
                        <img class="img-fluid rounded-circle" src="./<?= $sellerProfile ?>" width="70" height="50"
                            alt="..." />
                        <div class="ms-3">
                            <div class="fw-bold"><?= $sellerName ?></div>
                            <div class="text-muted"><?= $adresseSeller ?></div>
                        </div>
                    </div>
                </div>
                <div class="small mb-1 text-success"><?= $stock ?></div>

                <h5 class="display-5 fw-bolder"><?= $title ?></h5>
                <div class="fs-5 mb-5">
                    <?php $r = $price + 15 ?>
                    <span class="text-decoration-line-through">$ <?= $r ?></span>
                    <span>$ <?= $price ?></span>
                </div>
                <p class="lead"><?= $description ?></p>
                <div class="d-flex gap-3">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                        style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        Commander
                    </button>
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Ajouter au panier
                    </button>

                </div>
            </div>
        </div>
    </div>
</section>
<main>
    <div id="map" style="height: 300px; width: 100%;"></div>
</main>

<?php include ('./components/footer.php') ?>

<script>
// Créer la carte et la centrer sur une position par défaut
var map = L.map('map').setView([-2.981434, 23.822889], 5);

// Récupération des données de l'utilisateur
const StoreData = <?php echo $infosDataJson; ?>;

// Ajouter les tuiles de la carte à partir d'OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 18,
}).addTo(map);

// Vérifiez si les données de l'utilisateur sont présentes
if (StoreData && StoreData.length > 0) {
    // Extraire les données de l'utilisateur
    const user = StoreData[0]; // Prendre la première entrée (puisque c'est un tableau)

    // Convertir les coordonnées en nombres flottants
    const lat = parseFloat(user.lat);
    const log = parseFloat(user.log);

    // Créer une icône personnalisée pour l'utilisateur
    var userIcon = L.icon({
        iconUrl: user.profil,
        iconSize: [50, 50], // Taille de l'icône personnalisée
    });

    // Créer un marqueur avec les coordonnées de l'utilisateur et l'icône personnalisée
    var marker = L.marker([lat, log], {
        icon: userIcon
    }).addTo(map);

    // Ajouter une info-bulle au marqueur
    marker.bindPopup(`
        <p><img src="${user.profil}" alt="Image de profil" width="50" /></p>
        <strong>Vendeur:</strong> ${user.seller_name}<br>
        <strong>Adresse:</strong> ${user.adresse}<br>
    
    `);
} else {
    console.error("Aucune donnée utilisateur trouvée dans StoreData.");
}
</script>