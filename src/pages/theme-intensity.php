<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Theme Intensity - Level Up Life</title>
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
            <a href="settings.php" class="back-link"><i class="fa-solid fa-chevron-left"></i> Dark Theme Intensity</a>
        </header>

        <div class="settings-sub-container">
            <label class="radio-option-card">
                <div class="radio-info">
                    <span class="radio-title">Midnight Black (OLED)</span>
                    <span class="radio-desc">Pure black background for OLED screens</span>
                </div>
                <input type="radio" name="theme_intensity" value="midnight">
                <span class="radio-circle"></span>
            </label>

            <label class="radio-option-card active">
                <div class="radio-info">
                    <span class="radio-title">Abyssal Navy</span>
                    <span class="radio-desc">Deep navy tones optimized for fantasy immersion</span>
                </div>
                <input type="radio" name="theme_intensity" value="abyssal" checked>
                <span class="radio-circle"></span>
            </label>

            <label class="radio-option-card">
                <div class="radio-info">
                    <span class="radio-title">Dungeon Charcoal</span>
                    <span class="radio-desc">Soft muted charcoal gray for low-light environments</span>
                </div>
                <input type="radio" name="theme_intensity" value="charcoal">
                <span class="radio-circle"></span>
            </label>
        </div>
    </main>

</body>
</html>