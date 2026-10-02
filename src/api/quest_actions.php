<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

require_once '../config/database.php';
$user_id = $_SESSION['user_id'];

$level_thresholds = [
    1 => 0, 2 => 5000, 3 => 12000, 4 => 22000, 5 => 35000,
    6 => 52000, 7 => 74000, 8 => 101000, 9 => 134000, 10 => 175000
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    try {
        if ($action === 'create') {
            $title = trim($_POST['quest_title'] ?? '');
            $details = trim($_POST['quest_details'] ?? '');
            $type = $_POST['quest_type'] ?? 'daily_bounty';
            $deadline = $_POST['deadline_datetime'] ?? date('Y-m-d H:i:s');
            
            $db_quest_type = 'daily_bounty';
            if ($type === 'main_quest' || $type === 'boss_raid') {
                $db_quest_type = 'boss_raid';
            } elseif ($type === 'side_quest') {
                $db_quest_type = 'side_quest';
            }

            $due_date = date('Y-m-d', strtotime($deadline));
            $xp_reward = (rand(1, 10) * 50);

            $stmt = $pdo->prepare("INSERT INTO quests (user_id, title, description, quest_type, due_date, xp_reward, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
            $stmt->execute([$user_id, $title, $details, $db_quest_type, $due_date, $xp_reward]);
            
            echo json_encode(['success' => true]);
            exit;
        } 
        elseif ($action === 'update_status') {
            $quest_id = intval($_POST['quest_id'] ?? 0);
            $quest_action = $_POST['quest_action'] ?? '';

            if ($quest_id > 0) {
                $id_col = 'quest_id';
                try {
                    $chk_col = $pdo->query("SHOW COLUMNS FROM quests LIKE 'quest_id'");
                    if (!$chk_col || !$chk_col->fetch()) { $id_col = 'id'; }
                } catch (Exception $ex) { $id_col = 'id'; }

                if ($quest_action === 'complete') {
                    $q_chk = $pdo->prepare("SELECT xp_reward FROM quests WHERE {$id_col} = ? AND user_id = ?");
                    $q_chk->execute([$quest_id, $user_id]);
                    $q_data = $q_chk->fetch(PDO::FETCH_ASSOC);
                    $xp_gained = $q_data ? intval($q_data['xp_reward']) : 150;

                    $upd = $pdo->prepare("UPDATE quests SET status = 'completed', completed_at = NOW() WHERE {$id_col} = ? AND user_id = ?");
                    $upd->execute([$quest_id, $user_id]);

                    $u_col = 'user_id';
                    try {
                        $chk_ucol = $pdo->query("SHOW COLUMNS FROM users LIKE 'user_id'");
                        if (!$chk_ucol || !$chk_ucol->fetch()) { $u_col = 'id'; }
                    } catch (Exception $ex) { $u_col = 'id'; }

                    $u_stmt = $pdo->prepare("SELECT * FROM users WHERE {$u_col} = ?");
                    $u_stmt->execute([$user_id]);
                    $usr = $u_stmt->fetch(PDO::FETCH_ASSOC);

                    if ($usr) {
                        $new_xp = intval($usr['xp'] ?? 0) + $xp_gained;
                        
                        $new_level = 1;
                        foreach ($level_thresholds as $lvl => $req_xp) {
                            if ($new_xp >= $req_xp) {
                                $new_level = $lvl;
                            }
                        }

                        $upd_usr = $pdo->prepare("UPDATE users SET xp = ?, level = ? WHERE {$u_col} = ?");
                        $upd_usr->execute([$new_xp, $new_level, $user_id]);

                        try {
                            $ins_hist = $pdo->prepare("INSERT INTO xp_history (user_id, xp_amount, source) VALUES (?, ?, ?)");
                            $ins_hist->execute([$user_id, $xp_gained, 'Quest Completion']);
                        } catch (Exception $e) {}
                    }

                } elseif ($quest_action === 'in_progress') {
                    $upd = $pdo->prepare("UPDATE quests SET status = 'in_progress' WHERE {$id_col} = ? AND user_id = ?");
                    $upd->execute([$quest_id, $user_id]);
                } elseif ($quest_action === 'drop') {
                    $upd = $pdo->prepare("UPDATE quests SET status = 'cancelled' WHERE {$id_col} = ? AND user_id = ?");
                    $upd->execute([$quest_id, $user_id]);
                }
            }
            echo json_encode(['success' => true]);
            exit;
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        exit;
    }
}

echo json_encode(['success' => false, 'error' => 'Invalid request']);