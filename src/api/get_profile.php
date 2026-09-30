<?php
session_start();
header('Content-Type: application/json');
require_once '../db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT id, username, email, avatar, role, created_at FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($user) {
    echo json_encode([
        'success' => true,
        'profile' => [
            'username' => $user['username'],
            'email' => $user['email'],
            'avatar_path' => $user['avatar'],
            'role' => $user['role'] ?? 'Adventurer',
            'created_at' => $user['created_at'] ?? '2026',
            'level' => 1,
            'level_title' => 'Adventurer',
            'level_progress' => 20,
            'stats' => [
                'quests_completed' => 0,
                'current_streak' => 0,
                'party_members' => 0,
                'total_xp' => 0
            ],
            'rank' => [
                'global_rank' => '#1',
                'tier_name' => 'Novice'
            ],
            'achievements' => []
        ]
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'User not found']);
}