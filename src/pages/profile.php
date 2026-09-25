<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
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
                        <img
                            id="profileAvatar"
                            src=""
                            alt="Profile Avatar"
                            style="display: none;"
                        >

                        <i
                            id="avatarFallback"
                            class="fa-regular fa-user avatar-fallback-icon">
                        </i>
                    </div>
                    <h2 class="profile-username"><?php echo htmlspecialchars($username); ?></h2>
                    <a href="edit-character.php" class="edit-profile-btn">
                        Edit profile
                    </a>
                </div>

                <!-- Info, Level Bar & Bio Column -->
                <div class="profile-info-column">
                    <div class="profile-level-section">
                        <span class="profile-level-title">
                            Level <span id="userLevel">1</span> Adventurer
                        </span>
                        <div class="progress-bar-bg profile-progress-bg">
                            <div
                                class="progress-bar-fill profile-progress-fill"
                                id="profileProgressBar"
                                style="width: 0%;">
                            </div>
                        </div>
                    </div>

                    <div class="profile-bio-box">
                        <p id="profileBio">Grinding code and conquering bugs ⚡</p>
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
    </nav>

    <script>
    async function loadProfile() {
        try {
            const response = await fetch('../api/profile.php');
            const result = await response.json();

            if (!result.success) {
                console.error(result.message);
                return;
            }

            const user = result.user;

            console.log("Profile user:", user);

            // Update avatar
            const avatar = document.getElementById('profileAvatar');
            const avatarFallback = document.getElementById('avatarFallback');

            if (user.avatar_path) {
                avatar.src = user.avatar_path;
                avatar.style.display = 'block';
                avatarFallback.style.display = 'none';
            } else {
            avatar.style.display = 'none';
                avatarFallback.style.display = 'block';
            }

            // Update level
            document.getElementById('userLevel').textContent = user.level;

            // Calculate XP progress
            const xp = Number(user.xp);
            const progressPercent = xp % 100;

            // Update progress bar
            document.getElementById('profileProgressBar').style.width =
            progressPercent + '%';

        } catch (error) {
            console.error("Failed to load profile:", error);
        }
    }

    loadProfile();
    </script>

</body>
</html>