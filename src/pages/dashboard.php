<?php
session_start();

// Database configuration based on Docker setup
$host = 'db';
$dbname = 'level_up_life';
$username = 'levelup';
$password = 'levelup123';

// Mock user data fallback if database user is not logged in
$user = [
    'username' => $_SESSION['username'] ?? 'Alex',
    'rank' => 'Level 5 Adventurer',
    'progress' => 72,
    'completed_quests' => 2,
    'total_quests' => 5,
    'energy' => '100 / 100',
    'gold' => '1,240',
    'streak' => '7 Days',
    'skill_points' => '5 Available'
];

try {
    if (isset($_SESSION['user_id'])) {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]);
        $dbUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dbUser) {
            $user['username'] = $dbUser['username'];
            $user['rank'] = "Level " . ($dbUser['current_level'] ?? 5) . " Adventurer";
            $user['streak'] = ($dbUser['streak_count'] ?? 7) . " Days";
        }
    }
} catch (PDOException $e) {
    // Silently fall back to default dashboard values if DB is offline
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level Up Life - Dashboard</title>
    <link rel="stylesheet" href="../assests/css/Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<div class="app-container">

    <!-- Top Header -->
    <div class="app-header">
        <div>
            <div class="user-greeting">Hi,<?php echo htmlspecialchars($user['username']); ?>!</div>
            <div class="user-rank"><?php echo htmlspecialchars($user['rank']); ?></div>
        </div>
        <div class="header-icon">
            <i class="fa-regular fa-bell"></i>
        </div>
    </div>

    <!-- Level Progress Bar -->
    <div class="level-progress-container">
        <div class="progress-label">Level Progress: <?php echo $user['progress']; ?>%</div>
        <div class="progress-bar-bg">
            <div class="progress-bar-fill" style="width: <?php echo $user['progress']; ?>%;"></div>
        </div>
    </div>

    <!-- Daily Quests Card -->
    <div class="dashboard-card daily-quests-card">
        <div>
            <div class="card-title">Daily Quests</div>
            <div class="card-subtitle"><?php echo $user['completed_quests']; ?> of <?php echo $user['total_quests']; ?> Completed</div>
        </div>
        <div class="circular-progress">
            <div class="circular-progress-inner">40%</div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <!-- Energy -->
        <div class="dashboard-card">
            <div class="stat-header">
                <span class="card-title">Energy</span>
                <i class="fa-solid fa-bolt" style="color: #f1c40f;"></i>
            </div>
            <div class="stat-value"><?php echo $user['energy']; ?></div>
        </div>

        <!-- Gold -->
        <div class="dashboard-card">
            <div class="stat-header">
                <span class="card-title">Gold</span>
                <i class="fa-solid fa-coins" style="color: #f39c12;"></i>
            </div>
            <div class="stat-value"><?php echo $user['gold']; ?></div>
        </div>

        <!-- Streak -->
        <div class="dashboard-card">
            <div class="stat-header">
                <span class="card-title">Streak</span>
                <i class="fa-solid fa-fire" style="color: #e74c3c;"></i>
            </div>
            <div class="stat-value"><?php echo $user['streak']; ?></div>
        </div>

        <!-- Skill Points -->
        <div class="dashboard-card">
            <div class="stat-header">
                <span class="card-title">Skill Points</span>
                <i class="fa-solid fa-star" style="color: #f1c40f;"></i>
            </div>
            <div class="stat-value"><?php echo $user['skill_points']; ?></div>
        </div>
    </div>

    <!-- Skill Mastery / XP History -->
    <div class="dashboard-card">
        <div class="card-title">Skill Mastery / XP History</div>
        <div class="card-subtitle" style="margin-bottom: 15px;">Avg: 450 XP/day</div>
        
        <!-- SVG XP History Chart -->
        <svg viewBox="0 0 300 100" style="width: 100%; height: auto;">
            <path d="M 10,80 Q 75,20 150,60 T 290,90" fill="none" stroke="#7c4dff" stroke-width="3"/>
            <path d="M 10,90 Q 75,90 150,50 T 290,20" fill="none" stroke="#00d2b5" stroke-width="3"/>
            
            <circle cx="230" cy="30" r="5" fill="#00d2b5"/>
            <circle cx="120" cy="35" r="5" fill="#7c4dff"/>
        </svg>
    </div>

</div>

<!-- Bottom Navigation Bar -->
<div class="bottom-nav">
    <a href="shop.php" class="nav-item"><i class="fa-solid fa-cart-shopping"></i></a>
    <a href="parties.php" class="nav-item"><i class="fa-regular fa-copy"></i></a>
    <a href="quests.php" class="nav-item"><i class="fa-solid fa-shield-halved"></i></a>
    <a href="parties.php" class="nav-item"><i class="fa-solid fa-users"></i></a>
    <a href="profile.php" class="nav-item active"><i class="fa-solid fa-user"></i></a>
</div>

<script src="../assests/js/app.js"></script>
</body>
</html>