<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Theme Intensity - The Avengers</title>
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
    <main class="main-content theme-intensity-main-content">
        <!-- Back Navigation Header -->
        <div class="theme-page-header">
            <a href="settings.php" class="theme-back-link">&lsaquo; Dark Theme Intensity</a>
        </div>

        <!-- Theme Options Box Wrapper -->
        <div class="theme-content-wrapper">
            <!-- Midnight Black (OLED) Option -->
            <label class="theme-row-item">
                <div class="theme-info-group">
                    <span class="theme-title">Midnight Black (OLED)</span>
                    <span class="theme-description">Pure black background for OLED screens</span>
                </div>
                <div class="theme-radio-container">
                    <input type="radio" name="dark_theme_intensity" value="midnight_black">
                    <span class="radio-custom"></span>
                </div>
            </label>

            <!-- Abyssal Navy Option (Selected by default matching the reference) -->
            <label class="theme-row-item active-theme">
                <div class="theme-info-group">
                    <span class="theme-title">Abyssal Navy</span>
                    <span class="theme-description">Deep navy tones optimized for fantasy immersion</span>
                </div>
                <div class="theme-radio-container">
                    <input type="radio" name="dark_theme_intensity" value="abyssal_navy" checked>
                    <span class="radio-custom"></span>
                </div>
            </label>

            <!-- Dungeon Charcoal Option -->
            <label class="theme-row-item">
                <div class="theme-info-group">
                    <span class="theme-title">Dungeon Charcoal</span>
                    <span class="theme-description">Soft muted charcoal gray for low-light environments</span>
                </div>
                <div class="theme-radio-container">
                    <input type="radio" name="dark_theme_intensity" value="dungeon_charcoal">
                    <span class="radio-custom"></span>
                </div>
            </label>
        </div>
    </main>

</body>
</html>