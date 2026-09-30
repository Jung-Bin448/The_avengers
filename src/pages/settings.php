<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - The Avengers</title>
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body class="dashboard-page-body">

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="collection.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1.5"></rect>
                    <rect x="14" y="3" width="7" height="7" rx="1.5"></rect>
                    <rect x="14" y="14" width="7" height="7" rx="1.5"></rect>
                    <rect x="3" y="14" width="7" height="7" rx="1.5"></rect>
                </svg>
                <span>Collection</span>
            </a>

            <a href="dashboard.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="2"></rect>
                    <rect x="14" y="3" width="7" height="7" rx="2"></rect>
                    <rect x="14" y="14" width="7" height="7" rx="2"></rect>
                    <rect x="3" y="14" width="7" height="7" rx="2"></rect>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="quests.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                <span>Quest</span>
            </a>

            <a href="party.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Party</span>
            </a>

            <a href="profile.php" class="nav-item active">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Profile</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="main-content settings-main-content">
        <!-- Page Switcher Bar -->
        <div class="page-switcher-bar">
            <a href="profile.php" class="switch-btn">&larr; Back to Profile</a>
            <span class="switcher-title">Settings Panel</span>
            <a href="dashboard.php" class="switch-btn">Dashboard &rarr;</a>
        </div>

        <header class="settings-page-header">
            <h2>Settings</h2>
            <p>Customize your adventure experience</p>
        </header>

        <!-- Settings Dashboard Grid -->
        <div class="settings-grid-layout">
            <!-- Left Column: Account & Danger Zone -->
            <div class="settings-column">
                <div class="settings-card">
                    <h3>Account</h3>
                    <div class="settings-links-list">
                        <a href="edit-character.php" class="settings-link-item">
    <span class="settings-link-icon">👤</span>
    <span>Edit Character Name & Avatar</span>
    <span class="arrow">&rsaquo;</span>
</a>
                        <a href="connected-guilds.php" class="settings-link-item">
    <span class="settings-link-icon">🔗</span>
    <span>Connected Guild Accounts</span>
    <span class="arrow">&rsaquo;</span>
</a>
                        <a href="delete-account.php" class="settings-link-item text-danger">
    <span class="settings-link-icon">🗑️</span>
    <span>Delete Account</span>
    <span class="arrow">&rsaquo;</span>
</a>
                        <a href="#" class="settings-link-item">
                            <span class="settings-link-icon">🚪</span>
                            <span>Log Out</span>
                            <span class="arrow">&rsaquo;</span>
                        </a>
                    </div>
                </div>

                <div class="settings-card danger-card">
                    <h3>Danger Zone</h3>
                    <div class="settings-links-list">
                        <a href="reset-progress.php" class="settings-link-item text-danger">
                            <span class="settings-link-icon">⚠️</span>
                            <span>Reset Character Progress</span>
                            <span class="arrow">&rsaquo;</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Preferences & System -->
            <div class="settings-column">
                <div class="settings-card">
                    <h3>Preferences</h3>
                    <div class="settings-links-list">
                        <a href="sound-settings.php" class="settings-link-item">
    <span class="settings-link-icon">🎵</span>
    <span>Sound Effects & Quest Audio</span>
    <span class="arrow">&rsaquo;</span>
</a>
                        <a href="notifications-settings.php" class="settings-link-item">
    <span class="settings-link-icon">🔔</span>
    <span>Notifications</span>
    <span class="arrow">&rsaquo;</span>
</a>
                    </div>
                </div>

                <div class="settings-card">
                    <h3>System</h3>
                    <div class="settings-links-list">
                        <a href="theme-intensity.php" class="settings-link-item">
    <span class="settings-link-icon">🎨</span>
    <span>Dark Theme Intensity</span>
    <span class="arrow">&rsaquo;</span>
</a>
                        <a href="language-realm.php" class="settings-link-item">
    <span class="settings-link-icon">🌐</span>
    <span>Language / Realm</span>
    <span class="arrow">&rsaquo;</span>
</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>