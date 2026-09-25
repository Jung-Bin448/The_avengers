<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$characterName = $_SESSION['username'];
$maxLength = 20;
$currentLength = strlen($characterName);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Character Name & Avatar - Level Up Life</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../assests/css/Style.css">
</head>
<body class="dashboard-layout">

    <!-- Desktop Sidebar -->
    <aside class="sidebar">
        <nav class="sidebar-nav">
            <a href="quests.php" class="nav-link">
                <i class="fa-regular fa-folder-open"></i>
                <span>Collection</span>
            </a>
            <a href="dashboard.php" class="nav-link">
                <i class="fa-solid fa-swords"></i>
                <span>Quest</span>
            </a>
            <a href="parties.php" class="nav-link">
                <i class="fa-solid fa-users"></i>
                <span>Party</span>
            </a>
            <a href="profile.php" class="nav-link">
                <i class="fa-regular fa-user"></i>
                <span>Profile</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="dashboard-main subpage-container">

        <!-- Back Header -->
        <a href="settings.php" class="subpage-back-link">
            <i class="fa-solid fa-chevron-left"></i> Edit Character Name & Avatar
        </a>

        <!-- Edit Form Box -->
        <div class="edit-character-card">
            
            <form class="edit-character-form" id="editCharacterForm">
                
                <!-- Left Input Section -->
                <div class="character-form-left">
                    <label class="input-section-label">CHARACTER NAME</label>
                    
                    <div class="input-with-counter">
                        <input 
                            type="text" 
                            name="character_name" 
                            id="characterNameInput" 
                            value="<?php echo htmlspecialchars($characterName); ?>" 
                            maxlength="<?php echo $maxLength; ?>" 
                            required
                        >
                        <span class="char-counter" id="charCounter"><?php echo $currentLength; ?>/<?php echo$maxLength; ?></span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="edit-form-actions">
                        <button type="submit" class="btn-save-changes">Save changes</button>
                        <a href="settings.php" class="btn-cancel-edit">Cancel</a>
                    </div>
                </div>

                <!-- Right Avatar Section -->
                <div class="character-form-right">
                    <div class="avatar-preview-circle">
                        <img
                            id="avatarPreview"
                            src=""
                            alt="Profile Avatar"
                            style="display: none;"
                        >

                        <i
                            id="avatarPreviewFallback"
                            class="fa-regular fa-user avatar-preview-icon">
                        </i>
                    </div>
                    
                    <!-- Hidden file input triggered by button -->
                    <input type="file" name="avatar" id="avatarFileInput" accept="image/*" style="display: none;">
                    <button type="button" class="btn-change-avatar" onclick="document.getElementById('avatarFileInput').click();">
                        Change Avatar
                    </button>
                </div>

            </form>

        </div>

    </main>

    <!-- Mobile Bottom Navigation Bar -->
    <nav class="mobile-bottom-nav">
        <a href="collection.php" class="mobile-nav-link">
            <i class="fa-regular fa-folder-open"></i>
            <span>Collection</span>
        </a>
        <a href="dashboard.php" class="mobile-nav-link">
            <i class="fa-solid fa-swords"></i>
            <span>Quest</span>
        </a>
        <a href="parties.php" class="mobile-nav-link">
            <i class="fa-solid fa-users"></i>
            <span>Party</span>
        </a>
        <a href="profile.php" class="mobile-nav-link">
            <i class="fa-regular fa-user"></i>
            <span>Profile</span>
        </a>
    </nav>

    <!-- Dynamic Character Counter Script -->
    <script>
    const input = document.getElementById('characterNameInput');
    const counter = document.getElementById('charCounter');
    const form = document.getElementById('editCharacterForm');
    const avatarInput = document.getElementById('avatarFileInput');

    const avatarPreview = document.getElementById('avatarPreview');
    const avatarPreviewFallback = document.getElementById('avatarPreviewFallback');

    const maxLength = <?php echo $maxLength; ?>;

    async function loadCurrentAvatar() {
        try {
            const response = await fetch('../api/profile.php');
            const result = await response.json();

            if (!result.success) {
                return;
            }

            const user = result.user;

            if (user.avatar_path) {
                avatarPreview.src = user.avatar_path;
                avatarPreview.style.display = 'block';
                avatarPreviewFallback.style.display = 'none';
            } else {
                avatarPreview.style.display = 'none';
                avatarPreviewFallback.style.display = 'block';
            }  

        } catch (error) {
            console.error("Failed to load avatar:", error);
        }
    }

    loadCurrentAvatar();

    // Character name counter
    input.addEventListener('input', () => {
        counter.textContent = `${input.value.length}/${maxLength}`;
    });


    // Character name update
    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        const formData = new FormData();

        formData.append('character_name', input.value);

        try {
            const response = await fetch('../api/update-profile.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                alert(result.message);
                window.location.href = 'profile.php';
            } else {
                alert(result.message);
            }

        } catch (error) {
            console.error(error);
            alert('Something went wrong. Please try again.');
        }
    });


    // Avatar upload
    avatarInput.addEventListener('change', async function() {

        // Make sure a file was selected
        if (!avatarInput.files.length) {
            return;
        }

        const avatarFile = avatarInput.files[0];

        const formData = new FormData();
        formData.append('avatar', avatarFile);

        try {

            const response = await fetch('../api/update-avatar.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                alert(result.message);

                // Refresh the page so the new avatar can be displayed
                window.location.reload();

            } else {
                alert(result.message);
            }

        } catch (error) {

            console.error(error);
            alert('Something went wrong while uploading the avatar.');
        }
    });
    </script>

</body>
</html>