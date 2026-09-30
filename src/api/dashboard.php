<?php
session_start();
header('Content-Type: application/json');
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT username, level, level_title, level_progress, 
               energy_current, energy_max, streak, skill_points 
        FROM users WHERE user_id = ?
    ");
    $stmt->execute([$_SESSION['user_id']]);
    $userData = $stmt->fetch();

    if (!$userData) {
        http_response_code(404);
        echo json_encode(['error' => 'User not found']);
        exit;
    }

    // Quest Stats & Graph Data
    $userData['quests'] = [
        'completed' => 2,
        'total' => 5,
        'percentage' => 40
    ];

    $userData['xp_history'] = [
        'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        'skill_mastery' => [70, 110, 150, 110, 80, 45, 60],
        'xp_earned' => [40, 50, 80, 100, 150, 110, 70]
    ];

    echo json_encode(['success' => true, 'data' => $userData]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}
?>