<?php
session_start();

// Default values or session values
$characterName = $_SESSION['username'] ?? 'ShadowKnight_99';$maxLength = 20;
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
            
            <form action="" method="POST" enctype="multipart/form-data" class="edit-character-form">
                
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
                        <i class="fa-regular fa-user avatar-preview-icon"></i>
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
        <a href="quests.php" class="mobile-nav-link">
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
        const maxLength = <?php echo $maxLength; ?>;

        input.addEventListener('input', () => {
            counter.textContent = `${input.value.length}/${maxLength}`;
        });
    </script>

</body>
</html>
/* ==========================================
   9. EDIT CHARACTER NAME & AVATAR PAGE
   ========================================== */
.edit-character-card {
    background-color: #131a2b;
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 28px 32px;
    margin-top: 10px;
}

.edit-character-form {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
}

.character-form-left {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.input-section-label {
    font-size: 11px;
    font-weight: 700;
    color: var(--text-muted);
    letter-spacing: 0.5px;
    margin-bottom: 12px;
    display: block;
}

.input-with-counter {
    position: relative;
    width: 100%;
}

.input-with-counter input {
    width: 100%;
    background-color: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    padding: 12px 60px 12px 16px;
    color: #ffffff;
    font-size: 14px;
    outline: none;
    transition: border-color 0.2s ease;
}

.input-with-counter input:focus {
    border-color: #3b82f6;
}

.char-counter {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 11px;
    color: var(--text-muted);
    pointer-events: none;
}

.edit-form-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 12px;
    margin-top: 40px;
}

.btn-save-changes {
    background-color: #2563eb;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    padding: 8px 18px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.btn-save-changes:hover {
    background-color: #1d4ed8;
}

.btn-cancel-edit {
    background-color: rgba(255, 255, 255, 0.08);
    color: #cbd5e1;
    text-decoration: none;
    border-radius: 8px;
    padding: 8px 18px;
    font-size: 12px;
    font-weight: 600;
    transition: background-color 0.2s ease, color 0.2s ease;
}

.btn-cancel-edit:hover {
    background-color: rgba(255, 255, 255, 0.15);
    color: #ffffff;
}

.character-form-right {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 14px;
    width: 140px;
}

.avatar-preview-circle {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: #d1d5db;
    border: 3px solid #10b981;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.avatar-preview-icon {
    font-size: 40px;
    color: #6b7280;
}

.btn-change-avatar {
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.15);
    color: #ffffff;
    border-radius: 8px;
    padding: 6px 14px;
    font-size: 11px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

.btn-change-avatar:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

/* Edit Character Mobile Responsiveness */
@media (max-width: 768px) {
    .edit-character-form {
        flex-direction: column-reverse;
        align-items: center;
        gap: 24px;
    }

    .character-form-left {
        width: 100%;
    }

    .edit-form-actions {
        justify-content: center;
        margin-top: 24px;
    }
}