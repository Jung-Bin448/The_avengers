<?php
session_start();

// Mock quest data matching your screenshot design
$quests = [
    [
        'type' => 'MAIN QUEST',
        'icon' => 'fa-solid fa-swords',
        'title' => 'Defeat the Website Design Audit',
        'time' => '11:20 AM - 12:20 PM',
        'xp' => '+150 XP'
    ],
    [
        'type' => 'SIDE QUEST',
        'icon' => 'fa-solid fa-shield-halved',
        'title' => 'Alignment Sync with Client Guild',
        'time' => '12:30 PM - 1:00 PM',
        'xp' => '+75 XP'
    ],
    [
        'type' => 'DAILY HABIT',
        'icon' => 'fa-solid fa-bolt',
        'title' => 'Complete 30 Minutes of Code Practice',
        'time' => '3:00 PM - 3:30 PM',
        'xp' => '+100 XP'
    ],
    [
        'type' => 'MILESTONE',
        'icon' => 'fa-solid fa-trophy',
        'title' => 'Submit Version 1.0 Milestone Build',
        'time' => '4:20 PM - 5:00 PM',
        'xp' => '+500 XP'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level Up Life - Quests</title>
    <link rel="stylesheet" href="../assests/css/Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<div class="app-container">

    <!-- Top Date Header -->
    <div class="calendar-header">
        <div class="calendar-date">
            01 Sep, 26 <span>Tuesday</span>
        </div>
        <div>
            <i class="fa-solid fa-chevron-left" style="margin-right: 12px; cursor: pointer;"></i>
            <i class="fa-solid fa-chevron-right" style="cursor: pointer;"></i>
        </div>
    </div>

    <!-- Calendar View -->
    <div class="dashboard-card">
        <div class="calendar-grid">
            <div class="day-name">Sun</div>
            <div class="day-name">Mon</div>
            <div class="day-name">Tue</div>
            <div class="day-name">Wed</div>
            <div class="day-name">Thu</div>
            <div class="day-name">Fri</div>
            <div class="day-name">Sat</div>

            <!-- Row 1 -->
            <div class="day-number"></div>
            <div class="day-number"></div>
            <div class="day-number active">1</div>
            <div class="day-number">2</div>
            <div class="day-number">3</div>
            <div class="day-number">4</div>
            <div class="day-number">5</div>

            <!-- Row 2 -->
            <div class="day-number">6</div>
            <div class="day-number">7</div>
            <div class="day-number">8</div>
            <div class="day-number">9</div>
            <div class="day-number">10</div>
            <div class="day-number">11</div>
            <div class="day-number">12</div>

            <!-- Row 3 -->
            <div class="day-number">13</div>
            <div class="day-number">14</div>
            <div class="day-number">15</div>
            <div class="day-number">16</div>
            <div class="day-number">17</div>
            <div class="day-number">18</div>
            <div class="day-number">19</div>

            <!-- Row 4 -->
            <div class="day-number">20</div>
            <div class="day-number">21</div>
            <div class="day-number">22</div>
            <div class="day-number">23</div>
            <div class="day-number">24</div>
            <div class="day-number">25</div>
            <div class="day-number">26</div>

            <!-- Row 5 -->
            <div class="day-number">27</div>
            <div class="day-number">28</div>
            <div class="day-number">29</div>
            <div class="day-number">30</div>
            <div class="day-number">31</div>
            <div class="day-number"></div>
            <div class="day-number"></div>
        </div>
    </div>

    <!-- Quests Section -->
    <div class="quests-title-row">
        <div style="font-size: 20px; font-weight: bold;">
            Today's Quests <i class="fa-solid fa-chevron-down" style="font-size: 14px; margin-left: 5px;"></i>
        </div>
        <button class="add-quest-btn"><i class="fa-solid fa-plus"></i></button>
    </div>

    <!-- Quest List -->
    <div class="quests-list">
        <?php foreach ($quests as $quest): ?>
            <div class="quest-item">
                <div class="quest-type">
                    <span><?php echo $quest['type']; ?></span>
                    <i class="<?php echo $quest['icon']; ?>"></i>
                </div>
                <div class="quest-name"><?php echo $quest['title']; ?></div>
                <div class="quest-meta"><?php echo $quest['time']; ?> • <?php echo $quest['xp']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<!-- Bottom Navigation Bar -->
<div class="bottom-nav">
    <a href="shop.php" class="nav-item"><i class="fa-solid fa-cart-shopping"></i></a>
    <a href="parties.php" class="nav-item"><i class="fa-regular fa-copy"></i></a>
    <a href="quests.php" class="nav-item active"><i class="fa-solid fa-shield-halved"></i></a>
    <a href="parties.php" class="nav-item"><i class="fa-solid fa-users"></i></a>
    <a href="profile.php" class="nav-item"><i class="fa-solid fa-user"></i></a>
</div>

<script src="../assests/js/app.js"></script>
</body>
</html>