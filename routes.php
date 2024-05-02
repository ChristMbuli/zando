<?php

// index.php

function handleRoute($url)
{
    // Définir les routes et leurs paramètres attendus
    $routes = [
        'home' => ['index.php', []],
        'product' => ['single.php', ['id']],
        'signin' => ['auth/signin.php', []],
    ];

    // Parser l'URL pour obtenir le chemin
    $path = parse_url($url, PHP_URL_PATH);
    $path = substr($path, 1); // Supprimer le slash initial si présent

    // Diviser le chemin en segments
    $segments = explode('/', $path);

    // Extraire le nom de la route et les paramètres
    $routeName = $segments[0];
    $params = array_slice($segments, 1);

    // Vérifier si la route existe
    if (array_key_exists($routeName, $routes)) {
        // Charger le fichier spécifié avec les paramètres
        $file = $routes[$routeName][0];
        $expectedParams = $routes[$routeName][1];

        // Vérifier si tous les paramètres attendus sont présents
        $missingParams = array_diff($expectedParams, $params);
        if (!empty($missingParams)) {
            // Si des paramètres manquent, rediriger vers index.php
            header('Location: /?page=home');
            exit;
        }

        // Charger le fichier avec les paramètres
        require_once $file;
    } else {
        // Si la route n'existe pas, rediriger vers index.php
        header('Location: /?page=home');
        exit;
    }
}

// Récupérer l'URL de la requête
$url = $_SERVER['REQUEST_URI'];

// Appeler la fonction de routage avec l'URL
handleRoute($url);