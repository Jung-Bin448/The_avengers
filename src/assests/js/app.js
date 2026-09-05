// =========================
// GET ELEMENTS
// =========================

const loginButton = document.getElementById("loginButton");

const googleButton = document.getElementById("googleButton");

const facebookButton = document.getElementById("facebookButton");

const signupLink = document.getElementById("signupLink");

const emailInput = document.getElementById("email");

const passwordInput = document.getElementById("password");


// =========================
// LOGIN
// =========================

loginButton.addEventListener("click", function () {

    const email = emailInput.value.trim();

    const password = passwordInput.value.trim();


    // Check empty fields

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


    // Basic email validation

    if (!email.includes("@")) {
        alert("Please enter a valid email address.");
        emailInput.focus();
        return;
    }


    // Temporary login message

    alert("Login successful!");


    console.log("Email:", email);
    console.log("Password:", password);

});


// =========================
// GOOGLE LOGIN
// =========================

googleButton.addEventListener("click", function () {

    alert("Google login will be connected later.");

});


// =========================
// FACEBOOK LOGIN
// =========================

facebookButton.addEventListener("click", function () {

    alert("Facebook login will be connected later.");

});


// =========================
// SIGN UP
// =========================

signupLink.addEventListener("click", function (event) {

    event.preventDefault();

    alert("Sign Up page will be added next.");

});