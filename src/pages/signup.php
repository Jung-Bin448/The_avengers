<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameInput = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $userPassword = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (!empty($usernameInput) && !empty($email) && !empty($userPassword) && !empty($confirmPassword)) {
        if ($userPassword !== $confirmPassword) {
            $error = "Passwords do not match.";
        } else {
            $_SESSION['user_id'] = 1;
            $_SESSION['username'] = $usernameInput;
            $_SESSION['email'] = $email;

            header("Location: dashboard.php");
            exit();
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../assests/css/Style.css">
</head>
<body class="login-page-body">

    <div class="login-card">
        
        <div class="profile-avatar-gradient">
            <i class="fa-regular fa-user"></i>
        </div>

        <h1 class="login-title">Sign Up</h1>

        <!-- Error Message Display -->
        <?php if (!empty($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="signup.php" method="POST" class="login-form">
            
            <div class="form-group">
                <div class="label-row">
                    <label for="username">Username</label>
                </div>
                <div class="input-wrapper">
                    <i class="fa-regular fa-user input-icon"></i>
                    <input type="text" id="username" name="username" placeholder="Choose a username" required>
                </div>
            </div>

            <div class="form-group">
                <div class="label-row">
                    <label for="email">Email</label>
                </div>
                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>

            <div class="form-group">
                <div class="label-row">
                    <label for="password">Password</label>
                </div>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>

            <div class="form-group">
                <div class="label-row">
                    <label for="confirm_password">Confirm Password</label>
                </div>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" required>
                </div>
            </div>

            <button type="submit" class="btn-gradient-submit">Sign Up</button>

        </form>

        <div class="divider-container">
            <span class="divider-line"></span>
            <span class="divider-text">or continue with</span>
            <span class="divider-line"></span>
        </div>

        <div class="social-login-group">
            <button type="button" class="social-circle-btn" onclick="window.location.href='dashboard.php'">
                <svg class="google-icon-svg" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3h3.88c2.27-2.09 3.665-5.17 3.665-9.12z"/>
                    <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.11-6.72-4.96H1.29v3.09C3.26 21.3 3.26 21.3 3.26 21.3 7.31 24 12 24z"/>
                    <path fill="#FBBC05" d="M5.28 14.29c-.25-.72-.38-1.49-.38-2.29s.14-1.57.38-2.29V6.62H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.38l3.99-3.09z"/>
                    <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.31 0 3.26 2.7 1.29 6.62l3.99 3.09c.95-2.85 3.6-4.96 6.72-4.96z"/>
                </svg>
            </button>
            <button type="button" class="social-circle-btn" onclick="window.location.href='dashboard.php'">
                <i class="fa-brands fa-facebook-f facebook-icon"></i>
            </button>

        </div>

        <div class="signup-footer">
            <span>Already have an account?</span>
            <a href="login.php" class="signup-link">Log In &gt;</a>
        </div>

    </div>

    <!-- JavaScript -->
    <script>
    document.querySelector('form').addEventListener('submit', async function(event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);

        try {
            const response = await fetch('../api/signup.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                alert(result.message);
                window.location.href = 'login.php';
            } else {
                alert(result.message);
            }

        } catch (error) {
            console.error(error);
            alert('Something went wrong. Please try again.');
        }
    });
    </script>

</body>
</html>