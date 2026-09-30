<?php
$current_page = 'settings';

// Theme options configuration
$themes = [
    [
        'id' => 'theme_oled',
        'title' => 'Midnight Black (OLED)',
        'description' => 'Pure black background for OLED screens',
        'selected' => false
    ],
    [
        'id' => 'theme_abyssal',
        'title' => 'Abyssal Navy',
        'description' => 'Deep navy tones optimized for fantasy immersion',
        'selected' => true
    ],
    [
        'id' => 'theme_dungeon',
        'title' => 'Dungeon Charcoal',
        'description' => 'Soft muted charcoal gray for low-light environments',
        'selected' => false
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Theme Intensity - Level Up Life</title>
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
                    <h2>Dark Theme Intensity</h2>
                </a>
            </div>

            <!-- Theme Settings Workspace Card -->
            <div class="dashboard-card theme-settings-card">
                <div class="theme-options-list">
                    <?php foreach ($themes as $theme): ?>
                        <label class="theme-option-row" for="<?php echo $theme['id']; ?>">
                            <div class="theme-text-info">
                                <span class="theme-title"><?php echo $theme['title']; ?></span>
                                <span class="theme-description"><?php echo $theme['description']; ?></span>
                            </div>
                            <div class="radio-wrapper">
                                <input type="radio" id="<?php echo $theme['id']; ?>" name="dark_theme_intensity" value="<?php echo $theme['id']; ?>" <?php echo $theme['selected'] ? 'checked' : ''; ?>>
                                <span class="custom-radio"></span>
                            </div>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

        </main>
    </div>
</body>
</html>