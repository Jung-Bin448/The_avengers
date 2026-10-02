<?php
$current_page = 'collection';

// Mock data for achievements/collection items
$achievements = [
    ['level' => 1, 'title' => 'LEVEL 1', 'img' => 'level-1.png', 'unlocked' => true],
    ['level' => 2, 'title' => 'LEVEL 2', 'img' => 'level-2.png', 'unlocked' => true],
    ['level' => 3, 'title' => 'LEVEL 3', 'img' => 'level-3.png', 'unlocked' => true],
    ['level' => 4, 'title' => 'LEVEL 4', 'img' => 'level-4.png', 'unlocked' => true],
    ['level' => 5, 'title' => 'LEVEL 5', 'img' => 'level-5.png', 'unlocked' => true],
    ['level' => 6, 'title' => 'LEVEL 6', 'img' => 'level-6.png', 'unlocked' => false],
    ['level' => 7, 'title' => 'LEVEL 7', 'img' => 'level-7.png', 'unlocked' => false],
    ['level' => 8, 'title' => 'LEVEL 8', 'img' => 'level-8.png', 'unlocked' => false],
    ['level' => 9, 'title' => 'LEVEL 9', 'img' => 'level-9.png', 'unlocked' => false],
    ['level' => 10, 'title' => 'LEVEL 10', 'img' => 'level-10.png', 'unlocked' => false],
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
    <style>
        .achievement-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 25px;
            padding: 30px;
            justify-items: center;
        }
        .achievement-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .achievement-item img {
            width: 85px;
            height: auto;
            object-fit: contain;
            transition: transform 0.2s ease;
        }
        .achievement-item.locked img {
            opacity: 0.3;
            filter: grayscale(100%);
        }
        .achievement-item:hover img {
            transform: scale(1.05);
        }
    </style>
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
                            <img src="../assests/img/badges/<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </main>
    </div>
</body>
</html>