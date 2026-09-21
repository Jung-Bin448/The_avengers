<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Get the logged in user's name or default to Serena
$username = $_SESSION['username'] ?? 'Serena';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level Up Life - Profile</title>
    <link rel="stylesheet" href="../assests/css/Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <div class="login-container">
        <div class="profile-icon">
            <i class="fa-solid fa-user-astronaut"></i>
        </div>

        <h1>Hi, <?php echo htmlspecialchars($username); ?>!</h1>
        <p style="color: #a0a0a0; margin-bottom: 25px; text-align: center;">Welcome back to Level Up Life.</p>

        <a href="dashboard.php" class="login-button" style="display: block; text-align: center; text-decoration: none; line-height: 45px; margin-bottom: 15px;">
            Go to Quests / Dashboard
        </a>

        <div class="register" style="margin-top: 20px;">
            <a href="login.php" style="color: #ff4d4d; text-decoration: none;">Log Out</a>
        </div>
    </div>

</body>
</html>