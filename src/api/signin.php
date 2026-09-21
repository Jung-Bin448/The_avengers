<?php

require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "message" => "Method not allowed."
    ]);
    exit;
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

/*
 * Check that all fields were provided
 */
if ($username === '' || $email === '' || $password === '' || $confirmPassword === '') {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Please fill in all fields."
    ]);
    exit;
}

/*
 * Check that passwords match
 */
if ($password !== $confirmPassword) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Passwords do not match."
    ]);
    exit;
}

/*
 * Check that the email is valid
 */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Please enter a valid email address."
    ]);
    exit;
}

try {

    /*
     * Check whether username or email already exists
     */
    $stmt = $pdo->prepare("
        SELECT user_id
        FROM users
        WHERE email = :email OR username = :username
        LIMIT 1
    ");

    $stmt->execute([
        'email' => $email,
        'username' => $username
    ]);

    if ($stmt->fetch()) {
        http_response_code(409);
        echo json_encode([
            "success" => false,
            "message" => "Email or username is already registered."
        ]);
        exit;
    }

    /*
     * Hash the password before storing it
     */
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    /*
     * Create the new user
     */
    $stmt = $pdo->prepare("
        INSERT INTO users (
            username,
            email,
            password_hash
        )
        VALUES (
            :username,
            :email,
            :password_hash
        )
    ");

    $stmt->execute([
        'username' => $username,
        'email' => $email,
        'password_hash' => $passwordHash
    ]);

    http_response_code(201);

    echo json_encode([
        "success" => true,
        "message" => "Account created successfully."
    ]);

} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => "Database error."
    ]);
}