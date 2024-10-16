<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covoiturages disponibles - EcoRide</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>
    <?php
session_start();
$departure = isset($_GET['departure']) ? htmlspecialchars($_GET['departure']) : '';
$arrival = isset($_GET['arrival']) ? htmlspecialchars($_GET['arrival']) : '';
$date = isset($_GET['date']) ? htmlspecialchars($_GET['date']) : '';
?>

<main>
    <h2>Covoiturages disponibles</h2>
    <section>
        <p>Résultats pour le trajet : <strong><?php echo $departure; ?></strong> vers <strong><?php echo $arrival; ?></strong> le <strong><?php echo $date; ?></strong></p>

        <ul>
            <!-- Exemples de trajets -->
            <li>Trajet 1 : <?php echo $departure; ?> -> <?php echo $arrival; ?> | 20€ | 2 places disponibles
                <?php if (isset($_SESSION['user_id'])): ?>
                    <form action="reserve.php" method="post">
                        <input type="hidden" name="trip_id" value="1">
                        <button type="submit">Réserver</button>
                    </form>
                <?php else: ?>
                    <p><a href="login.php">Connectez-vous</a> pour réserver</p>
                <?php endif; ?>
            </li>
            <!-- Autres trajets -->
        </ul>
    </section>
</main>


    <?php include 'templates/footer.php'; ?>
</body>
</html>
