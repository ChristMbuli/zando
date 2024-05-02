<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Inclure le fichier de connexion à la base de données
$route_db = __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'db_connect.php';
include $route_db;
// et effectuer une jointure avec la table Categories pour obtenir le nom de la catégorie
$query = $conn->prepare('SELECT p.id, p.title, p.description, p.price, p.image, c.title as category_name 
          FROM products p
          JOIN categories c ON p.category = c.id
          ORDER BY RAND()');

$query->execute();