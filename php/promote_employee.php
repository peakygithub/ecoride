<?php
session_start();
$is_admin = true;

if (!$is_admin) {
    header("Location: login.php");
    exit();
}

include '../php/config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {
    $user_id = intval($_POST['user_id']);

    // Promouvoir l'utilisateur en employé
    $query = $pdo->prepare("UPDATE users SET role = 'employee' WHERE id = ?");
    $query->execute([$user_id]);

    header("Location: manage_employees.php");
    exit();
}
?>
