<?php
session_start();

// Mock session data fallback for display
$username = $_SESSION['username'] ?? 'Alex';
$level = 5;
$progressPercent = 72;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Level Up Life</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assests/css/Style.css">
</head>
<body class="dashboard-layout">

    <!-- Desktop Sidebar -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="quests.php" class="nav-link">
                <i class="fa-regular fa-folder-open"></i>
                <span>Collection</span>
            </a>
            <a href="dashboard.php" class="nav-link active">
                <i class="fa-solid fa-swords"></i>
                <span>Quest</span>
            </a>
            <a href="parties.php" class="nav-link">
                <i class="fa-solid fa-users"></i>
                <span>Party</span>
            </a>
            <a href="profile.php" class="nav-link">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
        </nav>
    </aside>

    <!-- Main Dashboard Content -->
    <main class="dashboard-main">

        <!-- Top Welcome & Level Progress Header -->
        <header class="dashboard-header">
            <div class="user-welcome">
                <h1>Hi, <?php echo htmlspecialchars($username); ?>!</h1>
                <p>Level <?php echo $level; ?> Adventurer</p>
            </div>

            <div style="display: flex; align-items: center; gap: 20px;">
                <div class="level-progress-container">
                    <div class="level-progress-text">
                        <span>Level Progress:</span>
                        <span><?php echo $progressPercent; ?>%</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill" style="width: <?php echo $progressPercent; ?>%;"></div>
                    </div>
                </div>

                <button class="notification-btn" type="button" aria-label="Notifications">
                    <i class="fa-regular fa-bell"></i>
                </button>
            </div>
        </header>

        <!-- Daily Quests Overview Card -->
        <section class="quest-banner-card">
            <div class="quest-info">
                <h2>Daily Quests</h2>
                <p>2 of 5 Completed</p>
            </div>
            <div class="progress-circle">
                <span class="progress-circle-value">40%</span>
            </div>
        </section>

        <!-- Player Stat Badges Grid -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon energy">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <span class="stat-label">Energy</span>
                <span class="stat-value">100 / 100</span>
            </div>

            <div class="stat-card">
                <div class="stat-icon gold">
                    <i class="fa-solid fa-coins"></i>
                </div>
                <span class="stat-label">Gold</span>
                <span class="stat-value">1,240</span>
            </div>

            <div class="stat-card">
                <div class="stat-icon streak">
                    <i class="fa-solid fa-fire"></i>
                </div>
                <span class="stat-label">Streak</span>
                <span class="stat-value">7 Days</span>
            </div>

            <div class="stat-card">
                <div class="stat-icon skill">
                    <i class="fa-solid fa-star"></i>
                </div>
                <span class="stat-label">Skill Points</span>
                <span class="stat-value">5 Available</span>
            </div>
        </section>

        <!-- Skill Mastery / XP History Graph -->
        <section class="chart-card">
            <div class="chart-header">
                <h3>Skill Mastery / XP History</h3>
                <p>Avg: 450 XP/day</p>
            </div>

            <div class="chart-wrapper">
                <canvas id="xpChart"></canvas>
            </div>

            <button class="chart-add-btn" type="button" aria-label="Add entry">
                <i class="fa-solid fa-plus"></i>
            </button>
        </section>

    </main>

    <!-- Sticky Mobile Bottom Navigation Bar -->
    <nav class="mobile-bottom-nav">
        <a href="quests.php" class="mobile-nav-link">
            <i class="fa-regular fa-folder-open"></i>
            <span>Collection</span>
        </a>
        <a href="dashboard.php" class="mobile-nav-link active">
            <i class="fa-solid fa-swords"></i>
            <span>Quest</span>
        </a>
        <a href="parties.php" class="mobile-nav-link">
            <i class="fa-solid fa-users"></i>
            <span>Party</span>
        </a>
        <a href="profile.php" class="mobile-nav-link">
            <i class="fa-regular fa-user"></i>
            <span>Profile</span>
        </a>
    </nav>

    <!-- Chart Setup Script -->
    <script>
        const ctx = document.getElementById('xpChart').getContext('2d');
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [
                    {
                        label: 'Skill XP',
                        data: [70, 115, 145, 115, 80, 40, 50],
                        borderColor: '#8b5cf6',
                        backgroundColor: 'transparent',
                        tension: 0.4,
                        borderWidth: 2,
                        pointBackgroundColor: '#8b5cf6',
                        pointRadius: 4
                    },
                    {
                        label: 'Total XP',
                        data: [40, 45, 80, 100, 145, 115, 60],
                        borderColor: '#10b981',
                        backgroundColor: 'transparent',
                        tension: 0.4,
                        borderWidth: 2,
                        pointBackgroundColor: '#10b981',
                        pointRadius: 4
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
                    x: { display: false },
                    y: {
                        min: 0,
                        max: 160,
                        ticks: {
                            stepSize: 40,
                            color: '#64748b',
                            font: { size: 11 }
                        },
                        grid: { display: false },
                        border: { display: false }
                    }
                }
            }
        });
    </script>
</body>
</html>