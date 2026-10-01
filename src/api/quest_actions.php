<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

require_once '../config/database.php';
$user_id = $_SESSION['user_id'];

// Level Thresholds Array
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
            $type = $_POST['quest_type'] ?? 'main_quest';
            $deadline = $_POST['deadline_datetime'] ?? date('Y-m-d H:i:s');
            
            $due_date = date('Y-m-d', strtotime($deadline));
            $start_time = '09:00:00';
            $end_time = date('H:i:s', strtotime($deadline));
            
            $xp_reward = (rand(1, 10) * 50);

            $stmt = $pdo->prepare("INSERT INTO quests (user_id, title, description, quest_type, due_date, start_time, end_time, xp_reward, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending')");
            $stmt->execute([$user_id, $title, $details, $type, $due_date, $start_time, $end_time, $xp_reward]);
            
            echo json_encode(['success' => true]);
            exit;
        } 
        elseif ($action === 'update_status') {
            $quest_id = intval($_POST['quest_id'] ?? 0);
            $quest_action = $_POST['quest_action'] ?? '';

            if ($quest_id > 0) {
                $id_col = 'id';
                try {
                    $chk_col = $pdo->query("SHOW COLUMNS FROM quests LIKE 'quest_id'");
                    if ($chk_col && $chk_col->fetch()) { $id_col = 'quest_id'; }
                } catch (Exception $ex) {}

                if ($quest_action === 'complete') {
                    $q_chk = $pdo->prepare("SELECT xp_reward FROM quests WHERE {$id_col} = ? AND user_id = ?");
                    $q_chk->execute([$quest_id, $user_id]);
                    $q_data = $q_chk->fetch(PDO::FETCH_ASSOC);
                    $xp_gained = $q_data ? intval($q_data['xp_reward']) : 150;

                    $upd = $pdo->prepare("UPDATE quests SET status = 'completed' WHERE {$id_col} = ? AND user_id = ?");
                    $upd->execute([$quest_id, $user_id]);

                    $u_col = 'id';
                    try {
                        $chk_ucol = $pdo->query("SHOW COLUMNS FROM users LIKE 'user_id'");
                        if ($chk_ucol && $chk_ucol->fetch()) { $u_col = 'user_id'; }
                    } catch (Exception $ex) {}

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
                            $today = date('Y-m-d');
                            $chk_history = $pdo->prepare("SELECT id, xp_gained FROM xp_history WHERE user_id = ? AND logged_date = ?");
                            $chk_history->execute([$user_id, $today]);
                            $existing = $chk_history->fetch(PDO::FETCH_ASSOC);

                            if ($existing) {
                                $updated_xp = intval($existing['xp_gained']) + $xp_gained;
                                $upd_hist = $pdo->prepare("UPDATE xp_history SET xp_gained = ? WHERE id = ?");
                                $upd_hist->execute([$updated_xp, $existing['id']]);
                            } else {
                                $ins_hist = $pdo->prepare("INSERT INTO xp_history (user_id, xp_gained, logged_date) VALUES (?, ?, ?)");
                                $ins_hist->execute([$user_id, $xp_gained, $today]);
                            }
                        } catch (Exception $e) {}
                    }

                } elseif ($quest_action === 'in_progress') {
                    // Using 'active' or 'ongoing' to prevent ENUM/column length truncation errors
                    $upd = $pdo->prepare("UPDATE quests SET status = 'active' WHERE {$id_col} = ? AND user_id = ?");
                    $upd->execute([$quest_id, $user_id]);
                } elseif ($quest_action === 'drop') {
                    $del = $pdo->prepare("DELETE FROM quests WHERE {$id_col} = ? AND user_id = ?");
                    $del->execute([$quest_id, $user_id]);
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