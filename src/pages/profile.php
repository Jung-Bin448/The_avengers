<?php
session_start();

$username = $_SESSION['username'] ?? 'Alex';
$title = $_SESSION['title'] ?? 'Level 5 Adventurer';
$bio = $_SESSION['bio'] ?? 'Grinding code and conquering bugs ⚡';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile - Gamified App</title>
  <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body class="dashboard-body">

  <div class="dashboard-container">
    <!-- Sidebar Navigation -->
    <aside class="sidebar">
      <nav class="sidebar-menu">
        <a href="collection.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
          <span>Collection</span>
        </a>
        <a href="dashboard.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
          <span>Dashboard</span>
        </a>
        <a href="quest.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
          <span>Quest</span>
        </a>
        <a href="party.php" class="nav-item">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          <span>Party</span>
        </a>
        <a href="profile.php" class="nav-item active">
          <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
          <span>Profile</span>
        </a>
      </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="main-content profile-main">
      
      <!-- Settings Icon (Gear) Top Right -->
      <a href="settings.php" class="settings-btn" aria-label="Settings">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
          <circle cx="12" cy="12" r="3"></circle>
          <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
        </svg>
      </a>

      <!-- Profile Header Area -->
      <section class="profile-header-section">
        <div class="profile-avatar-column">
          <div class="avatar-ring">
            <div class="avatar-placeholder"></div>
          </div>
          <h1 class="profile-username"><?php echo htmlspecialchars($username); ?></h1>
          <button class="btn-edit-profile">Edit profile</button>
        </div>

        <div class="profile-info-column">
          <div class="profile-level-container">
            <span class="level-title-text"><?php echo htmlspecialchars($title); ?></span>
            <div class="profile-progress-bar">
              <div class="profile-progress-fill" style="width: 65%;"></div>
            </div>
          </div>

          <div class="profile-bio-box">
            <p><?php echo htmlspecialchars($bio); ?></p>
          </div>
        </div>
      </section>

      <!-- Ranks & Recent Achievements Panels -->
      <section class="profile-panels-grid">
        <div class="profile-panel">
          <h2>Ranks</h2>
          <div class="panel-content-area"></div>
        </div>

        <div class="profile-panel">
          <h2>Recent Achievements</h2>
          <div class="panel-content-area"></div>
        </div>
      </section>

    </main>
  </div>

</body>
</html>