<?php
session_start();

// Auth Check
if (!isset($_SESSION['user_id']) && !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level Up Life - Quests</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        body { background-color: #0b0f19; color: #ffffff; min-height: 100vh; display: flex; justify-content: center; padding-bottom: 70px; }
        .app-container { width: 100%; max-width: 414px; padding: 20px; display: flex; flex-direction: column; gap: 18px; }

        .date-header { display: flex; justify-content: space-between; align-items: center; }
        .date-title { font-size: 20px; font-weight: 700; }
        .date-title span { color: #6c727f; font-weight: 400; font-size: 16px; margin-left: 6px; }
        .nav-arrows { color: #8a8f9d; font-size: 16px; letter-spacing: 4px; cursor: pointer; }

        .calendar-card { background: #151c2c; border-radius: 20px; padding: 16px; }
        .weekdays, .days { display: grid; grid-template-columns: repeat(7, 1fr); text-align: center; font-size: 12px; }
        .weekdays { color: #6c727f; margin-bottom: 12px; }
        .days div { padding: 8px 0; color: #d0d4e0; font-weight: 500; }
        .days .active-day { background: #8a5cf5; color: #ffffff; border-radius: 50%; width: 28px; height: 28px; margin: 0 auto; display: flex; align-items: center; justify-content: center; }

        .quests-header { display: flex; justify-content: space-between; align-items: center; margin-top: 5px; }
        .quests-title { font-size: 20px; font-weight: 700; display: flex; align-items: center; gap: 6px; }
        .add-btn { background: linear-gradient(135deg, #7952f5, #9b51e0); border: none; width: 38px; height: 38px; border-radius: 50%; color: #fff; font-size: 18px; cursor: pointer; display: flex; align-items: center; justify-content: center; }

        .quest-item { padding-bottom: 14px; border-bottom: 1px solid #1a2235; }
        .quest-item:last-child { border-bottom: none; }
        .quest-type { font-size: 14px; font-weight: 800; letter-spacing: 0.5px; display: flex; align-items: center; gap: 6px; text-transform: uppercase; margin-bottom: 6px; }
        .quest-title { font-size: 14px; font-weight: 600; color: #ffffff; margin-bottom: 4px; }
        .quest-meta { font-size: 12px; color: #6c727f; }

        .bottom-nav { position: fixed; bottom: 0; left: 50%; transform: translateX(-50%); width: 100%; max-width: 414px; background: #0e1422; border-top: 1px solid #1a2235; display: flex; justify-content: space-around; padding: 12px 0; z-index: 100; }
        .nav-item { color: #50586c; font-size: 20px; text-decoration: none; transition: color 0.2s; }
        .nav-item.active { color: #ffffff; }
        .nav-item.gold { color: #e5b800; }
    </style>
</head>
<body>

    <div class="app-container">
        <!-- Date Header -->
        <div class="date-header">
            <div class="date-title">01 Sep, 26 <span>Tuesday</span></div>
            <div class="nav-arrows">&lt; &gt;</div>
        </div>

        <!-- Calendar Component -->
        <div class="calendar-card">
            <div class="weekdays">
                <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
            </div>
            <div class="days">
                <div></div><div></div><div class="active-day">1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                <div>6</div><div>7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div>
                <div>13</div><div>14</div><div>15</div><div>16</div><div>17</div><div>18</div><div>19</div>
                <div>20</div><div>21</div><div>22</div><div>23</div><div>24</div><div>25</div><div>26</div>
                <div>27</div><div>28</div><div>29</div><div>30</div><div>31</div>
            </div>
        </div>

        <!-- Section Title & Add Button -->
        <div class="quests-header">
            <div class="quests-title">
                Today's Quests <i class="fa-solid fa-chevron-down" style="font-size: 14px; margin-left: 4px;"></i>
            </div>
            <button class="add-btn"><i class="fa-solid fa-plus"></i></button>
        </div>

        <!-- Quest List -->
        <div class="quest-item">
            <div class="quest-type">MAIN QUEST <i class="fa-solid fa-swords" style="font-size: 13px;"></i></div>
            <div class="quest-title">Defeat the Website Design Audit</div>
            <div class="quest-meta">11:20 AM - 12:20 PM • +150 XP</div>
        </div>

        <div class="quest-item">
            <div class="quest-type">SIDE QUEST <i class="fa-solid fa-shield-halved" style="font-size: 13px;"></i></div>
            <div class="quest-title">Alignment Sync with Client Guild</div>
            <div class="quest-meta">12:30 PM - 1:00 PM • +75 XP</div>
        </div>

        <div class="quest-item">
            <div class="quest-type">DAILY HABIT <i class="fa-solid fa-bolt" style="font-size: 13px; color: #ffbe2e;"></i></div>
            <div class="quest-title">Complete 30 Minutes of Code Practice</div>
            <div class="quest-meta">3:00 PM - 3:30 PM • +100 XP</div>
        </div>

        <div class="quest-item">
            <div class="quest-type">MILESTONE <i class="fa-solid fa-trophy" style="font-size: 13px; color: #ffbe2e;"></i></div>
            <div class="quest-title">Submit Version 1.0 Milestone Build</div>
            <div class="quest-meta">4:20 PM - 5:00 PM • +500 XP</div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
        <a href="#" class="nav-item gold"><i class="fa-solid fa-cart-shopping"></i></a>
        <a href="#" class="nav-item"><i class="fa-regular fa-copy"></i></a>
        <a href="quests.php" class="nav-item active"><i class="fa-solid fa-swords"></i></a>
        <a href="#" class="nav-item"><i class="fa-solid fa-user-group"></i></a>
        <a href="dashboard.php" class="nav-item"><i class="fa-solid fa-user"></i></a>
    </nav>

</body>
</html>