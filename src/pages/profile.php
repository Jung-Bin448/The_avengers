<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user data directly for fast initial page load
$stmt = $pdo->prepare("SELECT username, email, avatar_path FROM users WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$username   = $user['username'] ?? 'User';
$email      = $user['email'] ?? '--';
$avatar     = $user['avatar_path'] ?? ''; // <-- Fixed from $user['avatar'] to $user['avatar_path']
$defaultSvg = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MCIgaGVpZ2h0PSI5MCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSIjMmEzNzU2Ij48Y2lyY2xlIGN4PSIxMiIgY3k9IjgiIHI9IjQiLz48cGF0aCBkPSJNMTIgMTRjLTYuMSAwLTggNC04IDR2MmgxNnYtMnMtMS55LTQtOC00eiIvPjwvc3ZnPg==";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Level Up Life</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assests/css/style.css">
    <style>
        .profile-banner-card {
            position: relative;
        }

        .settings-top-right {
            position: absolute;
            top: 20px;
            right: 25px;
            color: #8f9bba;
            font-size: 1.4rem;
            text-decoration: none;
            transition: color 0.2s ease, transform 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .settings-top-right:hover {
            color: #ffffff;
            transform: rotate(30deg);
        }

        .profile-avatar-container {
            width: 100px;  /* Adjust this to match your desired circle size */
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1e293b;
            border: 2px solid #334155;
            margin: 0 auto 15px auto; /* Centers it nicely */
        }

        .profile-avatar-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="app-container">
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <a href="collection.php" class="nav-item">
                <i class="fa-regular fa-folder"></i>
                <span>Collection</span>
            </a>
            <a href="dashboard.php" class="nav-item">
                <i class="fa-solid fa-border-all"></i>
                <span>Dashboard</span>
            </a>
            <a href="quests.php" class="nav-item">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Quest</span>
            </a>
            <a href="party.php" class="nav-item">
                <i class="fa-solid fa-users"></i>
                <span>Party</span>
            </a>
            <a href="profile.php" class="nav-item active">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content">
            <div class="profile-page-wrapper">
                
                <!-- TOP PROFILE BANNER -->
                <div class="profile-card profile-banner-card">
                    
                    <a href="settings.php" class="settings-top-right" title="Settings">
                        <i class="fa-solid fa-gear"></i>
                    </a>

                    <div class="profile-avatar-section">
                        <div class="profile-avatar-container">
                            <!-- Show uploaded avatar if it exists; otherwise fallback to SVG avatar -->
                            <img id="profile-avatar" src="<?php echo (!empty($avatar) && file_exists('../' .$avatar)) ? '../' . htmlspecialchars($avatar) :$defaultSvg; ?>" alt="User Avatar">
                        </div>
                        <h2 id="profile-username" class="profile-username"><?php echo htmlspecialchars($username); ?></h2>
                        <button class="btn-edit-profile" id="btn-edit-profile">Edit profile</button>
                    </div>

                    <div class="profile-level-section">
                        <div class="level-header">
                            <span id="profile-level-title" class="level-title">Level 1 Adventurer</span>
                        </div>
                        <div class="progress-bar-container">
                            <div id="profile-progress-fill" class="progress-bar-fill" style="width: 0%;"></div>
                        </div>
                        <p class="profile-tagline">Grinding code and conquering bugs ⚡</p>
                    </div>
                </div>

                <!-- MIDDLE SECTION: ACCOUNT INFO & STATS OVERVIEW -->
                <div class="profile-grid-two-col">
                    
                    <!-- Account Information -->
                    <div class="profile-card">
                        <div class="card-header-title">
                            <i class="fa-solid fa-id-card"></i>
                            <h3>Account Information</h3>
                        </div>
                        <div class="info-table">
                            <div class="info-row">
                                <span class="info-label">Full Name</span>
                                <span id="info-username" class="info-value"><?php echo htmlspecialchars($username); ?></span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Email</span>
                                <span id="info-email" class="info-value"><?php echo htmlspecialchars($email); ?></span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Role</span>
                                <span id="info-role" class="info-value">Adventurer</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Joined</span>
                                <span id="info-joined" class="info-value">--</span>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Overview -->
                    <div class="profile-card">
                        <div class="card-header-title">
                            <i class="fa-solid fa-chart-line"></i>
                            <h3>Statistics Overview</h3>
                        </div>
                        <div class="info-table">
                            <div class="info-row">
                                <span class="info-label">Quests Completed</span>
                                <span id="stat-quests" class="info-value">0</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Current Streak</span>
                                <span id="stat-streak" class="info-value">0 Days</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Party Members</span>
                                <span id="stat-party" class="info-value">0</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Total XP Earned</span>
                                <span id="stat-xp" class="info-value">0 XP</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- BOTTOM SECTION: ACHIEVEMENTS & RANKING -->
                <div class="profile-grid-two-col">
                    
                    <div class="profile-card">
                        <div class="card-header-title">
                            <i class="fa-solid fa-trophy"></i>
                            <h3>Achievements & Badges</h3>
                        </div>
                        <div id="achievements-container" class="achievements-grid">
                            <!-- Populated dynamically -->
                        </div>
                    </div>

                    <div class="profile-card">
                        <div class="card-header-title">
                            <i class="fa-solid fa-medal"></i>
                            <h3>Rank & Standing</h3>
                        </div>
                        <div class="rank-display-wrapper">
                            <div class="rank-badge-box">
                                <div class="rank-icon-circle">
                                    <i class="fa-solid fa-crown"></i>
                                </div>
                                <div class="rank-details">
                                    <span class="rank-label">Global Standing</span>
                                    <h2 id="rank-global" class="rank-number">#--</h2>
                                    <span id="rank-tier" class="rank-tier-name">Novice</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editBtn = document.getElementById('btn-edit-profile');
            if (editBtn) {
                editBtn.addEventListener('click', () => {
                    window.location.href = 'edit-character.php';
                });
            }

            // Fetch extra stats, level progress, and achievements dynamically
            fetch('../api/get_profile.php')
                .then(res => res.json())
                .then(data => {
                    if (data && data.success) {
                        const p = data.profile;
                        
                        if (p.username) {
                            document.getElementById('profile-username').textContent = p.username;
                            document.getElementById('info-username').textContent = p.username;
                        }
                        if (p.email) document.getElementById('info-email').textContent = p.email;
                        if (p.avatar_path) document.getElementById('profile-avatar').src = '../' + p.avatar_path;

                        if (p.level) document.getElementById('profile-level-title').textContent = `Level ${p.level} ${p.level_title || ''}`;
                        if (p.level_progress) document.getElementById('profile-progress-fill').style.width = `${p.level_progress}%`;

                        if (p.role) document.getElementById('info-role').textContent = p.role;
                        if (p.created_at) document.getElementById('info-joined').textContent = p.created_at;

                        if (p.stats) {
                            document.getElementById('stat-quests').textContent = p.stats.quests_completed || 0;
                            document.getElementById('stat-streak').textContent = (p.stats.current_streak || 0) + ' Days';
                            document.getElementById('stat-party').textContent = p.stats.party_members || 0;
                            document.getElementById('stat-xp').textContent = (p.stats.total_xp || 0) + ' XP';
                        }

                        if (p.rank) {
                            document.getElementById('rank-global').textContent = p.rank.global_rank || '#--';
                            document.getElementById('rank-tier').textContent = p.rank.tier_name || 'Novice';
                        }

                        const achContainer = document.getElementById('achievements-container');
                        if (!p.achievements || p.achievements.length === 0) {
                            achContainer.innerHTML = '<p style="color:#8f9bba; padding:10px 0;">No achievements earned yet.</p>';
                        } else {
                            achContainer.innerHTML = p.achievements.map(a => `
                                <div class="badge-item">
                                    <img src="${a.badge_image}" alt="${a.badge_name}" class="badge-icon">
                                    <div class="badge-info">
                                        <div class="badge-title">${a.badge_name}</div>
                                        <div class="badge-desc">${a.description}</div>
                                    </div>
                                </div>
                            `).join('');
                        }
                    }
                })
                .catch(err => console.error('Error fetching profile stats:', err));
        });
    </script>
</body>
</html>