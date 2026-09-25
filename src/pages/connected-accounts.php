<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected Guild Accounts - Level Up Life</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../assests/css/Style.css">
</head>
<body class="dashboard-layout">

    <!-- Desktop Sidebar -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="collection.php" class="nav-link">
                <i class="fa-regular fa-folder-open"></i>
                <span>Collection</span>
            </a>
            <a href="/pagedashboard.php" class="nav-link">
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
    <main class="dashboard-main subpage-container">

        <!-- Back Header -->
        <a href="settings.php" class="subpage-back-link">
            <i class="fa-solid fa-chevron-left"></i> Connected Guild Accounts
        </a>

        <div class="guild-accounts-list">
            
            <!-- Discord Row -->
            <div class="guild-account-card">
                <div class="guild-account-info">
                    <i class="fa-brands fa-discord guild-icon"></i>
                    <span class="guild-name">Discord</span>
                </div>
                <div class="guild-account-action">
                    <span class="status-badge connected">Connected</span>
                    <button class="btn-guild-action disconnect" type="button">Disconnect</button>
                </div>
            </div>

            <!-- Google Play Games Row -->
            <div class="guild-account-card">
                <div class="guild-account-info">
                    <i class="fa-solid fa-gamepad guild-icon"></i>
                    <span class="guild-name">Google Play Games</span>
                </div>
                <div class="guild-account-action">
                    <span class="status-badge connected">Connected</span>
                    <button class="btn-guild-action disconnect" type="button">Disconnect</button>
                </div>
            </div>

            <!-- Steam Row -->
            <div class="guild-account-card">
                <div class="guild-account-info">
                    <i class="fa-brands fa-steam guild-icon"></i>
                    <span class="guild-name">Steam</span>
                </div>
                <div class="guild-account-action">
                    <span class="status-badge not-connected">Not Connected</span>
                    <button class="btn-guild-action connect" type="button">Connect</button>
                </div>
            </div>

        </div>

    </main>

    <!-- Mobile Bottom Navigation Bar -->
    <nav class="mobile-bottom-nav">
        <a href="quests.php" class="mobile-nav-link">
            <i class="fa-regular fa-folder-open"></i>
            <span>Collection</span>
        </a>
        <a href="dashboard.php" class="mobile-nav-link">
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