<?php
$current_page = 'party';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party - Level Up Life</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- App Stylesheets -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <div class="app-container">
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <a href="collection.php" class="nav-item <?php echo ($current_page == 'collection') ? 'active' : ''; ?>">
                <i class="fa-regular fa-folder"></i>
                <span>Collection</span>
            </a>
            <a href="dashboard.php" class="nav-item <?php echo ($current_page == 'dashboard') ? 'active' : ''; ?>">
                <i class="fa-solid fa-border-all"></i>
                <span>Dashboard</span>
            </a>
            <a href="quests.php" class="nav-item <?php echo ($current_page == 'quests') ? 'active' : ''; ?>">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Quest</span>
            </a>
            <a href="party.php" class="nav-item <?php echo ($current_page == 'party') ? 'active' : ''; ?>">
                <i class="fa-solid fa-users"></i>
                <span>Party</span>
            </a>
            <a href="profile.php" class="nav-item <?php echo ($current_page == 'profile') ? 'active' : ''; ?>">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
        </aside>

        <!-- Main Workspace Canvas -->
        <main class="main-content">
            <div class="party-container-card">
                
                <!-- Party Header -->
                <div class="party-header">
                    <h2 class="party-title">Direct Messages</h2>
                    <button type="button" class="party-add-btn" title="Create New Group">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>

                <!-- Group List -->
                <div class="party-list">
                    
                    <a href="chat.php?group=Guild+Raid+Squad" class="party-item">
                        <div class="party-avatar-container">
                            <div class="party-avatar"></div>
                            <span class="status-indicator online"></span>
                        </div>
                        <div class="party-info">
                            <h3 class="party-group-name">Guild Raid Squad</h3>
                            <p class="party-group-status">4 members online</p>
                        </div>
                        <span class="party-timestamp">8:06</span>
                    </a>

                    <a href="chat.php?group=Alchemist+Party" class="party-item">
                        <div class="party-avatar-container">
                            <div class="party-avatar"></div>
                        </div>
                        <div class="party-info">
                            <h3 class="party-group-name">Alchemist Party</h3>
                        </div>
                        <span class="party-timestamp">Yesterday</span>
                    </a>

                    <a href="chat.php?group=Tank+%26+Healer+Main" class="party-item">
                        <div class="party-avatar-container">
                            <div class="party-avatar"></div>
                            <span class="status-indicator online"></span>
                        </div>
                        <div class="party-info">
                            <h3 class="party-group-name">Tank & Healer Main</h3>
                            <p class="party-group-status">6 members online</p>
                        </div>
                        <span class="party-timestamp">Sunday</span>
                    </a>

                    <a href="chat.php?group=Dragon+Slayers+Club" class="party-item">
                        <div class="party-avatar-container">
                            <div class="party-avatar"></div>
                        </div>
                        <div class="party-info">
                            <h3 class="party-group-name">Dragon Slayers Club</h3>
                        </div>
                        <span class="party-timestamp">Thursday</span>
                    </a>

                </div>
            </div>
        </main>
    </div>
</body>
</html>