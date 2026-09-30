<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Quest - The Avengers</title>
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

            <a href="quests.php" class="nav-item active">
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

            <a href="profile.php" class="nav-item">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Profile</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="main-content create-quest-main-content">
        <!-- Back Navigation Header -->
        <div class="create-quest-page-header">
            <a href="quests.php" class="create-quest-back-link">&lsaquo; Create New Quest</a>
        </div>

        <!-- Create Quest Form Box Wrapper -->
        <div class="create-quest-content-wrapper">
            <!-- Quest Title Input -->
            <div class="create-quest-field-group">
                <input type="text" class="create-quest-input" placeholder="Defeat the Inbox Dragon" value="Defeat the Inbox Dragon">
            </div>

            <!-- Quest Description / Notes Input -->
            <div class="create-quest-field-group">
                <textarea class="create-quest-textarea" placeholder="Add quest details, sub-objectives, or notes....">Add quest details, sub-objectives, or notes....</textarea>
            </div>

            <!-- Quest Type Section -->
            <div class="quest-type-container">
                <span class="quest-section-label">QUEST TYPE</span>
                
                <div class="quest-type-options-row">
                    <!-- Daily Bounty (Selected) -->
                    <label class="quest-type-pill active">
                        <input type="radio" name="quest_type" value="daily_bounty" checked>
                        <span class="pill-icon">⚔️</span>
                        <span>Daily Bounty</span>
                    </label>

                    <!-- Boss Raid -->
                    <label class="quest-type-pill">
                        <input type="radio" name="quest_type" value="boss_raid">
                        <span class="pill-icon">💀</span>
                        <span>Boss Raid</span>
                    </label>

                    <!-- Side Quest -->
                    <label class="quest-type-pill">
                        <input type="radio" name="quest_type" value="side_quest">
                        <span class="pill-icon">🧪</span>
                        <span>Side Quest</span>
                    </label>

                    <!-- Add Type Button Pill -->
                    <button type="button" class="quest-type-pill add-type-btn">
                        <span>+ Add Type</span>
                    </button>
                </div>
            </div>

            <!-- Start and Deadline Row -->
            <div class="quest-schedule-row">
                <div class="schedule-box start-box">
                    <span class="schedule-label">Start:</span>
                    <span class="schedule-value">Today</span>
                </div>
                <div class="schedule-box deadline-box">
                    <span class="schedule-label">Deadline:</span>
                    <span class="schedule-value warning-text">Tomorrow</span>
                </div>
            </div>

            <!-- Accept & Post Quest Button Action -->
            <div class="quest-submit-row">
                <button type="button" class="btn-accept-post-quest">Accept & Post Quest</button>
            </div>
        </div>
    </main>

</body>
</html><?php
$current_page = 'quests';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Quest - Level Up Life</title>
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
            
            <!-- Header with Back Link -->
            <div class="top-header">
                <a href="quests.php" class="back-link-title">
                    <i class="fa-solid fa-chevron-left"></i>
                    <h2>Create New Quest</h2>
                </a>
            </div>

            <!-- Create Quest Workspace Card -->
            <div class="dashboard-card create-quest-card">
                <form class="quest-form" action="quests.php" method="POST">
                    
                    <!-- Quest Title Field -->
                    <div class="form-group">
                        <input type="text" class="quest-input-field" name="quest_title" placeholder="Defeat the Inbox Dragon" required>
                    </div>

                    <!-- Quest Details Textarea -->
                    <div class="form-group">
                        <textarea class="quest-textarea-field" name="quest_details" rows="3" placeholder="Add quest details, sub-objectives, or notes...."></textarea>
                    </div>

                    <!-- Quest Type Selection -->
                    <div class="quest-type-section">
                        <h4 class="section-subtitle">QUEST TYPE</h4>
                        <div class="quest-types-grid">
                            
                            <label class="quest-type-pill active">
                                <input type="radio" name="quest_type" value="daily_bounty" checked>
                                <i class="fa-solid fa-swords"></i>
                                <span>Daily Bounty</span>
                            </label>

                            <label class="quest-type-pill">
                                <input type="radio" name="quest_type" value="boss_raid">
                                <i class="fa-solid fa-shield-cat"></i>
                                <span>Boss Raid</span>
                            </label>

                            <label class="quest-type-pill">
                                <input type="radio" name="quest_type" value="side_quest">
                                <i class="fa-solid fa-vial"></i>
                                <span>Side Quest</span>
                            </label>

                            <button type="button" class="btn-add-type">
                                <span>Add Type</span>
                            </button>

                        </div>
                    </div>

                    <!-- Dates Row -->
                    <div class="quest-dates-row">
                        <div class="date-badge">
                            <span class="date-label">Start:</span>
                            <span class="date-value">Today</span>
                        </div>
                        <div class="date-badge-divider"></div>
                        <div class="date-badge">
                            <span class="date-label-danger">Deadline:</span>
                            <span class="date-value-danger">Tomorrow</span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-submit-container">
                        <button type="submit" class="btn-primary-action">
                            Accept & Post Quest
                        </button>
                    </div>

                </form>
            </div>

        </main>
    </div>
</body>
</html>