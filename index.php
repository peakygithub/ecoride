<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoRide - Covoiturage écologique</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <header>
        <h1>Bienvenue chez EcoRide</h1>
    </header>

    <main>
        <section>
            <h2>Notre mission</h2>
            <p>EcoRide souhaite réduire l'impact environnemental des déplacements en promouvant le covoiturage écologique.</p>
            <img src="assets/img/ecoride.jpg" alt="EcoRide Covoiturage">
        </section>

        <section>
            <h2>Recherchez un itinéraire</h2>
            <form action="covoiturages.php" method="get">
    <label for="departure">Départ :</label>
    <input type="text" id="departure" name="departure" required>

    <label for="arrival">Arrivée :</label>
    <input type="text" id="arrival" name="arrival" required>

    <label for="date">Date :</label>
    <input type="date" id="date" name="date" required>

    <button type="submit">Rechercher</button>
</form>

        </section>
    </main>

    <footer>
        <p>Contactez-nous à : contact@ecoride.com</p>
        <a href="#">Mentions légales</a>
    </footer>
</body>
</html>
