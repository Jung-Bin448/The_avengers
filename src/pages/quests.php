<?php
session_start();
// Database configuration
$host = 'localhost';
$dbname = 'levelup_life';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch active tasks from MySQL database matching SRS Schema (Quests)
$quests = [];
try {
    $stmt = $pdo->query("SELECT * FROM Quests WHERE is_active = 1 ORDER BY quest_id ASC");
    $quests = $stmt->fetchAll();
} catch (Exception $e) {
    // Demo fallback list matching mockup if DB table is empty
    $quests = [
        ['title' => 'Defeat the Website Design Audit', 'category' => 'MAIN QUEST', 'icon' => 'fa-swords', 'time' => '11:20 AM - 12:20 PM', 'xp' => 150],
        ['title' => 'Alignment Sync with Client Guild', 'category' => 'SIDE QUEST', 'icon' => 'fa-shield-halved', 'time' => '12:30 PM - 1:00 PM', 'xp' => 75],
        ['title' => 'Complete 30 Minutes of Code Practice', 'category' => 'DAILY HABIT', 'icon' => 'fa-bolt', 'time' => '3:00 PM - 3:30 PM', 'xp' => 100],
        ['title' => 'Submit Version 1.0 Milestone Build', 'category' => 'MILESTONE', 'icon' => 'fa-trophy', 'time' => '4:20 PM - 5:00 PM', 'xp' => 500]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Quests - Level-Up Life</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0b0f19;
            --card-bg: #141a29;
            --purple-accent: #8b5cf6;
            --text-muted: #8e9bb0;
        }

        body {
            background-color: var(--bg-dark);
            color: #ffffff;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            padding-bottom: 80px;
        }

        .app-container {
            max-width: 430px;
            margin: 0 auto;
            padding: 20px 18px;
        }

        .calendar-card {
            background-color: var(--card-bg);
            border-radius: 20px;
            padding: 16px;
            margin-bottom: 25px;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            text-align: center;
            font-size: 0.8rem;
        }

        .day-header {
            color: var(--text-muted);
            font-size: 0.75rem;
            margin-bottom: 5px;
        }

        .day-number {
            padding: 6px 0;
            border-radius: 50%;
            cursor: pointer;
        }

        .day-number.active {
            background-color: var(--purple-accent);
            color: #ffffff;
            font-weight: bold;
        }

        .quest-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 14px 0;
        }

        .quest-item:last-child {
            border-bottom: none;
        }

        .quest-badge-title {
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .add-quest-btn {
            background: linear-gradient(135deg, #a855f7 0%, #6366f1 100%);
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(168, 85, 247, 0.4);
        }

        /* Bottom Nav */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 430px;
            background-color: #0b0f19;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-around;
            padding: 12px 0;
            z-index: 1000;
        }

        .nav-item-custom {
            color: var(--text-muted);
            font-size: 1.25rem;
            text-decoration: none;
        }

        .nav-item-custom.active {
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="app-container">
    <!-- Date Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">01 Sep, 26 <span class="fs-6 fw-normal text-secondary">Tuesday</span></h4>
        <div class="text-secondary fs-5">
            <i class="fa-solid fa-chevron-left me-2" style="cursor:pointer;"></i>
            <i class="fa-solid fa-chevron-right" style="cursor:pointer;"></i>
        </div>
    </div>

    <!-- Calendar View Card -->
    <div class="calendar-card">
        <div class="calendar-grid">
            <div class="day-header">Sun</div>
            <div class="day-header">Mon</div>
            <div class="day-header">Tue</div>
            <div class="day-header">Wed</div>
            <div class="day-header">Thu</div>
            <div class="day-header">Fri</div>
            <div class="day-header">Sat</div>

            <?php for ($i = 1; $i <= 31; $i++): ?>
                <div class="day-number <?= $i === 1 ? 'active' : '' ?>">
                    <?= $i ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Quests Section Header -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="fw-bold mb-0">Today's Quests <i class="fa-solid fa-chevron-down fs-6 ms-1"></i></h5>
        <a href="#" class="add-quest-btn"><i class="fa-solid fa-plus"></i></a>
    </div>

    <!-- Quest List -->
    <div class="quest-list">
        <?php foreach ($quests as $q): ?>
            <div class="quest-item">
                <div class="quest-badge-title">
                    <span><?= strtoupper($q['category'] ?? $q['xp_reward'] . ' XP QUEST') ?></span>
                    <i class="fa-solid <?= $q['icon'] ?? 'fa-swords' ?>"></i>
                </div>
                <h6 class="fw-semibold mt-1 mb-1" style="font-size: 0.95rem;"><?= htmlspecialchars($q['title']) ?></h6>
                <small class="text-secondary" style="font-size: 0.78rem;">
                    <?= $q['time'] ?? '10:00 AM - 11:00 AM' ?> • <span class="text-light">+<?= $q['xp'] ?? $q['xp_reward'] ?> XP</span>
                </small>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Bottom Navigation Bar -->
<div class="bottom-nav">
    <a href="dashboard.php" class="nav-item-custom"><i class="fa-solid fa-cart-shopping text-warning"></i></a>
    <a href="#" class="nav-item-custom"><i class="fa-regular fa-copy"></i></a>
    <a href="#" class="nav-item-custom active"><i class="fa-solid fa-swords"></i></a>
    <a href="#" class="nav-item-custom"><i class="fa-solid fa-users text-danger"></i></a>
    <a href="dashboard.php" class="nav-item-custom"><i class="fa-regular fa-user"></i></a>
</div>

</body>
</html>