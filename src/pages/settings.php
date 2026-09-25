<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Level Up Life</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../assests/css/Style.css">
</head>
<body class="dashboard-layout">

    <!-- Desktop Sidebar Navigation -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="quests.php" class="nav-link">
                <i class="fa-regular fa-folder-open"></i>
                <span>Collection</span>
            </a>
            <a href="dashboard.php" class="nav-link">
                <i class="fa-solid fa-swords"></i>
                <span>Quest</span>
            </a>
            <a href="parties.php" class="nav-link">
                <i class="fa-solid fa-users"></i>
                <span>Party</span>
            </a>
            <a href="profile.php" class="nav-link active">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="dashboard-main">

        <!-- Page Header -->
        <header class="settings-header">
            <h1>Settings</h1>
            <p>Customize your adventure experience</p>
        </header>

        <!-- Settings Cards Two-Column Grid -->
        <div class="settings-grid">
            
            <!-- Left Column: Account & Danger Zone -->
            <div class="settings-col">
                
                <!-- Account Settings Box -->
                <div class="settings-card">
                    <h2 class="settings-card-title">Account</h2>
                    <ul class="settings-list">
                        <li>
                            <a href="edit-character.php" class="settings-item">
                                <div class="settings-item-left">
                                    <i class="fa-solid fa-user-gear"></i>
                                    <span>Edit Character Name & Avatar</span>
                                </div>
                                    <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="connected-accounts.php" class="settings-item">
                                <div class="settings-item-left">
                                    <i class="fa-solid fa-link"></i>
                                    <span>Connected Guild Accounts</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="delete-account.php" class="settings-item">
                                <div class="settings-item-left">
                                    <i class="fa-regular fa-trash-can"></i>
                                    <span>Delete Account</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Danger Zone Box -->
                <div class="settings-card danger-card">
                    <h2 class="settings-card-title">Danger Zone</h2>
                    <ul class="settings-list">
                        <li>
                            <a href="delete-account.php" class="settings-item text-danger">
                                <div class="settings-item-left">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <span>Reset Character Progress</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Right Column: Preferences & System -->
            <div class="settings-col">
                
                <!-- Preferences Box -->
                <div class="settings-card">
                    <h2 class="settings-card-title">Preferences</h2>
                    <ul class="settings-list">
                        <li>
                            <a href="#" class="settings-item">
                                <div class="settings-item-left">
                                    <i class="fa-solid fa-music"></i>
                                    <span>Sound Effects & Quest Audio</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="settings-item">
                                <div class="settings-item-left">
                                    <i class="fa-regular fa-bell"></i>
                                    <span>Boss Reminders & Push Notifications</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- System Box -->
                <div class="settings-card">
                    <h2 class="settings-card-title">System</h2>
                    <ul class="settings-list">
                        <li>
                            <a href="#" class="settings-item">
                                <div class="settings-item-left">
                                    <i class="fa-solid fa-moon"></i>
                                    <span>Dark Theme Intensity</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="settings-item">
                                <div class="settings-item-left">
                                    <i class="fa-solid fa-globe"></i>
                                    <span>Language / Realm</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </main>

    <!-- Sticky Bottom Navigation Bar (Visible on Mobile Devices) -->
    <nav class="mobile-bottom-nav">
        <a href="collection.php" class="mobile-nav-link">
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
        <a href="profile.php" class="mobile-nav-link active">
            <i class="fa-regular fa-user"></i>
            <span>Profile</span>
        </a>
        <a href="edit-character.php" class="settings-item">
    <div class="settings-item-left">
        <i class="fa-solid fa-user-gear"></i>
        <span>Edit Character Name & Avatar</span>
    </div>
    <i class="fa-solid fa-chevron-right arrow-icon"></i>
</a>
    </nav>

</body>
</html>