<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id =$_SESSION['user_id'];

// 1. Fetch user profile data
$stmt =$pdo->prepare("SELECT username, level, level_title, level_progress, energy_current, energy_max, streak, skill_points FROM users WHERE user_id = ?");
$stmt->execute([$user_id]);
$user =$stmt->fetch();

$username      =$user['username'] ?? 'Adventurer';
$level         =$user['level'] ?? 1;
$level_title   =$user['level_title'] ?? 'Adventurer';
$level_progress=$user['level_progress'] ?? 0;
$energy_curr   =$user['energy_current'] ?? 100;
$energy_max    =$user['energy_max'] ?? 100;
$streak        =$user['streak'] ?? 0;
$skill_points  =$user['skill_points'] ?? 0;

// 2. Fetch daily quests stats
$qStmt =$pdo->prepare("SELECT 
    COUNT(*) as total, 
    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed 
    FROM quests WHERE user_id = ? AND quest_type = 'daily_bounty'");
$qStmt->execute([$user_id]);
$questStats =$qStmt->fetch();

$totalQuests     =$questStats['total'] ?? 0;
$completedQuests =$questStats['completed'] ?? 0;
$dailyPercentage = ($totalQuests > 0) ? round(($completedQuests / $totalQuests) * 100) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Level Up Life</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assests/css/style.css">
    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="app-container">
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <a href="collection.php" class="nav-item">
                <i class="fa-regular fa-folder"></i>
                <span>Collection</span>
            </a>
            <a href="dashboard.php" class="nav-item active">
                <i class="fa-solid fa-border-all"></i>
                <span>Dashboard</span>
            </a>
            <a href="quests.php" class="nav-item">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Quest</span>
            </a>
            <a href="party.php" class="nav-item">
                <i class="fa-solid fa-users"></i>
                <span>Party</span>
            </a>
            <a href="profile.php" class="nav-item">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content">
            
            <!-- Top Banner Header -->
            <div class="dashboard-header-banner" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <div>
                    <h1 style="margin: 0; font-size: 1.8rem; color: #fff;">Hi, <?php echo htmlspecialchars($username); ?>!</h1>
                    <p style="margin: 5px 0 0 0; color: #8f9bba; font-size: 0.95rem;">Level <?php echo (int)$level; ?> <?php echo htmlspecialchars($level_title); ?></p>
                </div>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span style="font-size: 0.85rem; color: #8f9bba; font-weight: 600;">Level Progress: <?php echo (int)$level_progress; ?>%</span>
                    <div style="width: 120px; background: #1e293b; height: 8px; border-radius: 4px; overflow: hidden;">
                        <div style="width: <?php echo (int)$level_progress; ?>%; background: #3b82f6; height: 100%;"></div>
                    </div>
                    <a href="notifications.php" style="color: #8f9bba; text-decoration: none; font-size: 1.2rem;"><i class="fa-solid fa-bell"></i></a>
                    <a href="logout.php" style="color: #8f9bba; text-decoration: none; font-size: 1.2rem;" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                </div>
            </div>

            <!-- Daily Quests Progress Bar Card -->
            <div class="profile-card" style="background: #111827; border: 1px solid #1f2937; padding: 20px 25px; border-radius: 12px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h3 style="margin: 0 0 5px 0; color: #fff; font-size: 1.1rem;">Daily Quests</h3>
                    <p style="margin: 0; color: #8f9bba; font-size: 0.9rem;"><?php echo (int)$completedQuests; ?> of <?php echo (int)$totalQuests; ?> Completed</p>
                </div>
                <div style="display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%; border: 3px solid #10b981; color: #10b981; font-weight: bold; font-size: 0.85rem;">
                    <?php echo (int)$dailyPercentage; ?>%
                </div>
            </div>

            <!-- Metric Cards Grid -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 25px;">
                
                <!-- Energy Card -->
                <div style="background: #111827; border: 1px solid #1f2937; padding: 25px; border-radius: 12px; text-align: center;">
                    <div style="color: #f59e0b; font-size: 1.5rem; margin-bottom: 10px;"><i class="fa-solid fa-bolt"></i></div>
                    <div style="color: #8f9bba; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin-bottom: 5px;">Energy</div>
                    <div style="color: #fff; font-size: 1.25rem; font-weight: bold;"><?php echo (int)$energy_curr; ?> / <?php echo (int)$energy_max; ?></div>
                </div>

                <!-- Streak Card -->
                <div style="background: #111827; border: 1px solid #1f2937; padding: 25px; border-radius: 12px; text-align: center;">
                    <div style="color: #3b82f6; font-size: 1.5rem; margin-bottom: 10px;"><i class="fa-solid fa-fire"></i></div>
                    <div style="color: #8f9bba; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin-bottom: 5px;">Streak</div>
                    <div style="color: #fff; font-size: 1.25rem; font-weight: bold;"><?php echo (int)$streak; ?> Days</div>
                </div>

                <!-- Skill Points Card -->
                <div style="background: #111827; border: 1px solid #1f2937; padding: 25px; border-radius: 12px; text-align: center;">
                    <div style="color: #fbbf24; font-size: 1.5rem; margin-bottom: 10px;"><i class="fa-solid fa-star"></i></div>
                    <div style="color: #8f9bba; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin-bottom: 5px;">Skill Points</div>
                    <div style="color: #fff; font-size: 1.25rem; font-weight: bold;"><?php echo (int)$skill_points; ?> Available</div>
                </div>

            </div>

            <!-- Skill Mastery / XP History Section -->
            <div style="background: #111827; border: 1px solid #1f2937; padding: 25px; border-radius: 12px; min-height: 250px;">
                <h3 style="margin: 0 0 5px 0; color: #fff; font-size: 1.1rem;">Skill Mastery / XP History</h3>
                <p id="xp-avg-label" style="margin: 0 0 20px 0; color: #8f9bba; font-size: 0.85rem;">Avg: Loading...</p>
                
                <!-- Live Chart Canvas Wrapper -->
                <div style="position: relative; height: 220px; width: 100%;">
                    <canvas id="xpHistoryChart"></canvas>
                </div>
            </div>

        </main>
    </div>

    <!-- Script to fetch data and build the live Chart.js graph -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('../api/get-xp-history.php')
                .then(res => res.json())
                .then(response => {
                    if (response.success) {
                        document.getElementById('xp-avg-label').textContent = `Avg: ${response.avg} XP/day`;

                        const ctx = document.getElementById('xpHistoryChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: response.labels,
                                datasets: [{
                                    label: 'XP Gained',
                                    data: response.data,
                                    borderColor: '#3b82f6',
                                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                                    borderWidth: 2,
                                    fill: true,
                                    tension: 0.3,
                                    pointBackgroundColor: '#3b82f6',
                                    pointRadius: 4
                                }]
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
                                        ticks: { color: '#8f9bba' }
                                    },
                                    y: {
                                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                                        ticks: { color: '#8f9bba' },
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }
                })
                .catch(err => console.error('Error loading XP history chart:', err));
        });
    </script>
</body>
</html>