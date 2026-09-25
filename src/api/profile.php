<?php

require_once __DIR__ . '/../config/database.php';

session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode([
        "success" => false,
        "message" => "Not logged in."
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT user_id, username, email, coins, xp, level, avatar_path
        FROM users
        WHERE user_id = :user_id
        LIMIT 1
    ");

    $stmt->execute([
        'user_id' => $_SESSION['user_id']
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        http_response_code(404);
        echo json_encode([
            "success" => false,
            "message" => "User not found."
        ]);
        exit;
    }

    echo json_encode([
        "success" => true,
        "user" => $user
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Database error."
    ]);
}