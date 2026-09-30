<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Level Up Life</title>
    <!-- FontAwesome for Field Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="../assests/css/style.css">
</head>
<body>

    <div class="auth-container">
        <div class="auth-card">
            
            <div class="avatar-circle">
                <i class="fa-regular fa-user"></i>
            </div>

            <h1 class="auth-title">Sign UP</h1>

            <?php if (isset($_GET['error'])): ?>
                <div class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></div>
            <?php endif; ?>

            <form action="../api/signup.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-user input-icon"></i>
                        <input type="text" id="username" name="username" placeholder="Choose a Username" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-envelope input-icon"></i>
                        <input type="email" id="email" name="email" placeholder="Enter your Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" placeholder="Enter your Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your Password" required>
                    </div>
                </div>

                <button type="submit" class="btn-primary">Sign Up</button>
            </form>

            <div class="divider">
                <span>or continue with</span>
            </div>

            <div class="social-buttons">
                <a href="#" class="social-btn google"><i class="fa-brands fa-google"></i></a>
                <a href="#" class="social-btn facebook"><i class="fa-brands fa-facebook-f"></i></a>
            </div>

            <p class="auth-footer">
                Already have an account? <a href="login.php">Log In &gt;</a>
            </p>

        </div>
    </div>

</body>
</html>