<?php
session_start();
// Simuler une vérification de rôle employé
$is_employee = true; // Cela devrait être vérifié dans la base de données

if (!$is_employee) {
    echo "Accès réservé aux employés.";
    exit();
}

include 'config/db.php';

// Récupérer les avis en attente de validation
$query = $pdo->prepare("SELECT r.id, r.trip_id, r.user_id, r.rating, r.comment, u.name, t.departure, t.arrival 
                        FROM reviews r 
                        JOIN users u ON r.user_id = u.id 
                        JOIN trips t ON r.trip_id = t.id 
                        WHERE r.status = 'pending'");
$query->execute();
$reviews = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des avis - EcoRide</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <h2>Gestion des avis</h2>
        <ul>
            <?php foreach ($reviews as $review): ?>
                <li>
                    <p>Trajet : <?php echo $review['departure']; ?> -> <?php echo $review['arrival']; ?></p>
                    <p>Utilisateur : <?php echo $review['name']; ?></p>
                    <p>Note : <?php echo $review['rating']; ?></p>
                    <p>Commentaire : <?php echo $review['comment']; ?></p>
                    <form action="process_review.php" method="post">
                        <input type="hidden" name="review_id" value="<?php echo $review['id']; ?>">
                        <button type="submit" name="action" value="approve">Approuver</button>
                        <button type="submit" name="action" value="reject">Rejeter</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

    <?php include 'templates/footer.php'; ?>
</body>
</html>
