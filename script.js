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


// Function to handle the search logic
function handleSearch() {
    const searchQuery = document.getElementById("search-input").value.toLowerCase();
    const productCards = document.querySelectorAll(".product-card");

    productCards.forEach(function(card) {
        const productName = card.getAttribute("data-name").toLowerCase();

        // Check if the product name matches the search query
        if (productName.includes(searchQuery)) {
            card.style.display = "block";  // Show the product if it matches
        } else {
            card.style.display = "none";   // Hide the product if it doesn't match
        }
    });
}

// Event listener for the search button click
document.getElementById("search-button").addEventListener("click", function() {
    handleSearch();  // Call the search function on button click
});

// Event listener for pressing Enter key in the search input field
document.getElementById("search-input").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        handleSearch();  // Call the search function if Enter key is pressed
    }
});
