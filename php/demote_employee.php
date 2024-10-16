<?php
session_start();
$is_admin = true;

if (!$is_admin) {
    header("Location: login.php");
    exit();
}

include '../php/config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['employee_id'])) {
    $employee_id = intval($_POST['employee_id']);

    // Rétrograder l'employé en utilisateur
    $query = $pdo->prepare("UPDATE users SET role = 'user' WHERE id = ?");
    $query->execute([$employee_id]);

    header("Location: manage_employees.php");
    exit();
}
?>
