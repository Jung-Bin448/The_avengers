<?php
// pages/settings.php

$nav_items = [
    ['title' => 'Collection', 'icon' => 'fas fa-layer-group', 'url' => 'collection.php'],
    ['title' => 'Dashboard',  'icon' => 'fas fa-border-all',  'url' => 'dashboard.php'],
    ['title' => 'Quest',      'icon' => 'fas fa-khanda',      'url' => 'quest.php'],
    ['title' => 'Party',      'icon' => 'fas fa-users',       'url' => 'parties.php'],
    ['title' => 'Profile',    'icon' => 'fas fa-user',        'url' => 'profile.php']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="settings.css">
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <?php foreach ($nav_items as $nav): ?>
            <?php $isActive = ($nav['title'] === 'Profile') ? 'active' : ''; ?>
            <a href="<?php echo htmlspecialchars($nav['url']); ?>" class="nav-item <?php echo $isActive; ?>">
                <i class="<?php echo htmlspecialchars($nav['icon']); ?>"></i>
                <?php echo htmlspecialchars($nav['title']); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">Settings</h1>
            <p class="page-subtitle">Customize your adventure experience</p>
        </div>

        <div class="settings-grid">
            <!-- Account Section -->
            <div class="settings-card">
                <h2 class="card-title">Account</h2>
                
                <a href="edit-profile.php" class="setting-item">
                    <i class="fas fa-user-edit"></i>
                    <span>Edit Character Name & Avatar</span>
                    <span class="arrow">&gt;</span>
                </a>

                <a href="connected-accounts.php" class="setting-item">
                    <i class="fas fa-link"></i>
                    <span>Connected Guild Accounts</span>
                    <span class="arrow">&gt;</span>
                </a>

                <a href="delete-account.php" class="setting-item">
                    <i class="fas fa-trash-can"></i>
                    <span>Delete Account</span>
                    <span class="arrow">&gt;</span>
                </a>

                <a href="logout.php" class="setting-item">
                    <i class="fas fa-right-from-bracket"></i>
                    <span>Log Out</span>
                    <span class="arrow">&gt;</span>
                </a>
            </div>

            <!-- Preferences Section -->
            <div class="settings-card">
                <h2 class="card-title">Preferences</h2>

                <a href="#" class="setting-item">
                    <i class="fas fa-music"></i>
                    <span>Sound Effects & Quest Audio</span>
                    <span class="arrow">&gt;</span>
                </a>

                <a href="#" class="setting-item">
                    <i class="fas fa-bell"></i>
                    <span>Boss Reminders & Push Notifications</span>
                    <span class="arrow">&gt;</span>
                </a>
            </div>

            <!-- Danger Zone Section -->
            <div class="settings-card danger-card">
                <h2 class="card-title">Danger Zone</h2>

                <a href="#" class="setting-item">
                    <i class="fas fa-triangle-exclamation"></i>
                    <span>Reset Character Progress</span>
                    <span class="arrow">&gt;</span>
                </a>
            </div>

            <!-- System Section -->
            <div class="settings-card">
                <h2 class="card-title">System</h2>

                <a href="#" class="setting-item">
                    <i class="fas fa-moon"></i>
                    <span>Dark Theme Intensity</span>
                    <span class="arrow">&gt;</span>
                </a>

                <a href="#" class="setting-item">
                    <i class="fas fa-globe"></i>
                    <span>Language / Realm</span>
                    <span class="arrow">&gt;</span>
                </a>
            </div>
        </div>
    </div>

</body>
</html>