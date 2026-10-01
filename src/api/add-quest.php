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
    // Updated to query columns that actually exist in your schema.sql table
    $stmt = $pdo->prepare("
        SELECT 
            quest_id, 
            UPPER(quest_type) AS type_label, 
            'fa-solid fa-shield-halved' AS type_icon, 
            title, 
            COALESCE(due_date, '') AS start_time, 
            COALESCE(due_date, '') AS end_time, 
            COALESCE(xp_reward, 0) AS xp_reward, 
            CASE WHEN status = 'completed' THEN 1 ELSE 0 END AS is_completed 
        FROM quests 
        WHERE user_id = ? AND due_date = ?
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