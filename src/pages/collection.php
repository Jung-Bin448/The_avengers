<?php
$current_page = 'collection';

// Mock data for achievements/collection items
$achievements = [
    ['level' => 1, 'title' => 'LEVEL 1', 'icon' => 'fa-certificate', 'color' => '#94a3b8', 'unlocked' => true],
    ['level' => 2, 'title' => 'LEVEL 2', 'icon' => 'fa-gem', 'color' => '#38bdf8', 'unlocked' => true],
    ['level' => 3, 'title' => 'LEVEL 3', 'icon' => 'fa-shield-halved', 'color' => '#10b981', 'unlocked' => true],
    ['level' => 4, 'title' => 'LEVEL 4', 'icon' => 'fa-award', 'color' => '#818cf8', 'unlocked' => true],
    ['level' => 5, 'title' => 'LEVEL 5', 'icon' => 'fa-crown', 'color' => '#a855f7', 'unlocked' => true],
    ['level' => 6, 'title' => 'LEVEL 6', 'icon' => 'fa-dragon', 'color' => '#c084fc', 'unlocked' => false],
    ['level' => 7, 'title' => 'LEVEL 7', 'icon' => 'fa-bolt', 'color' => '#f43f5e', 'unlocked' => false],
    ['level' => 8, 'title' => 'LEVEL 8', 'icon' => 'fa-wand-magic-sparkles', 'color' => '#e879f9', 'unlocked' => false],
    ['level' => 9, 'title' => 'LEVEL 9', 'icon' => 'fa-feather', 'color' => '#cbd5e1', 'unlocked' => false],
    ['level' => 10, 'title' => 'LEVEL 10', 'icon' => 'fa-star', 'color' => '#eab308', 'unlocked' => false],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection - Level Up Life</title>
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

        <!-- Main Collection Workspace Canvas -->
        <main class="main-content">
            
            <!-- Top Header Bar -->
            <div class="top-header">
                <div class="user-title-group">
                    <h2>Achievements</h2>
                    <p class="user-subtext">Track and unlock your milestone rewards</p>
                </div>
            </div>

            <!-- Achievements Collection Grid Card -->
            <div class="dashboard-card collection-card">
                <div class="achievement-grid">
                    <?php foreach ($achievements as $item): ?>
                        <div class="achievement-item <?php echo $item['unlocked'] ? 'unlocked' : 'locked'; ?>">
                            <div class="badge-icon-wrapper" style="--badge-color: <?php echo $item['color']; ?>;">
                                <i class="fa-solid <?php echo $item['icon']; ?>"></i>
                            </div>
                            <span class="badge-title" style="<?php echo $item['unlocked'] ? 'color: ' . $item['color'] . ';' : ''; ?>">
                                <?php echo $item['title']; ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </main>
    </div>
</body>
</html>