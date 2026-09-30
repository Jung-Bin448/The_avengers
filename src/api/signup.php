<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validate inputs
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: ../pages/signup.php?error=" . urlencode("All fields are required."));
        exit;
    }

    if ($password !== $confirm_password) {
        header("Location: ../pages/signup.php?error=" . urlencode("Passwords do not match."));
        exit;
    }

    try {
        // Check if username or email already exists
        $stmt = $pdo->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        
        if ($stmt->fetch()) {
            header("Location: ../pages/signup.php?error=" . urlencode("Username or Email is already taken."));
            exit;
        }

        // Hash password securely
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Save user to database
        $insertStmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
        $insertStmt->execute([$username, $email, $hashed_password]);

        // Auto-login newly created user
        $new_user_id = $pdo->lastInsertId();
        $_SESSION['user_id'] = $new_user_id;
        $_SESSION['username'] = $username;

        // Redirect to dashboard
        header("Location: ../pages/dashboard.php");
        exit;

    } catch (PDOException $e) {
        header("Location: ../pages/signup.php?error=" . urlencode("Database error: " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: ../pages/signup.php");
    exit;
}
?>