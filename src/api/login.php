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

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "Please enter your email and password."
    ]);

    exit;
}

try {

    $stmt = $pdo->prepare("
        SELECT user_id, username, email, password_hash
        FROM users
        WHERE email = :email
        LIMIT 1
    ");

    $stmt->execute([
        'email' => $email
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        http_response_code(401);

        echo json_encode([
            "success" => false,
            "message" => "Invalid email or password."
        ]);

        exit;
    }

    if (!password_verify($password, $user['password_hash'])) {
        http_response_code(401);

        echo json_encode([
            "success" => false,
            "message" => "Invalid email or password."
        ]);

        exit;
    }

    // Login successful
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_name'] = $user['username'];
    $_SESSION['email'] = $user['email'];

    http_response_code(200);

    echo json_encode([
        "success" => true,
        "message" => "Login successful."
    ]);

} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => "Database error."
    ]);
}