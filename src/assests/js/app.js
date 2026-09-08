// ==========================================
// SHARED ELEMENTS
// ==========================================

const googleButton = document.getElementById("googleButton");
const facebookButton = document.getElementById("facebookButton");

// Google Button Click
if (googleButton) {
    googleButton.addEventListener("click", function (e) {
        e.preventDefault();
        alert("Google button clicked!");
    });
}

// Facebook Button Click
if (facebookButton) {
    facebookButton.addEventListener("click", function (e) {
        e.preventDefault();
        alert("Facebook button clicked!");
    });
}

// ==========================================
// LOGIN PAGE LOGIC (login.php)
// ==========================================

const loginButton = document.getElementById("loginButton");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");

if (loginButton && emailInput && passwordInput && !document.getElementById("username")) {
    loginButton.addEventListener("click", function (e) {
        e.preventDefault(); // Prevents page reload

        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        if (email === "") {
            alert("Please enter your email.");
            emailInput.focus();
            return;
        }

        if (password === "") {
            alert("Please enter your password.");
            passwordInput.focus();
            return;
        }

        alert("Login button clicked successfully!");
        console.log("Email:", email);
        console.log("Password:", password);
    });
}

// ==========================================
// SIGN UP PAGE LOGIC (signup.php)
// ==========================================

const signupButton = document.getElementById("signupButton");
const usernameInput = document.getElementById("username");
const confirmPasswordInput = document.getElementById("confirm_password");

if (signupButton) {
    signupButton.addEventListener("click", function (e) {
        e.preventDefault(); // Prevents page reload

        const username = usernameInput ? usernameInput.value.trim() : "";
        const email = emailInput ? emailInput.value.trim() : "";
        const password = passwordInput ? passwordInput.value.trim() : "";
        const confirmPassword = confirmPasswordInput ? confirmPasswordInput.value.trim() : "";

        if (username === "") {
            alert("Please enter a username.");
            usernameInput.focus();
            return;
        }

        if (email === "") {
            alert("Please enter your email.");
            emailInput.focus();
            return;
        }

        if (password === "") {
            alert("Please enter your password.");
            passwordInput.focus();
            return;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            confirmPasswordInput.focus();
            return;
        }

        alert("Sign Up button clicked successfully!");
        console.log("Username:", username);
        console.log("Email:", email);
    });
}