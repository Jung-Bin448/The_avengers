<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound Settings - Level Up Life</title>
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
            <a href="settings.php" class="back-link"><i class="fa-solid fa-chevron-left"></i> Sound Effects & Quest Audio</a>
        </header>

        <div class="settings-sub-container">
            <div class="setting-row-box">
                <div class="setting-row-left">
                    <i class="fa-solid fa-volume-high setting-icon"></i>
                    <span>Master Volume</span>
                </div>
                <div class="slider-group">
                    <input type="range" min="0" max="100" value="90" class="custom-range">
                    <span class="range-val">90%</span>
                </div>
            </div>

            <div class="setting-row-box">
                <div class="setting-row-left">
                    <i class="fa-solid fa-music setting-icon"></i>
                    <span>Sound Effects (SFX)</span>
                </div>
                <div class="slider-group">
                    <input type="range" min="0" max="100" value="70" class="custom-range">
                    <span class="range-val">70%</span>
                </div>
            </div>

            <div class="setting-row-box">
                <div class="setting-row-left">
                    <i class="fa-solid fa-compact-disc setting-icon"></i>
                    <span>Quest / Background Music</span>
                </div>
                <div class="slider-group">
                    <input type="range" min="0" max="100" value="50" class="custom-range">
                    <span class="range-val">50%</span>
                </div>
            </div>
        </div>
    </main>

</body>
</html>