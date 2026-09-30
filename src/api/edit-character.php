<?php
session_start();
require_once '../config/database.php'; // Fixed path to your config file

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
// Fixed query to use user_id and avatar_path
$stmt = $pdo->prepare("SELECT username, avatar_path FROM users WHERE user_id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

$username = $user['username'] ?? '';
$avatar = $user['avatar_path'] ?? ''; // Fixed array index name
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Character - Level Up Life</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>

    <!-- Include your sidebar layout here -->

    <div class="main-content" style="padding: 40px;">
        <h2>Edit Character Name & Avatar</h2>

        <?php if (isset($_GET['success'])): ?>
            <div style="color: #4ade80; margin-bottom: 15px; font-size: 14px;">Changes saved successfully!</div>
        <?php endif; ?>

        <form action="../api/update-profile.php" method="POST" enctype="multipart/form-data" style="display: flex; gap: 40px; align-items: flex-start; margin-top: 30px;">
            
            <!-- Character Name Card Section -->
            <div style="background: #111827; border: 1px solid #1f2937; padding: 30px; border-radius: 12px; flex: 1; max-width: 600px;">
                <label style="font-size: 12px; color: #94a3b8; font-weight: 700; letter-spacing: 0.5px;">CHARACTER NAME</label>
                
                <div style="margin-top: 10px; position: relative;">
                    <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" maxlength="20" required style="width: 100%; background: #1e293b; border: 1px solid #334155; padding: 12px 16px; border-radius: 8px; color: #fff;">
                    <span style="position: absolute; right: 12px; top: 14px; font-size: 12px; color: #64748b;"><?php echo strlen($username); ?>/20</span>
                </div>

                <div style="margin-top: 25px; display: flex; gap: 12px;">
                    <button type="submit" style="background: #2563eb; color: #fff; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 600; cursor: pointer;">Save changes</button>
                    <a href="dashboard.php" style="background: #1e293b; color: #cbd5e1; border: 1px solid #334155; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-block;">Cancel</a>
                </div>
            </div>

            <!-- Avatar Preview & Upload Section -->
            <div style="display: flex; flex-direction: column; align-items: center;">
                <div style="width: 90px; height: 90px; border-radius: 50%; border: 2px solid #10b981; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #1e293b;">
                    <?php if (!empty($avatar) && file_exists('../' . $avatar)): ?>
                        <img src="../<?php echo htmlspecialchars($avatar); ?>" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <i class="fa-solid fa-user" style="font-size: 36px; color: #94a3b8;"></i>
                    <?php endif; ?>
                </div>

                <!-- Hidden File Input -->
                <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display: none;" onchange="this.form.submit()">
                
                <button type="button" onclick="document.getElementById('avatarInput').click();" style="margin-top: 15px; background: #1e293b; color: #cbd5e1; border: 1px solid #334155; padding: 8px 16px; border-radius: 8px; font-size: 13px; cursor: pointer;">Change Avatar</button>
            </div>

        </form>
    </div>

</body>
</html>