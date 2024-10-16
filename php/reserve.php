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

    // Insertion de la réservation dans la base de données
    $query = $pdo->prepare("INSERT INTO reservations (user_id, trip_id) VALUES (?, ?)");
    $query->execute([$user_id, $trip_id]);

    echo "Réservation effectuée avec succès !";
    // Redirection vers la page des covoiturages ou confirmation
    header("Location: covoiturages.php");
    exit();
}
?>
