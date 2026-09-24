<?php
session_start();

// User session data
$userName = $_SESSION['username'] ?? 'Alex';
$userTitle = "Level 5 Adventurer";
$levelProgress = 72; // %

// Daily Quest stats
$completedQuests = 2;
$totalQuests = 5;
$questPercent = round(($completedQuests / $totalQuests) * 100);

// Metric stats
$energyCurrent = 100;
$energyMax = 100;
$goldCount = "1,240";
$streakDays = 7;
$skillPoints = 5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party - Level Up Life</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/Style.css">
</head>
<body class="dashboard-layout">

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="collection.php" class="nav-link">
                <i class="fa-regular fa-folder"></i>
                <span>Collection</span>
            </a>
            <a href="dashboard.php" class="nav-link">
                <i class="fa-solid fa-swords"></i>
                <span>Quest</span>
            </a>
            <a href="party.php" class="nav-link active">
                <i class="fa-solid fa-users"></i>
                <span>Party</span>
            </a>
            <a href="profile.php" class="nav-link">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="dashboard-main">

        <!-- Top Header -->
        <header class="quest-welcome-header">
            <div class="user-info-group">
                <h1>Hi, <?php echo htmlspecialchars($userName); ?>!</h1>
                <p class="subtitle"><?php echo htmlspecialchars($userTitle); ?></p>
            </div>

            <div class="header-right-group">
                <div class="level-bar-container">
                    <div class="level-text-row">
                        <span>Level Progress: <?php echo $levelProgress; ?>%</span>
                    </div>
                    <div class="progress-bar-bg quest-progress-bg">
                        <div class="progress-bar-fill" style="width: <?php echo $levelProgress; ?>%;"></div>
                    </div>
                </div>
                <button class="icon-bell-btn" type="button" aria-label="Notifications">
                    <i class="fa-regular fa-bell"></i>
                </button>
            </div>
        </header>

        <!-- Main Dashboard Content Stack -->
        <div class="dashboard-content-stack">
            
            <!-- Daily Quests Card -->
            <div class="dashboard-card daily-quests-card">
                <div class="daily-quests-left">
                    <h2>Daily Quests</h2>
                    <p class="quest-count"><?php echo "$completedQuests of $totalQuests Completed"; ?></p>
                </div>
                <div class="circular-progress" style="--percent: <?php echo $questPercent; ?>;">
                    <span><?php echo $questPercent; ?>%</span>
                </div>
            </div>

            <!-- Stats Grid Row (Energy, Gold, Streak, Skill Points) -->
            <div class="stats-cards-grid">
                
                <div class="dashboard-card stat-card-box">
                    <div class="stat-icon-wrapper energy-icon">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <h3 class="stat-card-title">Energy</h3>
                    <p class="stat-card-value"><?php echo "$energyCurrent / $energyMax"; ?></p>
                </div>

                <div class="dashboard-card stat-card-box">
                    <div class="stat-icon-wrapper gold-icon">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                    <h3 class="stat-card-title">Gold</h3>
                    <p class="stat-card-value"><?php echo htmlspecialchars($goldCount); ?></p>
                </div>

                <div class="dashboard-card stat-card-box">
                    <div class="stat-icon-wrapper streak-icon">
                        <i class="fa-solid fa-meteor"></i>
                    </div>
                    <h3 class="stat-card-title">Streak</h3>
                    <p class="stat-card-value"><?php echo "$streakDays Days"; ?></p>
                </div>

                <div class="dashboard-card stat-card-box">
                    <div class="stat-icon-wrapper skill-icon">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h3 class="stat-card-title">Skill Points</h3>
                    <p class="stat-card-value"><?php echo "$skillPoints Available"; ?></p>
                </div>

            </div>

            <!-- XP Graph Card -->
            <div class="dashboard-card chart-card">
                <div class="chart-header">
                    <div>
                        <h3>Skill Mastery / XP History</h3>
                        <p class="chart-avg">Avg: 450 XP/day</p>
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="xpChart"></canvas>
                    <button class="fab-add-btn" type="button" aria-label="Add XP">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>

        </div>

    </main>

    <!-- Mobile Bottom Navigation -->
    <nav class="mobile-bottom-nav">
        <a href="collection.php" class="mobile-nav-link">
            <i class="fa-regular fa-folder"></i>
            <span>Collection</span>
        </a>
        <a href="dashboard.php" class="mobile-nav-link">
            <i class="fa-solid fa-swords"></i>
            <span>Quest</span>
        </a>
        <a href="party.php" class="mobile-nav-link active">
            <i class="fa-solid fa-users"></i>
            <span>Party</span>
        </a>
        <a href="profile.php" class="mobile-nav-link">
            <i class="fa-regular fa-user"></i>
            <span>Profile</span>
        </a>
    </nav>

    <!-- Chart Configuration Script -->
    <script>
        const ctx = document.getElementById('xpChart').getContext('2d');
        
        const purpleGrad = ctx.createLinearGradient(0, 0, 0, 200);
        purpleGrad.addColorStop(0, 'rgba(168, 85, 247, 0.25)');
        purpleGrad.addColorStop(1, 'rgba(168, 85, 247, 0.0)');

        const greenGrad = ctx.createLinearGradient(0, 0, 0, 200);
        greenGrad.addColorStop(0, 'rgba(16, 185, 129, 0.25)');
        greenGrad.addColorStop(1, 'rgba(16, 185, 129, 0.0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['', '', '', '', '', '', ''],
                datasets: [
                    {
                        data: [75, 120, 150, 120, 80, 45, 60],
                        borderColor: '#a855f7',
                        borderWidth: 2,
                        tension: 0.45,
                        pointBackgroundColor: '#a855f7',
                        pointRadius: 4,
                        fill: true,
                        backgroundColor: purpleGrad
                    },
                    {
                        data: [45, 50, 80, 105, 155, 120, 70],
                        borderColor: '#10b981',
                        borderWidth: 2,
                        tension: 0.45,
                        pointBackgroundColor: '#10b981',
                        pointRadius: 4,
                        fill: true,
                        backgroundColor: greenGrad
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, border: { display: false } },
                    y: {
                        min: 0,
                        max: 160,
                        ticks: { stepSize: 40, color: '#94a3b8', font: { size: 12 } },
                        grid: { color: 'rgba(255, 255, 255, 0.05)', drawBorder: false },
                        border: { display: false }
                    }
                }
            }
        });
    </script>

</body>
</html>