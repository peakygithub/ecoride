<?php
session_start();
// Vérification du rôle administrateur
$is_admin = true; // Doit être vérifié dans la base de données

if (!$is_admin) {
    echo "Accès réservé aux administrateurs.";
    exit();
}

include '../php/config/db.php';

// Récupération des utilisateurs
$query = $pdo->query("SELECT id, name, email FROM users");
$users = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les utilisateurs - EcoRide</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../templates/header.php'; ?>

    <main>
        <h2>Gestion des utilisateurs</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <form action="delete_user.php" method="post" style="display:inline-block;">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php include '../templates/footer.php'; ?>
</body>
</html>
