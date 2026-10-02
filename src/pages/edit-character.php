<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id =$_SESSION['user_id'];
$success_msg = '';$error_msg = '';

// Handle Form Submission (Save Changes)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = trim($_POST['character_name'] ?? '');

    if (!empty($new_username)) {
        try {
            // Handle Avatar Upload if a file was provided
            $avatar_path_sql = "";
            $params = [$new_username];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {$fileTmpPath = $_FILES['avatar']['tmp_name'];$fileName = $_FILES['avatar']['name'];$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                if (in_array($fileExtension,$allowedExtensions)) {
                    // Create uploads/avatars directory if it doesn't exist
                    $uploadFileDir = '../uploads/avatars/';
                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0755, true);
                    }

                    $newFileName = 'user_' . $user_id . '_' . time() . '.' . $fileExtension;
                    $dest_path = $uploadFileDir .$newFileName;
                    $relative_path = 'uploads/avatars/' .$newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {$avatar_path_sql = ", avatar_path = ?";
                        $params[] =$relative_path;
                    }
                }
            }

            // Append user_id for the WHERE clause
            $params[] =$user_id;

            $sql = "UPDATE users SET username = ?" . $avatar_path_sql . " WHERE user_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);

            // Redirect back to profile or refresh with success
            header("Location: profile.php");
            exit;

        } catch (PDOException $e) {$error_msg = "Error updating profile: " . $e->getMessage();
        }
    } else {
        $error_msg = "Character name cannot be empty.";
    }
}

// Fetch current user data for the form
$stmt =$pdo->prepare("SELECT username, avatar_path FROM users WHERE user_id = ?");
$stmt->execute([$user_id]);
$currentUser =$stmt->fetch();

$currentUsername = $currentUser['username'] ?? '';$currentAvatar = $currentUser['avatar_path'] ?? '';$defaultAvatarSvg = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MCIgaGVpZ2h0PSI5MCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSIjMmEzNzU2Ij48Y2lyY2xlIGN4PSIxMiIgY3k9IjgiIHI9IjQiLz48cGF0aCBkPSJNMTIgMTRjLTYuMSAwLTggNC04IDR2MmgxNnYtMnMtMS45LTQtOC00eiIvPjwvc3ZnPg==";

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
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>
    <div class="app-container">
        
        <!-- Standardized Sidebar Navigation -->
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

        <!-- Main Edit Character Workspace Canvas -->
        <main class="main-content">
            
            <!-- Page Header with Back Link -->
            <div class="top-header" style="margin-bottom: 20px;">
                <a href="profile.php" style="color: #94a3b8; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-chevron-left"></i>
                    <span>Back to Profile</span>
                </a>
            </div>

            <?php if (!empty($error_msg)): ?>
                <div style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                    <?php echo htmlspecialchars($error_msg); ?>
                </div>
            <?php endif; ?>

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
                                value="<?php echo htmlspecialchars($currentUsername); ?>" 
                                maxlength="20" 
                                required
                            >
                            <span class="char-counter" id="charCounter"><?php echo mb_strlen($currentUsername); ?>/20</span>
                        </div>

                        <div class="form-action-buttons">
                            <button type="submit" class="btn-save">Save changes</button>
                            <a href="profile.php" class="btn-cancel">Cancel</a>
                        </div>
                    </div>

                    <!-- Right Section: Avatar Upload Column -->
                    <div class="edit-avatar-right">
                        <div class="avatar-preview-ring" style="width: 100px; height: 100px; border-radius: 50%; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #1e293b; border: 2px solid #334155;">
                            <img id="avatar-preview-img" src="<?php echo (!empty($currentAvatar) && file_exists('../' .$currentAvatar)) ? '../' . htmlspecialchars($currentAvatar) :$defaultAvatarSvg; ?>" alt="Avatar Preview" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        
                        <label for="avatar_upload" class="btn-change-avatar" style="cursor: pointer; margin-top: 10px; display: inline-block;">
                            Change Avatar
                        </label>
                        <input type="file" id="avatar_upload" name="avatar" accept="image/*" class="hidden-file-input" style="display: none;">
                    </div>

                </form>
            </div>

        </main>
    </div>

    <!-- Scripts for Live Counter & Image Preview -->
    <script>
        // Live Character Counter
        const input = document.getElementById('character_name');
        const counter = document.getElementById('charCounter');

        input.addEventListener('input', () => {
            const currentLength = input.value.length;
            counter.textContent = `${currentLength}/20`;
        });

        // Live Image Preview before saving
        const avatarUpload = document.getElementById('avatar_upload');
        const avatarPreviewImg = document.getElementById('avatar-preview-img');

        avatarUpload.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    avatarPreviewImg.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>