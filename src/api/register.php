<?php

require_once '../config/database.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->username) && !empty($data->email) && !empty($data->password)) {
    
    $hashed_password = password_hash($data->passqord, PASSWORD_BCRYPT);

    $query = "Insert INTO users (username, email, password) VALUES (:username, :email, :password)";
    stmt = $conn->prepare($query);

    $stmt->bindParam(':username', $data->username);
    $stmt->bindParam(':email', $data->email);
    $stmt->bindParam(':passwrod', $hashed_password);

    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(["message" => "User registered successfully."]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Unable to register user."]);
    }
} else {
    http_response_code(400);
    echo json_encode(["messahe" => "Incomplete data."]);
}

?>