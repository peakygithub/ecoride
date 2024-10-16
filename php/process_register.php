<?php
// Connexion à la base de données
include 'config/db.php';

// Vérification des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        // Hachage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Préparation de la requête d'insertion
        $query = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $query->execute([$name, $email, $hashed_password]);

        // Redirection vers la page de connexion
        header("Location: login.php");
        exit();
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}
?>
