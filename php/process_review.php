<?php
session_start();
// Vérification du statut d'employé
$is_employee = true; // Doit être vérifié dans la base de données

if (!$is_employee) {
    header("Location: login.php");
    exit();
}

include 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['review_id']) && isset($_POST['action'])) {
    $review_id = intval($_POST['review_id']);
    $action = $_POST['action'];

    if ($action === 'approve') {
        $query = $pdo->prepare("UPDATE reviews SET status = 'approved' WHERE id = ?");
    } elseif ($action === 'reject') {
        $query = $pdo->prepare("UPDATE reviews SET status = 'rejected' WHERE id = ?");
    }
    $query->execute([$review_id]);

    header("Location: manage_reviews.php");
    exit();
}
?>
