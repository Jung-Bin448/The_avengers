<?php
session_start();
require_once __DIR__ . '/../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$current_page = 'settings';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Level Up Life</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        <!-- Main Content Area -->
        <main class="main-content">
            <div class="settings-page-wrapper">
                <header class="settings-header">
                    <h2>Settings</h2>
                    <p>Customize your adventure experience</p>
                </header>

                <div class="settings-grid">
                    
                    <!-- ACCOUNT SECTION -->
                    <div class="settings-card">
                        <h3 class="settings-group-title">Account</h3>
                        <div class="settings-menu-list">
                            <a href="edit-character.php" class="settings-menu-item">
                                <div class="menu-item-label">
                                    <i class="fa-regular fa-user"></i>
                                    <span>Edit Character Name & Avatar</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                            <a href="#" class="settings-menu-item">
                                <div class="menu-item-label">
                                    <i class="fa-solid fa-link"></i>
                                    <span>Connected Guild Accounts</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                            <a href="#" class="settings-menu-item danger-text">
                                <div class="menu-item-label">
                                    <i class="fa-solid fa-trash"></i>
                                    <span>Delete Account</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                            
                            <!-- LOG OUT BUTTON -->
                            <div class="settings-menu-item settings-item-clickable" id="btn-logout">
                                <div class="menu-item-label">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>Log Out</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </div>
                        </div>
                    </div>

                    <!-- PREFERENCES SECTION -->
                    <div class="settings-card">
                        <h3 class="settings-group-title">Preferences</h3>
                        <div class="settings-menu-list">
                            <a href="#" class="settings-menu-item">
                                <div class="menu-item-label">
                                    <i class="fa-solid fa-music"></i>
                                    <span>Sound Effects & Quest Audio</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                            <a href="#" class="settings-menu-item">
                                <div class="menu-item-label">
                                    <i class="fa-regular fa-bell"></i>
                                    <span>Boss Reminders & Push Notifications</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </div>
                    </div>

                    <!-- DANGER ZONE SECTION -->
                    <div class="settings-card">
                        <h3 class="settings-group-title">Danger Zone</h3>
                        <div class="settings-menu-list">
                            <a href="#" class="settings-menu-item warning-text">
                                <div class="menu-item-label">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <span>Reset Character Progress</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </div>
                    </div>

                    <!-- SYSTEM SECTION -->
                    <div class="settings-card">
                        <h3 class="settings-group-title">System</h3>
                        <div class="settings-menu-list">
                            <a href="#" class="settings-menu-item">
                                <div class="menu-item-label">
                                    <i class="fa-regular fa-moon"></i>
                                    <span>Dark Theme Intensity</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                            <a href="#" class="settings-menu-item">
                                <div class="menu-item-label">
                                    <i class="fa-solid fa-globe"></i>
                                    <span>Language / Realm</span>
                                </div>
                                <i class="fa-solid fa-chevron-right arrow-icon"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- LOGOUT CONFIRMATION MODAL -->
    <div id="logout-modal" class="modal-overlay">
        <div class="modal-card">
            <h3 class="modal-title">Log Out</h3>
            <p class="modal-desc">Are you sure you want to log out?</p>
            <div class="modal-actions">
                <button id="modal-cancel" class="btn-modal btn-cancel">Cancel</button>
                <button id="modal-confirm" class="btn-modal btn-logout-confirm">Log Out</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const logoutBtn = document.getElementById('btn-logout');
            const logoutModal = document.getElementById('logout-modal');
            const cancelBtn = document.getElementById('modal-cancel');
            const confirmBtn = document.getElementById('modal-confirm');

            if (logoutBtn && logoutModal) {
                logoutBtn.addEventListener('click', () => {
                    logoutModal.style.display = 'flex';
                });

                cancelBtn.addEventListener('click', () => {
                    logoutModal.style.display = 'none';
                });

                logoutModal.addEventListener('click', (e) => {
                    if (e.target === logoutModal) {
                        logoutModal.style.display = 'none';
                    }
                });

                confirmBtn.addEventListener('click', () => {
                    window.location.href = '../api/logout.php';
                });
            }
        });
    </script>
</body>
</html>