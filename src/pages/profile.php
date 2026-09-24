<?php
session_start();

// Fallback values for profile
$username = $_SESSION['username'] ?? 'Alex';
$userTitle = "Level 5 Adventurer";
$bio = "Grinding code and conquering bugs ⚡";
$levelProgress = 72; // Percentage
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Level Up Life</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assests/css/Style.css">
</head>
<body class="dashboard-layout">

    <!-- Desktop Sidebar -->
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

    <!-- Main Profile Area -->
    <main class="dashboard-main">

        <!-- Top Profile Header Section -->
        <section class="profile-header-card">
            <!-- Settings Gear Icon -->
<a href="settings.php" class="settings-btn" aria-label="Settings">
    <i class="fa-solid fa-gear"></i>
</a>

            <div class="profile-header-content">
                <!-- Avatar and Username Column -->
                <div class="profile-avatar-column">
                    <div class="profile-avatar-circle">
                        <i class="fa-regular fa-user avatar-fallback-icon"></i>
                    </div>
                    <h2 class="profile-username"><?php echo htmlspecialchars($username); ?></h2>
                    <button class="edit-profile-btn" type="button">Edit profile</button>
                </div>

                <!-- Info, Level Bar & Bio Column -->
                <div class="profile-info-column">
                    <div class="profile-level-section">
                        <span class="profile-level-title"><?php echo htmlspecialchars($userTitle); ?></span>
                        <div class="progress-bar-bg profile-progress-bg">
                            <div class="progress-bar-fill profile-progress-fill" style="width: <?php echo $levelProgress; ?>%;"></div>
                        </div>
                    </div>

                    <div class="profile-bio-box">
                        <p><?php echo htmlspecialchars($bio); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Two Block Grid: Ranks & Recent Achievements -->
        <section class="profile-grid">
            
            <!-- Ranks Box -->
            <div class="profile-card-block">
                <h3 class="block-title">Ranks</h3>
                <div class="block-content">
                    <!-- Dynamic/custom rank content goes here -->
                </div>
            </div>

            <!-- Recent Achievements Box -->
            <div class="profile-card-block">
                <h3 class="block-title">Recent Achievements</h3>
                <div class="block-content">
                    <!-- Dynamic/custom achievements content goes here -->
                </div>
            </div>

        </section>

    </main>

    <!-- Sticky Mobile Bottom Navigation Bar -->
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
        <a href="profile.php" class="mobile-nav-link active">
            <i class="fa-regular fa-user"></i>
            <span>Profile</span>
        </a>
    </nav>

</body>
</html>