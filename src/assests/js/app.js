// ==========================================
// SHARED ELEMENTS
// ==========================================

const googleButton = document.getElementById("googleButton");
const facebookButton = document.getElementById("facebookButton");

// Google Button Click
if (googleButton) {
    googleButton.addEventListener("click", function (e) {
        e.preventDefault();
        alert("Google OAuth feature coming soon!");
    });
}

// Facebook Button Click
if (facebookButton) {
    facebookButton.addEventListener("click", function (e) {
        e.preventDefault();
        alert("Facebook OAuth feature coming soon!");
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