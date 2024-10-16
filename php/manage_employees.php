<?php
session_start();
$is_admin = true;

if (!$is_admin) {
    echo "Accès réservé aux administrateurs.";
    exit();
}

include '../php/config/db.php';

// Récupération des employés et des utilisateurs
$query_users = $pdo->query("SELECT id, name, email FROM users WHERE role = 'user'");
$query_employees = $pdo->query("SELECT id, name, email FROM users WHERE role = 'employee'");
$users = $query_users->fetchAll();
$employees = $query_employees->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les employés - EcoRide</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../templates/header.php'; ?>

    <main>
        <h2>Gestion des employés</h2>
        
        <h3>Promouvoir des utilisateurs</h3>
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
                        <form action="promote_employee.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit">Promouvoir en employé</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Liste des employés</h3>
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
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee['id']; ?></td>
                    <td><?php echo $employee['name']; ?></td>
                    <td><?php echo $employee['email']; ?></td>
                    <td>
                        <form action="demote_employee.php" method="post">
                            <input type="hidden" name="employee_id" value="<?php echo $employee['id']; ?>">
                            <button type="submit">Rétrograder en utilisateur</button>
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
