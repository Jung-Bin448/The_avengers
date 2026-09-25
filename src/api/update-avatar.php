<?php

require_once __DIR__ . '/../config/database.php';

session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "message" => "Method not allowed."
    ]);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode([
        "success" => false,
        "message" => "Not logged in."
    ]);
    exit;
}

if (!isset($_FILES['avatar'])) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "No avatar file selected."
    ]);
    exit;
}

$file = $_FILES['avatar'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "There was a problem uploading the avatar."
    ]);
    exit;
}

// Maximum file size: 5 MB
$maxFileSize = 5 * 1024 * 1024;

if ($file['size'] > $maxFileSize) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Avatar must be smaller than 5 MB."
    ]);
    exit;
}

// Check that the uploaded file is actually an image
$imageInfo = getimagesize($file['tmp_name']);

if ($imageInfo === false) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Please upload a valid image."
    ]);
    exit;
}

// Allowed image types
$allowedTypes = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/gif' => 'gif',
    'image/webp' => 'webp'
];

$mimeType = $imageInfo['mime'];

if (!isset($allowedTypes[$mimeType])) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Only JPG, PNG, GIF, and WEBP images are allowed."
    ]);
    exit;
}

$extension = $allowedTypes[$mimeType];

// Create uploads folder if it doesn't exist
$uploadDirectory = __DIR__ . '/../uploads/avatars/';

if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

// Generate a unique filename
$fileName = 'avatar_' . $_SESSION['user_id'] . '_' . time() . '.' . $extension;

$filePath = $uploadDirectory . $fileName;

// Move uploaded file
if (!move_uploaded_file($file['tmp_name'], $filePath)) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Failed to save the avatar."
    ]);
    exit;
}

// Path that will be stored in the database
$avatarPath = '../uploads/avatars/' . $fileName;

try {

    $stmt = $pdo->prepare("
        UPDATE users
        SET avatar_path = :avatar_path
        WHERE user_id = :user_id
    ");

    $stmt->execute([
        'avatar_path' => $avatarPath,
        'user_id' => $_SESSION['user_id']
    ]);

    echo json_encode([
        "success" => true,
        "message" => "Avatar updated successfully.",
        "avatar_path" => $avatarPath
    ]);

} catch (PDOException $e) {

    // Remove uploaded file if database update fails
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => "Database error."
    ]);
}