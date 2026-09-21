<?php
session_start();

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

$user_name = $_SESSION['username'] ?? 'Alex';
$current_level = $_SESSION['current_level'] ?? 5;
$level_title = "Level $current_level Adventurer";
$level_progress = 72; // %
$daily_completed = 2;
$daily_total = 5;
$daily_percent = round(($daily_completed / $daily_total) * 100);
$energy = "100 / 100";
$gold = "1,240";
$streak_days = $_SESSION['streak_count'] ?? 7;
$skill_points = 5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Level-Up Life</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --bg-dark: #0b0f19;
            --card-bg: #141a29;
            --card-inner: #1a2235;
            --teal-accent: #00e5a3;
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

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .notification-bell {
            background: rgba(255, 255, 255, 0.05);
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #ffffff;
            cursor: pointer;
        }

        /* Custom Progress Bar */
        .progress-bar-container {
            margin-bottom: 25px;
        }
        .custom-progress {
            height: 10px;
            background-color: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
        }
        .custom-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #00d2ff 0%, var(--teal-accent) 100%);
            border-radius: 20px;
        }

        /* Stat Cards */
        .stat-card {
            background-color: var(--card-bg);
            border-radius: 18px;
            padding: 16px;
            margin-bottom: 14px;
            border: 1px solid rgba(255, 255, 255, 0.03);
            position: relative;
        }

        .stat-card-sm {
            height: 100%;
        }

        .icon-badge {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .circular-progress {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: conic-gradient(var(--teal-accent) <?= $daily_percent * 3.6 ?>deg, #1d273c 0deg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circular-progress-inner {
            width: 42px;
            height: 42px;
            background-color: var(--card-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
        }

        /* Floating Add Button in Chart Card */
        .add-float-btn {
            position: absolute;
            right: 15px;
            bottom: 15px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: #ffffff;
            color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            cursor: pointer;
            text-decoration: none;
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
            transition: color 0.2s;
        }

        .nav-item-custom.active, .nav-item-custom:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="app-container">
    <!-- Top Header -->
    <div class="header-section">
        <div>
            <h2 class="fw-bold mb-0">Hi,<?= htmlspecialchars($user_name) ?>!</h2>
            <small class="text-secondary"><?= htmlspecialchars($level_title) ?></small>
        </div>
        <div class="notification-bell">
            <i class="fa-regular fa-bell"></i>
        </div>
    </div>

    <!-- Level Progress -->
    <div class="progress-bar-container">
        <div class="d-flex justify-content-between text-secondary mb-1" style="font-size: 0.8rem;">
            <span>Level Progress: <?= $level_progress ?>%</span>
        </div>
        <div class="custom-progress">
            <div class="custom-progress-fill" style="width: <?= $level_progress ?>%;"></div>
        </div>
    </div>

    <!-- Daily Quests Summary -->
    <div class="stat-card d-flex justify-content-between align-items-center">
        <div>
            <h6 class="fw-bold mb-1">Daily Quests</h6>
            <small class="text-secondary"><?= $daily_completed ?> of <?= $daily_total ?> Completed</small>
        </div>
        <div class="circular-progress">
            <div class="circular-progress-inner">
                <?= $daily_percent ?>%
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="row g-3 mb-3">
        <!-- Energy -->
        <div class="col-6">
            <div class="stat-card stat-card-sm d-flex justify-content-between align-items-start">
                <div>
                    <small class="text-secondary d-block mb-1">Energy</small>
                    <span class="fw-bold fs-6"><?= $energy ?></span>
                </div>
                <div class="icon-badge text-warning"><i class="fa-solid fa-bolt"></i></div>
            </div>
        </div>

        <!-- Gold -->
        <div class="col-6">
            <div class="stat-card stat-card-sm d-flex justify-content-between align-items-start">
                <div>
                    <small class="text-secondary d-block mb-1">Gold</small>
                    <span class="fw-bold fs-6"><?= $gold ?></span>
                </div>
                <div class="icon-badge" style="background:#f59e0b; color:#ffffff;"><i class="fa-solid fa-coins"></i></div>
            </div>
        </div>

        <!-- Streak -->
        <div class="col-6">
            <div class="stat-card stat-card-sm d-flex justify-content-between align-items-start">
                <div>
                    <small class="text-secondary d-block mb-1">Streak</small>
                    <span class="fw-bold fs-6"><?= $streak_days ?> Days</span>
                </div>
                <div class="icon-badge text-info"><i class="fa-solid fa-planet-ringed"></i><i class="fa-solid fa-globe"></i></div>
            </div>
        </div>

        <!-- Skill Points -->
        <div class="col-6">
            <div class="stat-card stat-card-sm d-flex justify-content-between align-items-start">
                <div>
                    <small class="text-secondary d-block mb-1">Skill Points</small>
                    <span class="fw-bold fs-6"><?= $skill_points ?> Available</span>
                </div>
                <div class="icon-badge text-warning"><i class="fa-solid fa-star"></i></div>
            </div>
        </div>
    </div>

    <!-- Skill Mastery / XP Chart -->
    <div class="stat-card position-relative pb-4">
        <h6 class="fw-bold mb-0">Skill Mastery / XP History</h6>
        <small class="text-secondary d-block mb-3" style="font-size: 0.75rem;">Avg: 450 XP/day</small>
        
        <div style="height: 120px;">
            <canvas id="xpChart"></canvas>
        </div>

        <a href="quests.php" class="add-float-btn">
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>
</div>

<!-- Bottom Navigation Bar -->
<div class="bottom-nav">
    <a href="#" class="nav-item-custom"><i class="fa-solid fa-cart-shopping text-warning"></i></a>
    <a href="#" class="nav-item-custom"><i class="fa-regular fa-copy"></i></a>
    <a href="quests.php" class="nav-item-custom"><i class="fa-solid fa-swords"></i></a>
    <a href="#" class="nav-item-custom"><i class="fa-solid fa-users text-danger"></i></a>
    <a href="#" class="nav-item-custom active"><i class="fa-regular fa-user"></i></a>
</div>

<script>
    // XP Line Chart setup using Chart.js
    const ctx = document.getElementById('xpChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5'],
            datasets: [
                {
                    data: [110, 160, 120, 90, 100],
                    borderColor: '#8b5cf6',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 3,
                    pointBackgroundColor: '#8b5cf6'
                },
                {
                    data: [35, 60, 100, 150, 40],
                    borderColor: '#00e5a3',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 3,
                    pointBackgroundColor: '#00e5a3'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { display: false },
                y: {
                    min: 40,
                    max: 160,
                    ticks: { color: '#8e9bb0', stepSize: 40 },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                }
            }
        }
    });
</script>
</body>
</html>