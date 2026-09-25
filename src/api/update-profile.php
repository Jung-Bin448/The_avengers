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

$username = trim($_POST['character_name'] ?? '');

if ($username === '') {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Character name cannot be empty."
    ]);
    exit;
}

if (strlen($username) > 20) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Character name must be 20 characters or less."
    ]);
    exit;
}

try {

    // Check if another user already has this username
    $stmt = $pdo->prepare("
        SELECT user_id
        FROM users
        WHERE username = :username
        AND user_id != :user_id
        LIMIT 1
    ");

    $stmt->execute([
        'username' => $username,
        'user_id' => $_SESSION['user_id']
    ]);

    if ($stmt->fetch()) {
        http_response_code(409);
        echo json_encode([
            "success" => false,
            "message" => "That character name is already taken."
        ]);
        exit;
    }

    // Update username
    $stmt = $pdo->prepare("
        UPDATE users
        SET username = :username
        WHERE user_id = :user_id
    ");

    $stmt->execute([
        'username' => $username,
        'user_id' => $_SESSION['user_id']
    ]);

    // Update session username
    $_SESSION['username'] = $username;

    echo json_encode([
        "success" => true,
        "message" => "Character name updated successfully.",
        "username" => $username
    ]);

} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => "Database error."
    ]);
}