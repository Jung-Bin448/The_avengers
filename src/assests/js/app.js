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

document.addEventListener("DOMContentLoaded", function () {
    const navItems = document.querySelectorAll(".nav-item");
    navItems.forEach((item) => {
        item.addEventListener("click", function () {
            navItems.forEach((nav) => nav.classList.remove("active"));
            this.classList.add("active");
        });
    });
});