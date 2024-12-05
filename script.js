// Form Validation Logic
document.addEventListener("DOMContentLoaded", () => {
    // Login Form Validation
    const loginForm = document.getElementById("login-form");
    if (loginForm) {
        loginForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const email = document.getElementById("email");
            const password = document.getElementById("password");

            let valid = true;

            if (!email.value) {
                showError("email-error", "Email is required");
                valid = false;
            } else {
                hideError("email-error");
            }

            if (!password.value) {
                showError("password-error", "Password is required");
                valid = false;
            } else {
                hideError("password-error");
            }

            if (valid) {
                alert("Login successful!");
                loginForm.reset();
            }
        });
    }

    // Register Form Validation
    const registerForm = document.getElementById("register-form");
    if (registerForm) {
        registerForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const username = document.getElementById("username");
            const email = document.getElementById("register-email");
            const password = document.getElementById("register-password");
            const confirmPassword = document.getElementById("confirm-password");

            let valid = true;

            if (!username.value) {
                showError("username-error", "Username is required");
                valid = false;
            } else {
                hideError("username-error");
            }

            if (!email.value) {
                showError("register-email-error", "Email is required");
                valid = false;
            } else {
                hideError("register-email-error");
            }

            if (!password.value) {
                showError("register-password-error", "Password is required");
                valid = false;
            } else {
                hideError("register-password-error");
            }

            if (password.value !== confirmPassword.value) {
                showError("confirm-password-error", "Passwords do not match");
                valid = false;
            } else {
                hideError("confirm-password-error");
            }

            if (valid) {
                alert("Registration successful!");
                registerForm.reset();
            }
        });
    }

    // Show Error
    function showError(id, message) {
        const errorElement = document.getElementById(id);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.style.display = "block";
        }
    }

    // Hide Error
    function hideError(id) {
        const errorElement = document.getElementById(id);
        if (errorElement) {
            errorElement.textContent = "";
            errorElement.style.display = "none";
        }
    }
});



// Navbar Content
const navbarHTML = `
    <nav class="navbar">
        <div class="logo"><a href="index.html">Absolute Mall</a></div>
        <ul class="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="register.html">Register</a></li>
        </ul>
        <div class="mobile-menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
`;

// Footer Content
const footerHTML = `
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>About Absolute Mall</h3>
                <p>Discover the best gadgets at unbeatable prices.</p>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p>Email: support@absolutemall.com</p>
                <p>Phone: +123-456-7890</p>
                <div class="social-icons">
                    <a href="#"><img src="images/facebook-icon.png" alt="Facebook"></a>
                    <a href="#"><img src="images/twitter-icon.png" alt="Twitter"></a>
                    <a href="#"><img src="images/instagram-icon.png" alt="Instagram"></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Absolute Mall. All rights reserved.</p>
        </div>
    </footer>
`;

// Inject Navbar and Footer
document.addEventListener("DOMContentLoaded", () => {
    const navbarContainer = document.querySelector("header");
    const footerContainer = document.querySelector("footer");

    if (navbarContainer) navbarContainer.innerHTML = navbarHTML;
    if (footerContainer) footerContainer.innerHTML = footerHTML;

    // Toggle Mobile Menu
    document.querySelector(".mobile-menu-toggle").addEventListener("click", () => {
        document.querySelector(".menu").classList.toggle("active");
    });
});
