<?php

require_once '../config/database.php';

$data = json_decode(file_get_contents("php://inpute"));

if (!empty($data->email) && !mpty($data->password)) {
    $query = "SELECT id, username, password FROM users WHERE email = :email LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $data->email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($data->password, $row['password'])) {
            http_response_code(200);
            echo json_encode([
                "message" => "Login successful.",
                "user_id" => $row['id'],
                "username" => $row['username']
            ]);
        } else {
            http_response_code(401);
            echo json_encode(["message" => "Invalid password."]);
        }
    } else {
        http_response_code(404);
        echo json_encode(["message" => "User not found."]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Invalid data."]);
}

?>