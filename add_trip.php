<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Vérifier si l'utilisateur est un chauffeur (à implémenter dans la base de données)
$is_driver = true; // Simuler un statut chauffeur pour l'instant

if (!$is_driver) {
    echo "Vous devez être chauffeur pour ajouter des trajets.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un trajet - EcoRide</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <h2>Ajouter un trajet</h2>
        <form action="process_trip.php" method="post">
            <label for="departure">Ville de départ :</label>
            <input type="text" id="departure" name="departure" required>

            <label for="arrival">Ville d'arrivée :</label>
            <input type="text" id="arrival" name="arrival" required>

            <label for="date">Date du trajet :</label>
            <input type="date" id="date" name="date" required>

            <label for="price">Prix par place (€) :</label>
            <input type="number" id="price" name="price" required>

            <label for="seats">Nombre de places disponibles :</label>
            <input type="number" id="seats" name="seats" required>

            <button type="submit">Ajouter le trajet</button>
        </form>
    </main>

    <?php include 'templates/footer.php'; ?>
</body>
</html>
