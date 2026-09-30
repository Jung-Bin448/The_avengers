<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - The Avengers</title>
    <link rel="stylesheet" href="../assests/css/style.css">
    <link rel="stylesheet" href="../assests/css/dashboard.css">
</head>
<body class="dashboard-page-body">

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="collection.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1.5"></rect>
                    <rect x="14" y="3" width="7" height="7" rx="1.5"></rect>
                    <rect x="14" y="14" width="7" height="7" rx="1.5"></rect>
                    <rect x="3" y="14" width="7" height="7" rx="1.5"></rect>
                </svg>
                <span>Collection</span>
            </a>

            <a href="dashboard.php" class="nav-item active">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="2"></rect>
                    <rect x="14" y="3" width="7" height="7" rx="2"></rect>
                    <rect x="14" y="14" width="7" height="7" rx="2"></rect>
                    <rect x="3" y="14" width="7" height="7" rx="2"></rect>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="quests.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <span>Quest</span>
            </a>

            <a href="party.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Party</span>
            </a>

            <a href="profile.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Profile</span>
            </a>
        </nav>
    </aside>

    <!-- Main Dashboard Area -->
    <main class="main-content">
        <!-- Top Bar -->
        <header class="top-bar">
            <div class="user-greeting">
                <h1>Hi, Alex!</h1>
                <p class="subtitle">Level 5 Adventurer</p>
            </div>

            <div class="level-progress-wrapper">
                <span class="progress-label">Level Progress: 72%</span>
                <div class="progress-bar-bg">
                    <div class="progress-bar-fill" style="width: 72%;"></div>
                </div>
            </div>

            <div class="top-bar-actions">
                <button class="icon-btn notification-btn" title="Notifications">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Daily Quests Card -->
        <section class="quest-summary-card">
            <div class="quest-info">
                <h2>Daily Quests</h2>
                <p>2 of 5 Completed</p>
            </div>
            <div class="circular-progress">
                <svg viewBox="0 0 36 36" class="circular-chart">
                    <path class="circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <path class="circle" stroke-dasharray="40, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <text x="18" y="20.35" class="percentage">40%</text>
                </svg>
            </div>
        </section>

        <!-- Stats Grid -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon icon-energy">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                </div>
                <div class="stat-details">
                    <h3>Energy</h3>
                    <p class="stat-value">100 / 100</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon icon-gold">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 6v12M9 9h6M9 15h6" stroke="#121826" stroke-width="2"></path>
                    </svg>
                </div>
                <div class="stat-details">
                    <h3>Gold</h3>
                    <p class="stat-value">1,240</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon icon-streak">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2c0 0-6 4-6 10a6 6 0 0 0 12 0c0-6-6-10-6-10z"></path>
                    </svg>
                </div>
                <div class="stat-details">
                    <h3>Streak</h3>
                    <p class="stat-value">7 Days</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon icon-skills">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <polygon points="12 2 15 9 22 12 15 15 12 22 9 15 2 12 9 9 12 2"></polygon>
                    </svg>
                </div>
                <div class="stat-details">
                    <h3>Skill Points</h3>
                    <p class="stat-value">5 Available</p>
                </div>
            </div>
        </section>

        <!-- Skill Mastery / XP History Chart Card -->
        <section class="chart-card">
            <div class="chart-header">
                <h2>Skill Mastery / XP History</h2>
                <p class="chart-subtitle">Avg: 450 XP/day</p>
            </div>

            <div class="chart-container">
                <div class="y-axis">
                    <span>160</span>
                    <span>120</span>
                    <span>80</span>
                    <span>40</span>
                </div>

                <div class="chart-area">
                    <svg viewBox="0 0 500 150" class="chart-svg" preserveAspectRatio="none">
                        <!-- Grid Lines -->
                        <line x1="0" y1="10" x2="500" y2="10" class="grid-line" />
                        <line x1="0" y1="50" x2="500" y2="50" class="grid-line" />
                        <line x1="0" y1="90" x2="500" y2="90" class="grid-line" />
                        <line x1="0" y1="130" x2="500" y2="130" class="grid-line" />

                        <!-- Purple Curve -->
                        <path d="M 20 120 C 100 40, 180 20, 240 60 C 300 100, 380 140, 480 100" class="line-purple" />
                        <circle cx="20" cy="120" r="4" class="dot-purple" />
                        <circle cx="100" cy="70" r="4" class="dot-purple" />
                        <circle cx="220" cy="40" r="4" class="dot-purple" />
                        <circle cx="270" cy="70" r="4" class="dot-purple" />
                        <circle cx="330" cy="110" r="4" class="dot-purple" />
                        <circle cx="410" cy="130" r="4" class="dot-purple" />

                        <!-- Teal Curve -->
                        <path d="M 20 130 C 120 130, 220 95, 300 70 C 380 30, 420 40, 480 130" class="line-teal" />
                        <circle cx="20" cy="130" r="4" class="dot-teal" />
                        <circle cx="270" cy="95" r="4" class="dot-teal" />
                        <circle cx="380" cy="40" r="4" class="dot-teal" />
                        <circle cx="430" cy="70" r="4" class="dot-teal" />
                    </svg>

                    <!-- Add Button Overlay -->
                    <button class="chart-add-btn" title="Add Entry">+</button>
                </div>
            </div>
        </section>
    </main>

</body>
</html>