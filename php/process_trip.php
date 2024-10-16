<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $departure = htmlspecialchars($_POST['departure']);
    $arrival = htmlspecialchars($_POST['arrival']);
    $date = $_POST['date'];
    $price = floatval($_POST['price']);
    $seats = intval($_POST['seats']);
    $driver_id = $_SESSION['user_id'];

    // Insertion du trajet dans la base de données
    $query = $pdo->prepare("INSERT INTO trips (driver_id, departure, arrival, date, price, seats) VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([$driver_id, $departure, $arrival, $date, $price, $seats]);

    echo "Trajet ajouté avec succès !";
    header("Location: covoiturages.php");
    exit();
}
?>
