<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once '../config/database.php';
$user_id = $_SESSION['user_id'];

// Dynamically check user table primary key column name
$u_col = 'id';
try {
    $chk_ucol = $pdo->query("SHOW COLUMNS FROM users LIKE 'user_id'");
    if ($chk_ucol && $chk_ucol->fetch()) { $u_col = 'user_id'; }
} catch (Exception $ex) {}

// Fetch user info
$stmt = $pdo->prepare("SELECT * FROM users WHERE {$u_col} = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$username = $user['username'] ?? 'Adventurer';
$xp = intval($user['xp'] ?? 0);

// Requested Level Thresholds Array
$level_thresholds = [
    1 => 0, 
    2 => 5000, 
    3 => 12000, 
    4 => 22000, 
    5 => 35000,
    6 => 52000, 
    7 => 74000, 
    8 => 101000, 
    9 => 134000, 
    10 => 175000
];

// Dynamically compute correct current level based on total XP
$level = 1;
foreach ($level_thresholds as $lvl => $req_xp) {
    if ($xp >= $req_xp) {
        $level = $lvl;
    }
}

// Calculate level floor and next level threshold for the progress bar
$current_thresh = $level_thresholds[$level] ?? 0;
$next_thresh = $level_thresholds[$level + 1] ?? ($current_thresh + 25000);

// Compute exact progress percentage
$xp_into_level = $xp - $current_thresh;
$xp_needed = $next_thresh - $current_thresh;
$progress_pct = ($xp_needed > 0) ? min(100, max(0, round(($xp_into_level / $xp_needed) * 100))) : 100;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Level Up Life</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <div class="app-container">
        <aside class="sidebar">
            <a href="collection.php" class="nav-item"><i class="fa-regular fa-folder"></i><span>Collection</span></a>
            <a href="dashboard.php" class="nav-item active"><i class="fa-solid fa-border-all"></i><span>Dashboard</span></a>
            <a href="quests.php" class="nav-item"><i class="fa-solid fa-shield-halved"></i><span>Quest</span></a>
            <a href="party.php" class="nav-item"><i class="fa-solid fa-users"></i><span>Party</span></a>
            <a href="profile.php" class="nav-item"><i class="fa-regular fa-user"></i><span>Profile</span></a>
        </aside>

        <main class="main-content">
            <!-- GREETING & LEVEL PROGRESS BAR -->
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px;">
                <div>
                    <h1 style="color: #fff; font-size: 1.8rem; margin: 0 0 8px 0; font-weight: 700;">Hi, <?php echo htmlspecialchars($username); ?>!</h1>
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 320px; margin-bottom: 6px;">
                        <span style="color: #94a3b8; font-size: 0.9rem;">Level <?php echo $level; ?> Adventurer</span>
                        <span style="color: #38bdf8; font-size: 0.8rem; font-weight: 600;"><?php echo $xp; ?> / <?php echo $next_thresh; ?> XP</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px; width: 320px;">
                        <div style="flex: 1; background: #1e293b; height: 10px; border-radius: 5px; overflow: hidden; border: 1px solid #334155;">
                            <div style="background: linear-gradient(90deg, #3b82f6, #06b6d4); width: <?php echo $progress_pct; ?>%; height: 100%; border-radius: 4px; transition: width 0.4s ease;"></div>
                        </div>
                        <span style="color: #94a3b8; font-size: 0.8rem; font-weight: 600; min-width: 35px; text-align: right;"><?php echo $progress_pct; ?>%</span>
                    </div>
                </div>
                <div style="color: #94a3b8; font-size: 1.2rem; cursor: pointer;"><i class="fa-regular fa-bell"></i></div>
            </div>

            <!-- DAILY QUESTS BANNER -->
            <div style="background: #111827; border: 1px solid #1f2937; border-radius: 12px; padding: 20px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <div style="color: #fff; font-size: 1.1rem; font-weight: 700; margin-bottom: 4px;">Daily Quests</div>
                    <div style="color: #94a3b8; font-size: 0.85rem;">5 of 9 Completed</div>
                </div>
                <div style="color: #34d399; background: rgba(52, 211, 153, 0.1); border: 1px solid rgba(52, 211, 153, 0.2); border-radius: 50%; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.9rem;">
                    56%
                </div>
            </div>

            <!-- STATS CARDS -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 25px;">
                <div style="background: #111827; border: 1px solid #1f2937; border-radius: 12px; padding: 20px; display: flex; flex-direction: column; gap: 10px;">
                    <i class="fa-solid fa-bolt" style="color: #eab308; font-size: 1.2rem;"></i>
                    <div style="color: #94a3b8; font-size: 0.8rem; font-weight: 600;">Energy</div>
                    <div style="color: #fff; font-size: 1.2rem; font-weight: 700;">100 / 100</div>
                </div>
                
                <div style="background: #111827; border: 1px solid #1f2937; border-radius: 12px; padding: 20px; display: flex; flex-direction: column; gap: 10px;">
                    <i class="fa-solid fa-fire" style="color: #f97316; font-size: 1.2rem;"></i>
                    <div style="color: #94a3b8; font-size: 0.8rem; font-weight: 600;">Streak</div>
                    <div style="color: #fff; font-size: 1.2rem; font-weight: 700;">7 Days</div>
                </div>
                
                <div style="background: #111827; border: 1px solid #1f2937; border-radius: 12px; padding: 20px; display: flex; flex-direction: column; gap: 10px;">
                    <i class="fa-solid fa-star" style="color: #eab308; font-size: 1.2rem;"></i>
                    <div style="color: #94a3b8; font-size: 0.8rem; font-weight: 600;">Skill Points</div>
                    <div style="color: #fff; font-size: 1.2rem; font-weight: 700;">5 Available</div>
                </div>
            </div>

            <!-- SKILL MASTERY / XP HISTORY GRAPH CARD -->
            <div style="background: #111827; border: 1px solid #1f2937; border-radius: 12px; padding: 24px;">
                <div style="margin-bottom: 15px;">
                    <div style="color: #fff; font-size: 1.05rem; font-weight: 600; margin-bottom: 2px;">Skill Mastery / XP History</div>
                    <div style="color: #94a3b8; font-size: 0.8rem;">Avg: 61.43 XP/day</div>
                </div>
                <div style="height: 220px; position: relative;">
                    <canvas id="xpHistoryChart"></canvas>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Render Chart.js Graph matching original layout
        const ctx = document.getElementById('xpHistoryChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [
                    {
                        label: 'Skill Mastery',
                        data: [70, 110, 150, 110, 80, 45, 60],
                        borderColor: '#38bdf8',
                        backgroundColor: 'rgba(56, 189, 248, 0.1)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'XP Earned',
                        data: [40, 50, 80, 100, 150, 110, 70],
                        borderColor: '#a78bfa',
                        backgroundColor: 'rgba(167, 139, 250, 0.1)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: {
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#94a3b8' }
                    },
                    y: {
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#94a3b8' },
                        min: 40,
                        max: 160
                    }
                }
            }
        });
    </script>
</body>
</html>