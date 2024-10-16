<?php
// Connexion à la base de données
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Vérification de l'utilisateur dans la base de données
    $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Démarrage de la session et enregistrement des informations utilisateur
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        // Redirection vers la page des covoiturages
        header("Location: covoiturages.php");
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>
