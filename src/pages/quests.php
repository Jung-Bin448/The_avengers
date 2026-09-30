<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quests - The Avengers</title>
    <link rel="stylesheet" href="../assests/css/style.css">
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

            <a href="dashboard.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="2"></rect>
                    <rect x="14" y="3" width="7" height="7" rx="2"></rect>
                    <rect x="14" y="14" width="7" height="7" rx="2"></rect>
                    <rect x="3" y="14" width="7" height="7" rx="2"></rect>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="quests.php" class="nav-item active">
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

    <!-- Main Content Area -->
    <main class="main-content main-quests-layout">
        <!-- Top Calendar Header Section -->
        <div class="calendar-header-row">
            <h2 class="calendar-date-display">01 Sep, 26 Tuesday</h2>
            <div class="calendar-nav-arrows">
                <button type="button" class="cal-arrow-btn">&lsaquo;</button>
                <button type="button" class="cal-arrow-btn">&rsaquo;</button>
            </div>
        </div>

        <!-- Monthly Calendar Widget Box -->
        <div class="calendar-widget-box">
            <div class="calendar-weekdays">
                <span>Sun</span>
                <span>Mon</span>
                <span>Tue</span>
                <span>Wed</span>
                <span>Thu</span>
                <span>Fri</span>
                <span>Sat</span>
            </div>
            <div class="calendar-days-grid">
                <!-- Week 1 -->
                <span class="day-cell"></span>
                <span class="day-cell"></span>
                <span class="day-cell active-selected">1</span>
                <span class="day-cell">2</span>
                <span class="day-cell">3</span>
                <span class="day-cell">4</span>
                <span class="day-cell">5</span>
                
                <!-- Week 2 -->
                <span class="day-cell">6</span>
                <span class="day-cell">7</span>
                <span class="day-cell">8</span>
                <span class="day-cell">9</span>
                <span class="day-cell">10</span>
                <span class="day-cell">11</span>
                <span class="day-cell">12</span>

                <!-- Week 3 -->
                <span class="day-cell">13</span>
                <span class="day-cell">14</span>
                <span class="day-cell">15</span>
                <span class="day-cell">16</span>
                <span class="day-cell">17</span>
                <span class="day-cell">18</span>
                <span class="day-cell">19</span>

                <!-- Week 4 -->
                <span class="day-cell">20</span>
                <span class="day-cell">21</span>
                <span class="day-cell">22</span>
                <span class="day-cell">23</span>
                <span class="day-cell">24</span>
                <span class="day-cell">25</span>
                <span class="day-cell">26</span>

                <!-- Week 5 -->
                <span class="day-cell">27</span>
                <span class="day-cell">28</span>
                <span class="day-cell">29</span>
                <span class="day-cell">30</span>
                <span class="day-cell">31</span>
                <span class="day-cell muted">1</span>
                <span class="day-cell muted">2</span>
            </div>
        </div>

        <!-- Today's Quests Header Row with Plus Button -->
        <div class="todays-quests-header">
            <div class="todays-title-group">
                <h3 class="todays-quests-heading">Today's Quests</h3>
                <span class="dropdown-arrow-icon">&#9662;</span>
            </div>
            <a href="create-quest.php" class="quests-add-btn" title="Create New Quest">
                <span>+</span>
            </a>
        </div>

        <!-- Quests Detailed List Block -->
        <div class="quests-list-container">
            <!-- 1. Main Quest -->
            <div class="quest-row-item">
                <div class="quest-item-left">
                    <div class="quest-category-label">
                        <span>MAIN QUEST</span>
                        <span class="cat-icon">⚔️</span>
                    </div>
                    <h4 class="quest-item-title">Defeat the Website Design Audit</h4>
                    <span class="quest-item-time">11:20 AM - 12:20 PM &bull; +150 XP</span>
                </div>
            </div>

            <!-- 2. Daily Habit -->
            <div class="quest-row-item">
                <div class="quest-item-left">
                    <div class="quest-category-label">
                        <span>DAILY HABIT</span>
                        <span class="cat-icon">⚡</span>
                    </div>
                    <h4 class="quest-item-title">Complete 30 Minutes of Code Practice</h4>
                    <span class="quest-item-time">3:00 PM - 3:30 PM &bull; +100 XP</span>
                </div>
            </div>

            <!-- 3. Side Quest -->
            <div class="quest-row-item">
                <div class="quest-item-left">
                    <div class="quest-category-label">
                        <span>SIDE QUEST</span>
                        <span class="cat-icon">🛡️</span>
                    </div>
                    <h4 class="quest-item-title">Alignment Sync with Client Guild</h4>
                    <span class="quest-item-time">12:30 PM - 1:00 PM &bull; +75 XP</span>
                </div>
            </div>

            <!-- 4. Milestone -->
            <div class="quest-row-item">
                <div class="quest-item-left">
                    <div class="quest-category-label">
                        <span>MILESTONE</span>
                        <span class="cat-icon">🏆</span>
                    </div>
                    <h4 class="quest-item-title">Submit Version 1.0 Milestone Build</h4>
                    <span class="quest-item-time">4:20 PM - 5:00 PM &bull; +500 XP</span>
                </div>
            </div>
        </div>
    </main>

</body>
</html>