<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
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
                <p>Level <span id="userLevel">1<span> Adventurer</p>
            </div>

            <div style="display: flex; align-items: center; gap: 20px;">
                <div class="level-progress-container">
                    <div class="level-progress-text">
                        <span>Level Progress:</span>
                        <span><span id="progressPercentage">0<span>%</span>
                    </div>
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill" id="progressBarFill" style="width: 0%;"></div>
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
        <a href="collection.php" class="mobile-nav-link">
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
    async function loadDashboard() {
        try {
            const response = await fetch('../api/dashboard.php');
            const result = await response.json();

            if (!result.success) {
                console.error(result.message);
                return;
            }

            const user = result.user;

            console.log("Dashboard user:", user);
            document.getElementById('userLevel').textContent = user.level;

            const xp = Number(user.xp);
            const progressPercent = xp % 100;
            document.getElementById('progressPercent').textContent = progressPercent;
            document.getElementById('progressBarFill').style.width =
            progressPercent + '%';

        } catch (error) {
            console.error("Failed to load dashboard:", error);
        }
    }

    loadDashboard();
    </script>
</body>
</html>