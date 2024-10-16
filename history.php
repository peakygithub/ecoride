<?php
// Récupération des informations sur l'utilisateur et ses trajets
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config/db.php';

$user_id = $_SESSION['user_id'];

$query = $pdo->prepare("
    SELECT t.id as trip_id, t.departure, t.arrival, t.date, t.price, r.id as reservation_id 
    FROM reservations r 
    JOIN trips t ON r.trip_id = t.id 
    WHERE r.user_id = ?
");
$query->execute([$user_id]);
$reservations = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des réservations - EcoRide</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <h2>Historique de vos réservations</h2>
        <ul>
            <?php foreach ($reservations as $reservation): ?>
                <li>
                    <?php echo $reservation['departure']; ?> -> <?php echo $reservation['arrival']; ?> | 
                    <?php echo $reservation['date']; ?> | <?php echo $reservation['price']; ?>€
                    <!-- Formulaire pour laisser un avis -->
                    <form action="add_review.php" method="post">
                        <input type="hidden" name="trip_id" value="<?php echo $reservation['trip_id']; ?>">
                        <label for="rating">Note :</label>
                        <select name="rating" id="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label for="comment">Commentaire :</label>
                        <textarea name="comment" id="comment"></textarea>
                        <button type="submit">Envoyer</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

    <?php include 'templates/footer.php'; ?>
</body>
</html>
