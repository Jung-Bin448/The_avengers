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


/* Get form data */

$title =
    trim($_POST['title'] ?? '');

$description =
    trim($_POST['description'] ?? '');

$questType =
    $_POST['quest_type'] ?? 'daily_bounty';

$xpReward =
    (int)($_POST['xp_reward'] ?? 0);

$dueDate =
    trim($_POST['due_date'] ?? '');


/* Validate title */

if ($title === '') {

    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "Quest name is required."
    ]);

    exit;
}


if (strlen($title) > 150) {

    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "Quest name is too long."
    ]);

    exit;
}


/* Validate quest type */

$allowedTypes = [
    'daily_bounty',
    'boss_raid',
    'side_quest'
];


if (!in_array($questType, $allowedTypes, true)) {

    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "Invalid quest type."
    ]);

    exit;
}


/* Validate XP */

if ($xpReward < 1 || $xpReward > 10000) {

    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => "XP reward must be between 1 and 10000."
    ]);

    exit;
}


/* Validate date */

if ($dueDate === '') {

    $dueDate = null;

}


try {

    $stmt = $pdo->prepare("
        INSERT INTO quests (
            user_id,
            title,
            description,
            quest_type,
            xp_reward,
            due_date
        )
        VALUES (
            :user_id,
            :title,
            :description,
            :quest_type,
            :xp_reward,
            :due_date
        )
    ");


    $stmt->execute([

        'user_id' =>
            $_SESSION['user_id'],

        'title' =>
            $title,

        'description' =>
            $description !== ''
                ? $description
                : null,

        'quest_type' =>
            $questType,

        'xp_reward' =>
            $xpReward,

        'due_date' =>
            $dueDate

    ]);


    echo json_encode([

        "success" => true,

        "message" =>
            "Quest created successfully.",

        "quest_id" =>
            $pdo->lastInsertId()

    ]);


} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([

        "success" => false,

        "message" =>
            "Database error."

    ]);

}