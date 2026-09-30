<?php
session_start();
header('Content-Type: application/json');
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'data' => []]);
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch the user's XP history entries ordered by recording date
$stmt = $pdo->prepare("SELECT xp_amount, recorded_at FROM xp_history WHERE user_id = ? ORDER BY recorded_at ASC LIMIT 10");
$stmt->execute([$user_id]);
$history = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fallback sample data if empty so the chart looks nice out-of-the-box
if (empty($history)) {
    $labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    $data = [0, 0, 0, 0, 0, 0, 0];
    $avg = 0;
} else {
    $labels = [];
    $data = [];
    $totalXp = 0;
    
    foreach ($history as $row) {
        $labels[] = date('M d', strtotime($row['recorded_at']));
        $data[] = (int)$row['xp_amount'];
        $totalXp += (int)$row['xp_amount'];
    }
    $avg = round($totalXp / count($history));
}

echo json_encode([
    'success' => true,
    'labels' => $labels,
    'data' => $data,
    'avg' => $avg
]);