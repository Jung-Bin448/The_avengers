<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$current_page = 'quests';

$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
$month = isset($_GET['month']) ? intval($_GET['month']) : date('m');
$selected_date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

$timestamp = mktime(0, 0, 0, $month, 1, $year);
$month_name = date('F Y', $timestamp);
$days_in_month = date('t', $timestamp);
$first_day_of_week = date('w', $timestamp);

$prev_month = $month - 1; $prev_year = $year;
if ($prev_month < 1) { $prev_month = 12; $prev_year--; }
$next_month = $month + 1; $next_year = $year;
if ($next_month > 12) { $next_month = 1; $next_year++; }

$quests = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM quests WHERE user_id = ? AND status IN ('pending', 'in_progress') ORDER BY due_date ASC, id DESC");
    $stmt->execute([$user_id]);
    $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM quests WHERE user_id = ? AND status IN ('pending', 'in_progress') ORDER BY due_date ASC, quest_id DESC");
        $stmt->execute([$user_id]);
        $quests = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quest - Level Up Life</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <div class="app-container">
        <aside class="sidebar">
            <a href="collection.php" class="nav-item <?php echo ($current_page == 'collection') ? 'active' : ''; ?>"><i class="fa-regular fa-folder"></i><span>Collection</span></a>
            <a href="dashboard.php" class="nav-item <?php echo ($current_page == 'dashboard') ? 'active' : ''; ?>"><i class="fa-solid fa-border-all"></i><span>Dashboard</span></a>
            <a href="quests.php" class="nav-item <?php echo ($current_page == 'quests') ? 'active' : ''; ?>"><i class="fa-solid fa-shield-halved"></i><span>Quest</span></a>
            <a href="party.php" class="nav-item <?php echo ($current_page == 'party') ? 'active' : ''; ?>"><i class="fa-solid fa-users"></i><span>Party</span></a>
            <a href="profile.php" class="nav-item <?php echo ($current_page == 'profile') ? 'active' : ''; ?>"><i class="fa-regular fa-user"></i><span>Profile</span></a>
        </aside>

        <main class="main-content">
            <div class="quest-calendar-card">
                <div class="quest-calendar-header">
                    <h2 class="quest-calendar-title"><?php echo date('d M, Y l', strtotime($selected_date)); ?></h2>
                    <div class="quest-calendar-nav">
                        <a href="quests.php?year=<?php echo $prev_year; ?>&month=<?php echo $prev_month; ?>&date=<?php echo sprintf('%04d-%02d-01', $prev_year, $prev_month); ?>" class="quest-nav-btn" style="text-decoration: none; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-chevron-left"></i></a>
                        <span style="color: #94a3b8; font-size: 0.85rem; font-weight: 600; padding: 0 8px;"><?php echo $month_name; ?></span>
                        <a href="quests.php?year=<?php echo $next_year; ?>&month=<?php echo $next_month; ?>&date=<?php echo sprintf('%04d-%02d-01', $next_year, $next_month); ?>" class="quest-nav-btn" style="text-decoration: none; display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-chevron-right"></i></a>
                    </div>
                </div>

                <div class="quest-calendar-grid">
                    <div class="quest-day-header">Sun</div><div class="quest-day-header">Mon</div><div class="quest-day-header">Tue</div><div class="quest-day-header">Wed</div><div class="quest-day-header">Thu</div><div class="quest-day-header">Fri</div><div class="quest-day-header">Sat</div>
                    <?php 
                    for ($i = 0; $i < $first_day_of_week; $i++) { echo '<div class="quest-day-number empty"></div>'; }
                    for ($day = 1; $day <= $days_in_month; $day++) {
                        $current_loop_date = sprintf('%04d-%02d-%02d', $year, $month, $day);
                        $is_active = ($current_loop_date === $selected_date) ? 'active' : '';
                        echo '<a href="quests.php?year=' . $year . '&month=' . $month . '&date=' . $current_loop_date . '" class="quest-day-number ' . $is_active . '" style="text-decoration: none; display: flex; align-items: center; justify-content: center;">' . $day . '</a>';
                    }
                    ?>
                </div>
            </div>

            <div class="quest-header-row">
                <div class="quest-section-title">
                    <span>All Quests (Selected Date Highlighted: <?php echo date('d M', strtotime($selected_date)); ?>)</span>
                    <i class="fa-solid fa-chevron-down" style="font-size: 16px; color: #94a3b8; cursor: pointer;"></i>
                </div>
                <button type="button" id="openQuestModalBtn" class="quest-add-btn"><i class="fa-solid fa-plus"></i></button>
            </div>

            <?php if (empty($quests)): ?>
                <div class="quest-empty-msg" style="padding: 30px; text-align: center; color: #8f9bba;"><p>No quests found. Click '+' to add one!</p></div>
            <?php else: ?>
                <div class="quests-list-container" style="display: flex; flex-direction: column; gap: 16px; margin-top: 15px;">
                    <?php foreach ($quests as $q): 
                        $type = $q['quest_type'] ?? 'daily_bounty';
                        $label = ($type === 'main_quest') ? 'MAIN QUEST' : (($type === 'daily_habit') ? 'DAILY HABIT' : (($type === 'side_quest') ? 'SIDE QUEST' : 'MILESTONE'));
                        $icon = ($type === 'daily_habit') ? 'fa-solid fa-bolt' : (($type === 'side_quest') ? 'fa-regular fa-circle' : (($type === 'milestone') ? 'fa-solid fa-trophy' : 'fa-solid fa-swords'));
                        $qid = $q['id'] ?? ($q['quest_id'] ?? 0);
                        $is_due_selected = ($q['due_date'] === $selected_date);
                        $formattedStart = !empty($q['start_time']) ? date('h:i A', strtotime($q['start_time'])) : '09:00 AM';
                        $formattedEnd = !empty($q['end_time']) ? date('h:i A', strtotime($q['end_time'])) : '11:59 PM';
                    ?>
                        <div class="quest-item-card openActionModal" data-id="<?php echo $qid; ?>" data-title="<?php echo htmlspecialchars($q['title']); ?>" style="background: <?php echo $is_due_selected ? '#172033' : '#111827'; ?>; border: <?php echo $is_due_selected ? '2px solid #3b82f6' : '1px solid #1f2937'; ?>; padding: 18px 24px; border-radius: 12px; display: flex; flex-direction: column; gap: 6px; cursor: pointer;">
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <div style="display: flex; align-items: center; gap: 8px; color: #94a3b8; font-size: 0.75rem; font-weight: 700;">
                                    <i class="<?php echo $icon; ?>" style="color: #60a5fa;"></i><span><?php echo $label; ?></span>
                                    <?php if ($is_due_selected): ?><span style="background: #2563eb; color: #fff; padding: 2px 6px; border-radius: 4px; font-size: 0.65rem;">Due Today</span><?php endif; ?>
                                </div>
                            </div>
                            <h4 style="color: #fff; font-size: 1.05rem; margin: 0; font-weight: 500;"><?php echo htmlspecialchars($q['title']); ?></h4>
                            <div style="color: #94a3b8; font-size: 0.8rem;"><?php echo $formattedStart; ?> - <?php echo $formattedEnd; ?> &bull; <span style="color: #60a5fa; font-weight: 600;">+<?php echo $q['xp_reward'] ?? 150; ?> XP</span> &bull; Due: <?php echo htmlspecialchars($q['due_date']); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </main>
    </div>

    <!-- CREATE QUEST MODAL -->
    <div id="questModal" class="quest-modal-overlay">
        <div class="quest-modal-container">
            <div class="quest-modal-header">
                <button type="button" class="modal-back-btn" id="closeQuestModalBtn">
                    <i class="fa-solid fa-chevron-left"></i><span>Create New Quest</span>
                </button>
            </div>
            <form id="createQuestForm" class="quest-modal-form">
                <input type="hidden" name="action" value="create">
                <div class="modal-form-group" style="margin-bottom: 15px;">
                    <input type="text" class="modal-input-field" name="quest_title" placeholder="Defeat the Inbox Dragon" required style="width: 100%; background: #1e293b; border: 1px solid #334155; padding: 12px 16px; border-radius: 8px; color: #fff;">
                </div>
                <div class="modal-form-group" style="margin-bottom: 15px;">
                    <textarea class="modal-textarea-field" name="quest_details" rows="3" placeholder="Add quest details, sub-objectives, or notes...." style="width: 100%; background: #1e293b; border: 1px solid #334155; padding: 12px 16px; border-radius: 8px; color: #fff;"></textarea>
                </div>
                <div class="modal-type-section" style="margin-bottom: 15px;">
                    <h4 class="modal-section-subtitle" style="color: #94a3b8; font-size: 0.75rem; margin-bottom: 8px; letter-spacing: 0.5px;">QUEST TYPE</h4>
                    <div class="modal-types-grid" style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <label class="modal-type-pill active" style="background: #2563eb; color: #fff; padding: 8px 14px; border-radius: 8px; font-size: 0.85rem; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                            <input type="radio" name="quest_type" value="main_quest" checked style="display: none;">
                            <i class="fa-solid fa-swords"></i><span>Main Quest</span>
                        </label>
                        <label class="modal-type-pill" style="background: #1e293b; color: #cbd5e1; padding: 8px 14px; border-radius: 8px; font-size: 0.85rem; cursor: pointer; display: flex; align-items: center; gap: 6px; border: 1px solid #334155;">
                            <input type="radio" name="quest_type" value="daily_habit" style="display: none;">
                            <i class="fa-solid fa-bolt"></i><span>Daily Habit</span>
                        </label>
                        <label class="modal-type-pill" style="background: #1e293b; color: #cbd5e1; padding: 8px 14px; border-radius: 8px; font-size: 0.85rem; cursor: pointer; display: flex; align-items: center; gap: 6px; border: 1px solid #334155;">
                            <input type="radio" name="quest_type" value="side_quest" style="display: none;">
                            <i class="fa-regular fa-circle"></i><span>Side Quest</span>
                        </label>
                        <label class="modal-type-pill" style="background: #1e293b; color: #cbd5e1; padding: 8px 14px; border-radius: 8px; font-size: 0.85rem; cursor: pointer; display: flex; align-items: center; gap: 6px; border: 1px solid #334155;">
                            <input type="radio" name="quest_type" value="milestone" style="display: none;">
                            <i class="fa-solid fa-trophy"></i><span>Milestone</span>
                        </label>
                    </div>
                </div>
                <div class="modal-dates-row" style="display: flex; background: #111827; border: 1px solid #1f2937; border-radius: 8px; padding: 12px 16px; align-items: center; justify-content: space-between; margin-bottom: 20px;">
                    <div style="display: flex; align-items: center; gap: 6px; color: #fff; font-size: 0.85rem;">
                        <span style="color: #94a3b8;">Start:</span>
                        <span style="font-weight: 600;">Today</span>
                        <input type="hidden" name="start_time" value="09:00">
                    </div>
                    <div style="width: 1px; height: 20px; background: #374151;"></div>
                    <div style="display: flex; align-items: center; gap: 6px; color: #f87171; font-size: 0.85rem;">
                        <span style="font-weight: 500;">Deadline:</span>
                        <input type="datetime-local" name="deadline_datetime" required value="<?php echo $selected_date; ?>T23:59" style="background: #1e293b; border: 1px solid #334155; color: #f87171; padding: 4px 8px; border-radius: 6px; font-size: 0.8rem; font-weight: 600; cursor: pointer; color-scheme: dark;">
                    </div>
                </div>
                <div class="modal-submit-container">
                    <button type="submit" class="modal-btn-primary" style="width: 100%; background: #2563eb; color: #fff; border: none; padding: 12px; border-radius: 8px; font-weight: 600; cursor: pointer;">Accept & Post Quest</button>
                </div>
            </form>
        </div>
    </div>

    <!-- QUEST ACTION MODAL -->
    <div id="questActionModal" class="quest-modal-overlay">
        <div class="quest-modal-container" style="max-width: 400px;">
            <div class="quest-modal-header" style="margin-bottom: 20px;">
                <button type="button" class="modal-back-btn" id="closeActionModalBtn">
                    <i class="fa-solid fa-chevron-left"></i><span id="actionModalTitle">Manage Quest</span>
                </button>
            </div>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <button type="button" onclick="submitAction('complete')" style="display: flex; align-items: center; gap: 10px; background: #065f46; color: #6ee7b7; border: 1px solid #047857; padding: 14px 16px; border-radius: 8px; font-weight: 600; font-size: 0.95rem; cursor: pointer; width: 100%; text-align: left;">
                    <i class="fa-solid fa-check" style="font-size: 1.1rem;"></i>
                    <div><div>Complete Quest</div><div style="font-size: 0.75rem; color: #a7f3d0; font-weight: normal;">Earn XP, Level up & update graph</div></div>
                </button>
                <button type="button" onclick="submitAction('in_progress')" style="display: flex; align-items: center; gap: 10px; background: #78350f; color: #fde68a; border: 1px solid #b45309; padding: 14px 16px; border-radius: 8px; font-weight: 600; font-size: 0.95rem; cursor: pointer; width: 100%; text-align: left;">
                    <i class="fa-solid fa-spinner" style="font-size: 1.1rem;"></i>
                    <div><div>Mark In Progress</div><div style="font-size: 0.75rem; color: #fef3c7; font-weight: normal;">Keep on quest page</div></div>
                </button>
                <button type="button" onclick="submitAction('drop')" style="display: flex; align-items: center; gap: 10px; background: #991b1b; color: #fca5a5; border: 1px solid #b91c1c; padding: 14px 16px; border-radius: 8px; font-weight: 600; font-size: 0.95rem; cursor: pointer; width: 100%; text-align: left;">
                    <i class="fa-solid fa-trash" style="font-size: 1.1rem;"></i>
                    <div><div>Drop Quest</div><div style="font-size: 0.75rem; color: #fee2e2; font-weight: normal;">Remove quest entirely</div></div>
                </button>
            </div>
        </div>
    </div>

    <script>
        let selectedQuestId = null;
        const modal = document.getElementById('questModal');
        document.getElementById('openQuestModalBtn').onclick = () => modal.classList.add('show');
        document.getElementById('closeQuestModalBtn').onclick = () => modal.classList.remove('show');
        
        const actionModal = document.getElementById('questActionModal');
        document.querySelectorAll('.openActionModal').forEach(card => {
            card.onclick = () => {
                selectedQuestId = card.getAttribute('data-id');
                document.getElementById('actionModalTitle').textContent = card.getAttribute('data-title');
                actionModal.classList.add('show');
            };
        });
        document.getElementById('closeActionModalBtn').onclick = () => actionModal.classList.remove('show');
        window.onclick = (e) => {
            if (e.target === modal) modal.classList.remove('show');
            if (e.target === actionModal) actionModal.classList.remove('show');
        };

        const pills = document.querySelectorAll('.modal-type-pill');
        pills.forEach(pill => {
            pill.onclick = () => {
                pills.forEach(p => {
                    p.style.background = '#1e293b'; p.style.color = '#cbd5e1'; p.style.borderColor = '#334155';
                });
                pill.style.background = '#2563eb'; pill.style.color = '#fff'; pill.style.borderColor = '#2563eb';
                pill.querySelector('input').checked = true;
            };
        });

        document.getElementById('createQuestForm').onsubmit = async (e) => {
            e.preventDefault();
            try {
                let res = await fetch('../api/quest_actions.php', { method: 'POST', body: new FormData(e.target) });
                let data = await res.json();
                if(data.success) {
                    modal.classList.remove('show');
                    location.reload();
                } else {
                    alert('Error: ' + (data.error || 'Failed to create quest'));
                }
            } catch (err) {
                console.error(err);
                alert('Request failed.');
            }
        };

        async function submitAction(questAction) {
            if (!selectedQuestId) return;
            let formData = new FormData();
            formData.append('action', 'update_status');
            formData.append('quest_id', selectedQuestId);
            formData.append('quest_action', questAction);
            try {
                let res = await fetch('../api/quest_actions.php', { method: 'POST', body: formData });
                let data = await res.json();
                if(data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + (data.error || 'Unknown error'));
                }
            } catch (err) {
                console.error(err);
                alert('Action request failed.');
            }
        }
    </script>
</body>
</html>