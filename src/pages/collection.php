<?php
// src/pages/collection.php

// Define current active page for navigation highlight
$current_page = basename($_SERVER['PHP_SELF']);

// Navigation menu links
$nav_items = [
    ['title' => 'Collection', 'icon' => 'fas fa-layer-group', 'url' => 'collection.php'],
    ['title' => 'Dashboard',  'icon' => 'fas fa-border-all',  'url' => 'dashboard.php'],
    ['title' => 'Quest',      'icon' => 'fas fa-khanda',      'url' => 'quest.php'],
    ['title' => 'Party',      'icon' => 'fas fa-users',       'url' => 'parties.php'],
    ['title' => 'Profile',    'icon' => 'fas fa-user',        'url' => 'profile.php']
];

$levels = [
    ['level' => 1, 'color' => '#8b97a8', 'bg' => '#2b3340', 'icon' => 'fas fa-diamond', 'wings' => false],
    ['level' => 2, 'color' => '#38bdf8', 'bg' => '#1e3a5f', 'icon' => 'fas fa-pentagon', 'wings' => false],
    ['level' => 3, 'color' => '#34d399', 'bg' => '#164e3d', 'icon' => 'fas fa-pentagon', 'wings' => true],
    ['level' => 4, 'color' => '#818cf8', 'bg' => '#2e3175', 'icon' => 'fas fa-pentagon', 'wings' => true],
    ['level' => 5, 'color' => '#c084fc', 'bg' => '#4c1d95', 'icon' => 'fas fa-cube', 'wings' => true],
    ['level' => 6, 'color' => '#d8b4fe', 'bg' => '#581c87', 'icon' => 'fas fa-cube', 'wings' => true],
    ['level' => 7, 'color' => '#f472b6', 'bg' => '#831843', 'icon' => 'fas fa-gem', 'wings' => true],
    ['level' => 8, 'color' => '#e879f9', 'bg' => '#581c87', 'icon' => 'fas fa-gem', 'wings' => true],
    ['level' => 9, 'color' => '#e2e8f0', 'bg' => '#475569', 'icon' => 'fas fa-gem', 'wings' => true],
    ['level' => 10, 'color' => '#fbbf24', 'bg' => '#78350f', 'icon' => 'fas fa-star', 'wings' => true]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements - Collection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #0b0f19;
            color: #ffffff;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .dashboard-card {
            display: flex;
            width: 1000px;
            height: 600px;
            background-color: #121826;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
            border: 1px solid #1e293b;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 200px;
            background-color: #161e2e;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            gap: 35px;
            border-right: 1px solid #1f293d;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 16px;
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 12px;
            transition: all 0.2s ease;
        }

        .nav-item i {
            font-size: 18px;
            width: 22px;
            text-align: center;
        }

        .nav-item.active,
        .nav-item:hover {
            color: #ffffff;
            background-color: #1e293b;
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            padding: 35px 45px;
            display: flex;
            flex-direction: column;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #f8fafc;
            letter-spacing: -0.5px;
        }

        .achievements-box {
            background-color: #1a2333;
            border-radius: 20px;
            padding: 40px 30px;
            flex: 1;
            border: 1px solid #253147;
            position: relative;
        }

        /* Staggered Grid Container */
        .badge-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            row-gap: 50px;
            column-gap: 15px;
        }

        .badge-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Staggering rows down progressively */
        .badge-card:nth-child(1) { transform: translateY(0px); }
        .badge-card:nth-child(2) { transform: translateY(10px); }
        .badge-card:nth-child(3) { transform: translateY(20px); }
        .badge-card:nth-child(4) { transform: translateY(30px); }
        .badge-card:nth-child(5) { transform: translateY(40px); }

        .badge-card:nth-child(6) { transform: translateY(-10px); }
        .badge-card:nth-child(7) { transform: translateY(0px); }
        .badge-card:nth-child(8) { transform: translateY(10px); }
        .badge-card:nth-child(9) { transform: translateY(20px); }
        .badge-card:nth-child(10) { transform: translateY(30px); }

        /* Hexagon Badge Base Styling */
        .badge-wrapper {
            position: relative;
            width: 76px;
            height: 76px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .hexagon {
            position: absolute;
            width: 70px;
            height: 70px;
            clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.5);
            z-index: 2;
        }

        .hexagon-inner {
            position: absolute;
            width: 58px;
            height: 58px;
            clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hexagon i {
            font-size: 20px;
            z-index: 3;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.4));
        }

        /* Wing Details */
        .wings {
            position: absolute;
            width: 100px;
            height: 40px;
            top: 20px;
            display: flex;
            justify-content: space-between;
            z-index: 1;
        }

        .wing-left, .wing-right {
            width: 18px;
            height: 18px;
            background: currentColor;
            clip-path: polygon(0 0, 100% 50%, 0 100%);
            opacity: 0.85;
        }

        .wing-left { transform: rotate(-20deg); }
        .wing-right { transform: scaleX(-1) rotate(-20deg); }

        /* Label Styling */
        .badge-label {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <div class="dashboard-card">
        <!-- Dynamic Sidebar Navigation -->
        <div class="sidebar">
            <?php foreach ($nav_items as $nav): ?>
                <?php $isActive = ($current_page === $nav['url']) ? 'active' : ''; ?>
                <a href="<?php echo htmlspecialchars($nav['url']); ?>" class="nav-item <?php echo $isActive; ?>">
                    <i class="<?php echo htmlspecialchars($nav['icon']); ?>"></i>
                    <?php echo htmlspecialchars($nav['title']); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Main Content Area -->
        <div class="main-content">
            <h1 class="page-title">Achievements</h1>

            <div class="achievements-box">
                <div class="badge-grid">
                    <?php foreach ($levels as $item): ?>
                        <div class="badge-card">
                            <div class="badge-wrapper">
                                <?php if ($item['wings']): ?>
                                    <div class="wings" style="color: <?php echo $item['color']; ?>;">
                                        <div class="wing-left"></div>
                                        <div class="wing-right"></div>
                                    </div>
                                <?php endif; ?>

                                <div class="hexagon" style="background-color: <?php echo $item['color']; ?>;">
                                    <div class="hexagon-inner" style="background-color: <?php echo $item['bg']; ?>;">
                                        <i class="<?php echo $item['icon']; ?>" style="color: <?php echo $item['color']; ?>;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="badge-label" style="color: <?php echo $item['color']; ?>;">
                                LEVEL <?php echo $item['level']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>