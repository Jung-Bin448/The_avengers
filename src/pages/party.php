<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Party - The Avengers</title>
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

            <a href="party.php" class="nav-item active">
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
    <main class="main-content party-main-content">
        <!-- Optional Navigation Helper Bar for easy jumping between pages -->
        <div class="page-switcher-bar">
            <a href="dashboard.php" class="switch-btn">&larr; Dashboard</a>
            <span class="switcher-title">Party Chat</span>
            <a href="profile.php" class="switch-btn">Profile &rarr;</a>
        </div>

        <div class="party-container">
            <!-- Left Sidebar: Direct Messages list -->
            <div class="party-dm-sidebar">
                <div class="dm-header">
                    <h2>Direct Messages</h2>
                    <button class="dm-add-btn">+</button>
                </div>

                <div class="dm-search-wrapper">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" placeholder="Search" class="dm-search-input">
                </div>

                <div class="dm-chat-list">
                    <!-- Guild Raid Squad -->
                    <div class="dm-chat-item active">
                        <div class="dm-avatar-wrapper online">
                            <div class="dm-avatar-circle"></div>
                        </div>
                        <div class="dm-chat-info">
                            <span class="dm-chat-name">Guild Raid Squad</span>
                            <span class="dm-chat-sub">4 members online</span>
                        </div>
                        <span class="dm-chat-time">8:06</span>
                    </div>

                    <!-- Alchemist Party -->
                    <div class="dm-chat-item">
                        <div class="dm-avatar-wrapper">
                            <div class="dm-avatar-circle"></div>
                        </div>
                        <div class="dm-chat-info">
                            <span class="dm-chat-name">Alchemist Party</span>
                        </div>
                        <span class="dm-chat-time">Yesterday</span>
                    </div>

                    <!-- Tank & Healer Main -->
                    <div class="dm-chat-item">
                        <div class="dm-avatar-wrapper online">
                            <div class="dm-avatar-circle"></div>
                        </div>
                        <div class="dm-chat-info">
                            <span class="dm-chat-name">Tank & Healer Main</span>
                            <span class="dm-chat-sub">6 members online</span>
                        </div>
                        <span class="dm-chat-time">Sunday</span>
                    </div>

                    <!-- Dragon Slayers Club -->
                    <div class="dm-chat-item">
                        <div class="dm-avatar-wrapper">
                            <div class="dm-avatar-circle"></div>
                        </div>
                        <div class="dm-chat-info">
                            <span class="dm-chat-name">Dragon Slayers Club</span>
                        </div>
                        <span class="dm-chat-time">Thursday</span>
                    </div>
                </div>
            </div>

            <!-- Right Area: Chat Content View -->
            <div class="party-chat-view">
                <!-- Active message body placeholder matching reference image -->
            </div>
        </div>
    </main>

</body>
</html>