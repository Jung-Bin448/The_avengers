<?php
$current_page = 'settings';

// Mock list of guild accounts
$accounts = [
    [
        'id' => 'discord',
        'name' => 'Discord',
        'icon' => 'fa-discord',
        'connected' => true
    ],
    [
        'id' => 'google_play',
        'name' => 'Google Play Games',
        'icon' => 'fa-google-play',
        'connected' => true
    ],
    [
        'id' => 'steam',
        'name' => 'Steam',
        'icon' => 'fa-steam',
        'connected' => false
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected Guild Accounts - Level Up Life</title>
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
                    <h2>Connected Guild Accounts</h2>
                </a>
            </div>

            <!-- Connected Accounts Card Canvas -->
            <div class="dashboard-card connected-accounts-card">
                <div class="accounts-list">
                    <?php foreach ($accounts as $account): ?>
                        <div class="account-row">
                            <div class="account-info">
                                <div class="account-icon-wrapper">
                                    <i class="fa-brands <?php echo $account['icon']; ?>"></i>
                                </div>
                                <span class="account-name"><?php echo $account['name']; ?></span>
                            </div>

                            <div class="account-status-action">
                                <?php if ($account['connected']): ?>
                                    <span class="status-badge connected">Connected</span>
                                    <button class="btn-account-action disconnect">Disconnect</button>
                                <?php else: ?>
                                    <span class="status-badge not-connected">Not Connected</span>
                                    <button class="btn-account-action connect">Connect</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </main>
    </div>
</body>
</html>