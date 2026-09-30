<?php
$current_page = 'settings';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Character Progress - Level Up Life</title>
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
                    <h2>Reset Character Progress</h2>
                </a>
            </div>

            <!-- Reset Progress Card Canvas -->
            <div class="dashboard-card reset-card">
                <div class="reset-content-wrapper">
                    
                    <!-- Red Warning Box -->
                    <div class="warning-banner">
                        <div class="warning-icon-wrapper">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <p class="warning-text-content">
                            <strong>Warning:</strong> Resetting your character will clear all level progression, skill points, and quest history. Your character will return to Level 1. This action cannot be undone.
                        </p>
                    </div>

                    <!-- Action Button Container -->
                    <div class="reset-action-container">
                        <button type="button" class="btn-reset-danger" onclick="confirmReset()">
                            Reset Character to Level 1
                        </button>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <script>
        function confirmReset() {
            if (confirm("Are you absolutely sure you want to reset your character progress to Level 1? This action cannot be undone.")) {
                // Perform reset action or backend redirect here
                alert("Character progress has been reset.");
            }
        }
    </script>
</body>
</html>