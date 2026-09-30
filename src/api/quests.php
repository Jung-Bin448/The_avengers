<?php
session_start();
header('Content-Type: application/json');
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$userId = $_SESSION['user_id'];
$requestedDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

try {
    $stmt = $pdo->prepare("
        SELECT 
            quest_id, 
            COALESCE(type_label, 'QUEST') AS type_label, 
            COALESCE(type_icon, 'fa-solid fa-shield-halved') AS type_icon, 
            title, 
            COALESCE(start_time, '00:00') AS start_time, 
            COALESCE(end_time, '00:00') AS end_time, 
            COALESCE(xp_reward, 0) AS xp_reward, 
            is_completed 
        FROM quests 
        WHERE user_id = ? AND scheduled_date = ?
        ORDER BY quest_id ASC
    ");
    $stmt->execute([$userId, $requestedDate]);
    $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'date' => $requestedDate,
        'quests' => $quests
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}
?>