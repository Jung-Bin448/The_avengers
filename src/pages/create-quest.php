<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Quest - Level Up Life</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body class="dashboard-layout">

    <!-- Desktop Sidebar Navigation -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="quests.php" class="nav-link"><i class="fa-regular fa-folder-open"></i><span>Collection</span></a>
            <a href="dashboard.php" class="nav-link active"><i class="fa-solid fa-swords"></i><span>Quest</span></a>
            <a href="parties.php" class="nav-link"><i class="fa-solid fa-users"></i><span>Party</span></a>
            <a href="profile.php" class="nav-link"><i class="fa-regular fa-user"></i><span>Profile</span></a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="dashboard-main">

        <!-- Page Sub-Header -->
        <header class="settings-sub-header">
            <a href="dashboard.php" class="back-link">
                <i class="fa-solid fa-chevron-left"></i> Create New Quest
            </a>
        </header>

        <!-- Form Container -->
        <div class="quest-create-container">
            <form action="process-quest.php" method="POST" class="create-quest-form">

                <!-- Quest Title Input -->
                <div class="form-group">
                    <input type="text" name="quest_title" class="form-input" placeholder="Defeat the Inbox Dragon" required>
                </div>

                <!-- Quest Details / Description Textarea -->
                <div class="form-group">
                    <textarea name="quest_details" class="form-textarea" rows="3" placeholder="Add quest details, sub-objectives, or notes...."></textarea>
                </div>

                <!-- Quest Type Selection Section -->
                <div class="form-group margin-top-lg">
                    <label class="section-label">QUEST TYPE</label>
                    <div class="quest-types-grid">

                        <label class="type-pill active">
                            <input type="radio" name="quest_type" value="daily_bounty" checked>
                            <i class="fa-solid fa-swords type-icon"></i>
                            <span>Daily Bounty</span>
                        </label>

                        <label class="type-pill">
                            <input type="radio" name="quest_type" value="boss_raid">
                            <i class="fa-solid fa-dragon type-icon"></i>
                            <span>Boss Raid</span>
                        </label>

                        <label class="type-pill">
                            <input type="radio" name="quest_type" value="side_quest">
                            <i class="fa-solid fa-flask type-icon"></i>
                            <span>Side Quest</span>
                        </label>

                        <button type="button" class="type-pill add-type-btn">
                            <i class="fa-solid fa-plus"></i>
                            <span>Add Type</span>
                        </button>

                    </div>
                </div>

                <!-- Date / Time Row -->
                <div class="form-group">
                    <div class="date-picker-box">
                        <div class="date-col">
                            <span class="date-text">Start: Today</span>
                        </div>
                        <div class="date-divider"></div>
                        <div class="date-col">
                            <span class="date-text danger-text">Deadline: Tomorrow</span>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-actions centered">
                    <button type="submit" class="btn-primary-purple">Accept & Post Quest</button>
                </div>

            </form>
        </div>

    </main>

    <!-- Mobile Bottom Navigation -->
    <nav class="mobile-bottom-nav">
        <a href="quests.php" class="mobile-nav-link"><i class="fa-regular fa-folder-open"></i><span>Collection</span></a>
        <a href="dashboard.php" class="mobile-nav-link active"><i class="fa-solid fa-swords"></i><span>Quest</span></a>
        <a href="parties.php" class="mobile-nav-link"><i class="fa-solid fa-users"></i><span>Party</span></a>
        <a href="profile.php" class="mobile-nav-link"><i class="fa-regular fa-user"></i><span>Profile</span></a>
    </nav>

</body>
</html>