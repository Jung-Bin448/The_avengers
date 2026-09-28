<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Character - Level Up Life</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body class="dashboard-layout">

    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="quests.php" class="nav-link"><i class="fa-regular fa-folder-open"></i><span>Collection</span></a>
            <a href="dashboard.php" class="nav-link"><i class="fa-solid fa-swords"></i><span>Quest</span></a>
            <a href="parties.php" class="nav-link"><i class="fa-solid fa-users"></i><span>Party</span></a>
            <a href="profile.php" class="nav-link"><i class="fa-regular fa-user"></i><span>Profile</span></a>
        </nav>
    </aside>

    <main class="dashboard-main">
        <header class="settings-sub-header">
            <a href="settings.php" class="back-link"><i class="fa-solid fa-chevron-left"></i> Reset Character Progress</a>
        </header>

        <div class="settings-sub-container centered">
            <div class="warning-alert-box">
                <i class="fa-solid fa-triangle-exclamation warning-icon"></i>
                <p>Warning: Resetting your character will clear all level progression, skill points, and quest history. Your character will return to Level 1. This action cannot be undone.</p>
            </div>

            <form action="process-reset.php" method="POST" class="reset-action-form">
                <button type="submit" class="btn-danger-reset">Reset Character to Level 1</button>
            </form>
        </div>
    </main>

</body>
</html>