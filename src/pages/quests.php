<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quests - Level Up Life</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
            <a href="quests.php" class="nav-link active">
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

    <!-- Main Content Area -->
    <main class="dashboard-main">

        <!-- Monthly Calendar View -->
        <section class="calendar-card">
            <div class="calendar-header">
                <h2>01 Sep, 26 <span style="color: #94a3b8; font-weight: 400; font-size: 16px;">Tuesday</span></h2>
                <div class="calendar-nav-btns">
                    <button class="cal-nav-btn" type="button">&lt;</button>
                    <button class="cal-nav-btn" type="button">&gt;</button>
                </div>
            </div>

            <div class="calendar-grid">
                <!-- Day Labels -->
                <div class="cal-day-label">Sun</div>
                <div class="cal-day-label">Mon</div>
                <div class="cal-day-label">Tue</div>
                <div class="cal-day-label">Wed</div>
                <div class="cal-day-label">Thu</div>
                <div class="cal-day-label">Fri</div>
                <div class="cal-day-label">Sat</div>

                <!-- Row 1 -->
                <div class="cal-date-cell"></div>
                <div class="cal-date-cell"></div>
                <div class="cal-date-cell active-date">1</div>
                <div class="cal-date-cell">2</div>
                <div class="cal-date-cell">3</div>
                <div class="cal-date-cell">4</div>
                <div class="cal-date-cell">5</div>

                <!-- Row 2 -->
                <div class="cal-date-cell">6</div>
                <div class="cal-date-cell">7</div>
                <div class="cal-date-cell">8</div>
                <div class="cal-date-cell">9</div>
                <div class="cal-date-cell">10</div>
                <div class="cal-date-cell">11</div>
                <div class="cal-date-cell">12</div>

                <!-- Row 3 -->
                <div class="cal-date-cell">13</div>
                <div class="cal-date-cell">14</div>
                <div class="cal-date-cell">15</div>
                <div class="cal-date-cell">16</div>
                <div class="cal-date-cell">17</div>
                <div class="cal-date-cell">18</div>
                <div class="cal-date-cell">19</div>

                <!-- Row 4 -->
                <div class="cal-date-cell">20</div>
                <div class="cal-date-cell">21</div>
                <div class="cal-date-cell">22</div>
                <div class="cal-date-cell">23</div>
                <div class="cal-date-cell">24</div>
                <div class="cal-date-cell">25</div>
                <div class="cal-date-cell">26</div>

                <!-- Row 5 -->
                <div class="cal-date-cell">27</div>
                <div class="cal-date-cell">28</div>
                <div class="cal-date-cell">29</div>
                <div class="cal-date-cell">30</div>
                <div class="cal-date-cell">31</div>
                <div class="cal-date-cell"></div>
                <div class="cal-date-cell"></div>
            </div>
        </section>

        <!-- Quests List -->
        <section class="quests-section">
            <div class="quests-section-header">
                <h2>Today's Quests</h2>
                <i class="fa-solid fa-chevron-down" style="font-size: 16px; color: #94a3b8;"></i>
            </div>

            <div class="quest-list">
                
                <!-- Main Quest -->
                <div class="quest-item">
                    <div class="quest-type-tag">
                        MAIN QUEST <i class="fa-solid fa-swords" style="color: #ffffff;"></i>
                    </div>
                    <div class="quest-title">Defeat the Website Design Audit</div>
                    <div class="quest-meta">11:20 AM - 12:20 PM • +150 XP</div>
                </div>

                <!-- Daily Habit -->
                <div class="quest-item">
                    <div class="quest-type-tag">
                        DAILY HABIT <i class="fa-solid fa-bolt" style="color: #eab308;"></i>
                    </div>
                    <div class="quest-title">Complete 30 Minutes of Code Practice</div>
                    <div class="quest-meta">3:00 PM - 3:30 PM • +100 XP</div>
                </div>

                <!-- Side Quest -->
                <div class="quest-item">
                    <div class="quest-type-tag">
                        SIDE QUEST <i class="fa-regular fa-shield" style="color: #38bdf8;"></i>
                    </div>
                    <div class="quest-title">Alignment Sync with Client Guild</div>
                    <div class="quest-meta">12:30 PM - 1:00 PM • +75 XP</div>
                </div>

                <!-- Milestone -->
                <div class="quest-item">
                    <div class="quest-type-tag">
                        MILESTONE <i class="fa-solid fa-trophy" style="color: #f59e0b;"></i>
                    </div>
                    <div class="quest-title">Submit Version 1.0 Milestone Build</div>
                    <div class="quest-meta">4:20 PM - 5:00 PM • +500 XP</div>
                </div>

            </div>

            <!-- Floating Add Button -->
            <button class="fab-btn" type="button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </section>

    </main>

    <!-- Mobile Bottom Navigation Bar -->
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

</body>
</html>