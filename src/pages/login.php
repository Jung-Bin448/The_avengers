<?php
session_start();

// Database configuration based on Docker setup
$host = 'db';
$dbname = 'level_up_life';
$username = 'levelup';
$password = 'levelup123';

$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $userPassword = $_POST['password'] ?? '';

    if (!empty($email) && !empty($userPassword)) {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Fetch user by email
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password
            if ($user && password_verify($userPassword, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                header("Location: ../index.php");
                exit;
            } else {
                $error = "Invalid email or password.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
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
    <title>Level Up Life - Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assests/css/Style.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <div class="login-container">

        <!-- Profile Icon -->
        <div class="profile-icon">
            <i class="fa-regular fa-user"></i>
        </div>

        <h1>Login</h1>

        <!-- Error Message Display -->
        <?php if (!empty($error)): ?>
            <div style="color: #ff4d4d; background-color: rgba(255, 77, 77, 0.1); border: 1px solid #ff4d4d; padding: 10px; border-radius: 8px; margin-bottom: 15px; font-size: 13px; text-align: center;">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <!-- Form Submission -->
        <form action="login.php" method="POST">

            <!-- Email -->
            <div class="input-group">
                <div class="label-row">
                    <label for="email">Email</label>
                    <a href="#" class="forgot-password">
                        Forgot password?
                    </a>
                </div>

                <div class="input-box">
                    <i class="fa-regular fa-envelope"></i>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Enter your email" 
                        required
                    >
                </div>
            </div>

            <!-- Password -->
            <div class="input-group">
                <div class="label-row">
                    <label for="password">Password</label>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Enter your password" 
                        required
                    >
                </div>
            </div>

            <!-- Login Button -->
            <button type="submit" class="login-button" id="loginButton">
                Log In
            </button>

        </form>

        <!-- Divider -->
        <div class="divider">
            <span>or continue with</span>
        </div>

<!-- Social Login -->
        <div class="social-login">
            <!-- Google Button -->
            <button class="social-button" id="googleButton">
                <svg class="google-icon" viewBox="0 0 24 24" width="20" height="20">
                    <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3h3.88c2.27-2.09 3.665-5.17 3.665-9.12z"/>
                    <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.11-6.72-4.96H1.29v3.09C3.26 21.3 7.31 24 12 24z"/>
                    <path fill="#FBBC05" d="M5.28 14.29c-.25-.72-.38-1.49-.38-2.29s.14-1.57.38-2.29V6.62H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.38l3.99-3.09z"/>
                    <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.31 0 3.26 2.7 1.29 6.62l3.99 3.09c.95-2.85 3.6-4.96 6.72-4.96z"/>
                </svg>
            </button>

            <!-- Facebook Button -->
            <button class="social-button" id="facebookButton">
                <i class="fa-brands fa-facebook-f facebook-icon"></i>
            </button>
        </div>

        <!-- Link to Sign Up Page -->
        <div class="register">
            <span>Not registered yet?</span>
            <a href="signup.php" id="signupLink">
                Sign Up &gt;
            </a>
        </div>

    </div>

    <!-- JavaScript -->
    <script src="../assests/js/app.js"></script>

</body>
</html>