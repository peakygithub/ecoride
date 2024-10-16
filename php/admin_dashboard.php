<?php
session_start();
// Simuler une vérification du rôle administrateur
$is_admin = true; // Cela devrait être vérifié dans la base de données

if (!$is_admin) {
    echo "Accès réservé aux administrateurs.";
    exit();
}

include 'config/db.php';

// Récupérer des statistiques simples
$query_users = $pdo->query("SELECT COUNT(*) as total_users FROM users");
$total_users = $query_users->fetchColumn();

$query_trips = $pdo->query("SELECT COUNT(*) as total_trips FROM trips");
$total_trips = $query_trips->fetchColumn();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord administrateur - EcoRide</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>

    <main>
        <h2>Tableau de bord administrateur</h2>
        <p>Total des utilisateurs : <?php echo $total_users; ?></p>
        <p>Total des trajets : <?php echo $total_trips; ?></p>

        <h3>Gestion des utilisateurs et employés</h3>
        <ul>
            <li><a href="manage_users.php">Gérer les utilisateurs</a></li>
            <li><a href="manage_employees.php">Gérer les employés</a></li>
        </ul>
    </main>

    <?php include 'templates/footer.php'; ?>
</body>
</html>
