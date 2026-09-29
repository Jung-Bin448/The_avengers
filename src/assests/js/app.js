// ==========================================
// SHARED ELEMENTS
// ==========================================

const googleButton = document.getElementById("googleButton");
const facebookButton = document.getElementById("facebookButton");

// Google Button Click - Navigate directly to dashboard
if (googleButton) {
    googleButton.addEventListener("click", function (e) {
        e.preventDefault();
        window.location.href = "dashboard.php";
    });
}

// Facebook Button Click - Navigate directly to dashboard
if (facebookButton) {
    facebookButton.addEventListener("click", function (e) {
        e.preventDefault();
        window.location.href = "dashboard.php";
    });
}

// ==========================================
// NAVIGATION & INTERACTIVE UI
// ==========================================

document.addEventListener('DOMContentLoaded', () => {
  // Handle Login form redirection
  const loginForm = document.getElementById('login-form');
  if (loginForm) {
    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      // Redirect directly to dashboard upon submit
      window.location.href = 'dashboard.php';
    });
  }

  // Handle Signup form redirection
  const signupForm = document.getElementById('signup-form');
  if (signupForm) {
    signupForm.addEventListener('submit', (e) => {
      e.preventDefault();
      // Redirect to login or dashboard
      window.location.href = 'login.php';
    });
  }
});