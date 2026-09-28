<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Level Up Life</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body class="dashboard-layout">

    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="quests.php" class="nav-link"><i class="fa-regular fa-folder-open"></i><span>Collection</span></a>
            <a href="dashboard.php" class="nav-link"><i class="fa-solid fa-swords"></i><span>Quest</span></a>
            <a href="parties.php" class="nav-link"><i class="fa-solid fa-users"></i><span>Party</span></a>
            <a href="profile.php" class="nav-link"><i class="fa-regular fa-user"></i><span>Profile</span></a>
        </nav>
    </aside>

    <main class="dashboard-main">
        <header class="settings-sub-header">
            <a href="settings.php" class="back-link"><i class="fa-solid fa-chevron-left"></i> Boss Reminders & Push Notifications</a>
        </header>

        <div class="settings-sub-container">
            <div class="setting-row-box">
                <div class="setting-row-left">
                    <i class="fa-regular fa-bell setting-icon"></i>
                    <span>Boss Raid Alerts</span>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="setting-row-box">
                <div class="setting-row-left">
                    <i class="fa-regular fa-bell setting-icon"></i>
                    <span>Daily Quest Resets</span>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="setting-row-box">
                <div class="setting-row-left">
                    <i class="fa-regular fa-bell setting-icon"></i>
                    <span>Party Invites & Messages</span>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="setting-row-box">
                <div class="setting-row-left">
                    <i class="fa-regular fa-bell setting-icon"></i>
                    <span>Streak Saver Warning</span>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="toggle-slider"></span>
                </label>
            </div>
        </div>
    </main>

</body>
</html>