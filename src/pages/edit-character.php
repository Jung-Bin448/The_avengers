<?php
$current_page = 'settings';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Character Name & Avatar - Level Up Life</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- App Stylesheets -->
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

        <!-- Main Edit Character Workspace Canvas -->
        <main class="main-content">
            
            <!-- Page Header with Back Link -->
            <div class="top-header">
                <!-- Replace href="#" with href="edit-character.php" -->
                <a href="edit-character.php" class="settings-menu-item">
                    <div class="menu-item-label">
                        <i class="fa-regular fa-user"></i>
                        <span>Edit Character Name & Avatar</span>
                    </div>
                    <i class="fa-solid fa-chevron-right arrow-icon"></i>
                </a>
            </div>

            <!-- Edit Form Workspace Card -->
            <div class="dashboard-card edit-character-card">
                <form action="edit-character.php" method="POST" enctype="multipart/form-data" class="edit-character-form">
                    
                    <!-- Left Section: Character Name Field & Form Actions -->
                    <div class="edit-form-left">
                        <label class="form-label" for="character_name">CHARACTER NAME</label>
                        
                        <div class="input-with-counter">
                            <input 
                                type="text" 
                                id="character_name" 
                                name="character_name" 
                                value="ShadowKnight_99" 
                                maxlength="20" 
                                required
                            >
                            <span class="char-counter" id="charCounter">14/20</span>
                        </div>

                        <div class="form-action-buttons">
                            <button type="submit" class="btn-save">Save changes</button>
                            <a href="settings.php" class="btn-cancel">Cancel</a>
                        </div>
                    </div>

                    <!-- Right Section: Avatar Upload Column -->
                    <div class="edit-avatar-right">
                        <div class="avatar-preview-ring">
                            <div class="avatar-circle-placeholder">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                        
                        <label for="avatar_upload" class="btn-change-avatar">
                            Change Avatar
                        </label>
                        <input type="file" id="avatar_upload" name="avatar" accept="image/*" class="hidden-file-input">
                    </div>

                </form>
            </div>

        </main>
    </div>

    <!-- Live Character Counter Script -->
    <script>
        const input = document.getElementById('character_name');
        const counter = document.getElementById('charCounter');

        input.addEventListener('input', () => {
            const currentLength = input.value.length;
            counter.textContent = `${currentLength}/20`;
        });
    </script>
</body>
</html>