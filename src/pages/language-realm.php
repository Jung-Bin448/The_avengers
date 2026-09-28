<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language & Realm - Level Up Life</title>
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
            <a href="settings.php" class="back-link"><i class="fa-solid fa-chevron-left"></i> Language / Realm</a>
        </header>

        <div class="settings-sub-container">
            <div class="section-group">
                <span class="section-label">GAME LANGUAGE</span>
                <div class="setting-row-box click-box">
                    <div class="setting-row-left">
                        <i class="fa-solid fa-globe setting-icon"></i>
                        <span class="font-bold">English (US)</span>
                    </div>
                    <i class="fa-solid fa-chevron-right arrow-icon"></i>
                </div>
            </div>

            <div class="section-group">
                <span class="section-label">SERVER REALM</span>
                <div class="setting-row-box click-box">
                    <div class="setting-row-left">
                        <i class="fa-solid fa-chess-rook setting-icon"></i>
                        <span class="font-bold">North America (NA-East)</span>
                    </div>
                    <span class="status-badge green">Low Latency (32ms)</span>
                </div>
            </div>
        </div>
    </main>

</body>
</html>