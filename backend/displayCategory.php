<?php
// Inclure le fichier de connexion à la base de données
$route_db = __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
include $route_db;

// Préparer la requête pour récupérer toutes les catégories
$req = $conn->prepare('SELECT id, title FROM categories');
$req->execute();

$reqs = $conn->prepare('SELECT id, title FROM categories');
$reqs->execute();