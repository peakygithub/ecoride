<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['trip_id'])) {
    $trip_id = intval($_POST['trip_id']);
    $user_id = $_SESSION['user_id'];
    $rating = intval($_POST['rating']);
    $comment = htmlspecialchars($_POST['comment']);

    // Insertion de l'avis avec le statut "pending"
    $query = $pdo->prepare("INSERT INTO reviews (trip_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
    $query->execute([$trip_id, $user_id, $rating, $comment]);

    echo "Avis envoyé et en attente de validation.";
    header("Location: history.php");
    exit();
}
?>
