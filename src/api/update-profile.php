<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');

    // 1. Handle Username Update
    if (!empty($username)) {
        $stmt = $pdo->prepare("UPDATE users SET username = ? WHERE user_id = ?");
        $stmt->execute([$username, $user_id]);
        $_SESSION['username'] = $username;
    }

    // 2. Handle Avatar Image Upload
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = 'avatar_' . $user_id . '_' . time() . '.' . $fileExtension;
            $uploadFileDir = '../uploads/avatars/'; // Matches your folder structure!
            
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }

            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $avatarPath = 'uploads/avatars/' . $newFileName;
                $stmt = $pdo->prepare("UPDATE users SET avatar_path = ? WHERE user_id = ?");
                $stmt->execute([$avatarPath, $user_id]);
            }
        }
    }

    header("Location: ../pages/edit-character.php?success=1");
    exit;
}