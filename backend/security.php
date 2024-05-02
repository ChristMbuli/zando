<?php
session_start();


if (!isset($_SESSION['user'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers login.php
    header('Location:./auth/signin.php');
    exit; // Assurez-vous d'ajouter exit après redirection
} else {
    // Récupérer l'ID de l'utilisateur actuellement connecté
    $userId = $_SESSION['user_id'];

    // Préparer la requête pour vérifier l'état 'online' de l'utilisateur
    $stmt = $conn->prepare('SELECT online FROM users WHERE id = ?');
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur est en ligne (online == 1)
    if ($user && $user['online'] == 1) {
        // Si l'utilisateur est en ligne, ne rien faire, permettre l'accès à la page
    } else {
        // Si l'utilisateur n'est pas en ligne (online == 0), rediriger vers login.php
        header('Location: ./auth/signin.php');
        exit; // Assurez-vous d'ajouter exit après redirection
    }
}