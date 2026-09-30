<?php
$current_page = 'party';
$group_name = isset($_GET['group']) ? htmlspecialchars($_GET['group']) : 'Guild Raid Squad';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $group_name; ?> - Level Up Life</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- App Stylesheets -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <div class="app-container">
        
        <!-- Sidebar Navigation -->
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

        <!-- Main Workspace View -->
        <main class="main-content">
            <div class="chat-split-container">
                
                <!-- Left Chat Column -->
                <div class="chat-main-card">
                    
                    <!-- Chat Room Header -->
                    <div class="chat-room-header">
                        <div class="chat-header-left">
                            <a href="party.php" class="chat-back-btn" title="Back to Direct Messages">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                            <div class="chat-group-avatar"></div>
                            <span class="chat-group-title"><?php echo $group_name; ?></span>
                        </div>
                        <div class="chat-header-actions">
                            <button type="button" class="chat-action-btn"><i class="fa-solid fa-video"></i></button>
                            <button type="button" class="chat-action-btn"><i class="fa-solid fa-phone"></i></button>
                        </div>
                    </div>

                    <!-- Chat Message Canvas -->
                    <div class="chat-messages-area">
                        <div class="message-bubble received">
                            <p>Hey party, ready for tonight's raid?</p>
                        </div>
                        <div class="message-bubble sent">
                            <p>Yeah! All pots and gear equipped.</p>
                        </div>
                        <div class="message-bubble received">
                            <p>Awesome, gathering in 10 minutes.</p>
                        </div>
                    </div>

                    <!-- Input Bar -->
                    <form class="chat-input-bar" onsubmit="event.preventDefault();">
                        <input type="text" placeholder="Type a message..." class="chat-input-field">
                        <button type="submit" class="chat-send-btn">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>

                </div>

                <!-- Right Side Information/Activity Panel -->
                <div class="chat-side-panel">
                    <!-- Reserved space for party details, members, or stats -->
                </div>

            </div>
        </main>
    </div>
</body>
</html>