<?php
session_start();

// Auth Check
if (!isset($_SESSION['user_id']) && !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'] ?? 'Alex';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level Up Life - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        body { background-color: #0b0f19; color: #ffffff; min-height: 100vh; display: flex; justify-content: center; padding-bottom: 70px; }
        .app-container { width: 100%; max-width: 414px; padding: 24px 20px; display: flex; flex-direction: column; gap: 20px; }
        
        .header { display: flex; justify-content: space-between; align-items: flex-start; }
        .header h1 { font-size: 28px; font-weight: 700; }
        .header p { color: #8a8f9d; font-size: 14px; margin-top: 4px; }
        .icon-btn { background: transparent; border: none; color: #ffffff; font-size: 20px; cursor: pointer; }

        .progress-section { margin-top: 5px; }
        .progress-label { font-size: 13px; color: #a0a5b5; margin-bottom: 8px; font-weight: 500; }
        .bar-bg { width: 100%; height: 8px; background: #1a2030; border-radius: 10px; overflow: hidden; }
        .bar-fill { width: 72%; height: 100%; background: #00e5a3; border-radius: 10px; }

        .card { background: #151c2c; border-radius: 18px; padding: 18px; position: relative; }
        .card-title { font-size: 15px; font-weight: 600; color: #ffffff; }
        .card-sub { font-size: 12px; color: #8a8f9d; margin-top: 4px; }

        .daily-quests-card { display: flex; justify-content: space-between; align-items: center; }
        .circle-progress { width: 54px; height: 54px; border-radius: 50%; background: conic-gradient(#00e5a3 40%, #1d283a 0); display: flex; align-items: center; justify-content: center; position: relative; }
        .circle-progress::before { content: ""; position: absolute; width: 42px; height: 42px; background: #151c2c; border-radius: 50%; }
        .circle-text { position: relative; font-size: 12px; font-weight: bold; color: #00e5a3; }

        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .stat-card { display: flex; justify-content: space-between; align-items: flex-start; }
        .stat-value { font-size: 16px; font-weight: 700; margin-top: 12px; color: #ffffff; }
        .stat-icon { font-size: 18px; }

        .chart-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .chart-avg { font-size: 11px; color: #8a8f9d; }
        .chart-svg { width: 100%; height: 100px; overflow: visible; }

        .fab { position: absolute; right: 15px; bottom: 15px; width: 36px; height: 36px; background: #ffffff; color: #0b0f19; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; cursor: pointer; text-decoration: none; }

        .bottom-nav { position: fixed; bottom: 0; left: 50%; transform: translateX(-50%); width: 100%; max-width: 414px; background: #0e1422; border-top: 1px solid #1a2235; display: flex; justify-content: space-around; padding: 12px 0; z-index: 100; }
        .nav-item { color: #50586c; font-size: 20px; text-decoration: none; transition: color 0.2s; }
        .nav-item.active { color: #a0a5b5; }
        .nav-item.gold { color: #e5b800; }
    </style>
</head>
<body>

    <div class="app-container">
        <!-- Header -->
        <div class="header">
            <div>
                <h1>Hi,<?php echo htmlspecialchars($username); ?>!</h1>
                <p>Level 5 Adventurer</p>
            </div>
            <button class="icon-btn"><i class="fa-regular fa-bell"></i></button>
        </div>

        <!-- Level Progress -->
        <div class="progress-section">
            <div class="progress-label">Level Progress: 72%</div>
            <div class="bar-bg"><div class="bar-fill"></div></div>
        </div>

        <!-- Daily Quests -->
        <div class="card daily-quests-card">
            <div>
                <div class="card-title">Daily Quests</div>
                <div class="card-sub">2 of 5 Completed</div>
            </div>
            <div class="circle-progress">
                <span class="circle-text">40%</span>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid">
            <div class="card stat-card">
                <div>
                    <div class="card-title">Energy</div>
                    <div class="stat-value">100 / 100</div>
                </div>
                <span class="stat-icon" style="color: #e5b800;"><i class="fa-solid fa-bolt"></i></span>
            </div>

            <div class="card stat-card">
                <div>
                    <div class="card-title">Gold</div>
                    <div class="stat-value">1,240</div>
                </div>
                <span class="stat-icon" style="color: #ffbd2e;"><i class="fa-solid fa-coins"></i></span>
            </div>

            <div class="card stat-card">
                <div>
                    <div class="card-title">Streak</div>
                    <div class="stat-value">7 Days</div>
                </div>
                <span class="stat-icon" style="color: #38b6ff;"><i class="fa-solid fa-globe"></i></span>
            </div>

            <div class="card stat-card">
                <div>
                    <div class="card-title">Skill Points</div>
                    <div class="stat-value">5 Available</div>
                </div>
                <span class="stat-icon" style="color: #ffde59;"><i class="fa-solid fa-sparkles"></i></span>
            </div>
        </div>

        <!-- XP Chart Card -->
        <div class="card">
            <div class="chart-header">
                <div>
                    <div class="card-title">Skill Mastery / XP History</div>
                    <div class="chart-avg">Avg: 450 XP/day</div>
                </div>
            </div>
            <svg class="chart-svg" viewBox="0 0 300 100">
                <path d="M 0,60 Q 75,0 150,50 T 300,60" fill="none" stroke="#a259ff" stroke-width="3"/>
                <path d="M 0,80 Q 75,80 150,40 T 300,100" fill="none" stroke="#00e5a3" stroke-width="3"/>
                <circle cx="200" cy="20" r="4" fill="#00e5a3"/>
            </svg>
            <a href="quests.php" class="fab"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
        <a href="#" class="nav-item gold"><i class="fa-solid fa-cart-shopping"></i></a>
        <a href="#" class="nav-item"><i class="fa-regular fa-copy"></i></a>
        <a href="quests.php" class="nav-item"><i class="fa-solid fa-swords"></i></a>
        <a href="#" class="nav-item"><i class="fa-solid fa-user-group"></i></a>
        <a href="dashboard.php" class="nav-item active"><i class="fa-solid fa-user"></i></a>
    </nav>

</body>
</html>