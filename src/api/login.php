<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        header("Location: ../pages/login.php?error=" . urlencode("Please fill in all fields."));
        exit;
    }

    try {
        // Retrieve user by email
        $stmt = $pdo->prepare("SELECT user_id, username, password_hash FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verify password against stored hash
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];

            header("Location: ../pages/dashboard.php");
            exit;
        } else {
            header("Location: ../pages/login.php?error=" . urlencode("Invalid email or password."));
            exit;
        }

    } catch (PDOException $e) {
        header("Location: ../pages/login.php?error=" . urlencode("Database error: " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: ../pages/login.php");
    exit;
}
?>