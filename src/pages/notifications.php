<?php
$current_page = 'settings';

// Notification toggles configuration
$notifications = [
    [
        'id' => 'boss_raid',
        'title' => 'Boss Raid Alerts',
        'checked' => true
    ],
    [
        'id' => 'daily_quest',
        'title' => 'Daily Quest Resets',
        'checked' => false
    ],
    [
        'id' => 'party_invites',
        'title' => 'Party Invites & Messages',
        'checked' => true
    ],
    [
        'id' => 'streak_saver',
        'title' => 'Streak Saver Warning',
        'checked' => false
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boss Reminders & Push Notifications - Level Up Life</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- App Stylesheet -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <div class="app-container">
        
        <!-- Standardized Sidebar Navigation -->
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
            
            <!-- Header with Back Button -->
            <div class="top-header">
                <a href="settings.php" class="back-link-title">
                    <i class="fa-solid fa-chevron-left"></i>
                    <h2>Boss Reminders & Push Notifications</h2>
                </a>
            </div>

            <!-- Notifications Workspace Card -->
            <div class="dashboard-card notifications-card">
                <div class="notifications-list">
                    <?php foreach ($notifications as $item): ?>
                        <div class="notification-row">
                            <div class="notification-label-group">
                                <i class="fa-solid fa-bell"></i>
                                <span class="notification-title"><?php echo $item['title']; ?></span>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" id="<?php echo $item['id']; ?>" <?php echo $item['checked'] ? 'checked' : ''; ?>>
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </main>
    </div>
</body>
</html>