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

    // Search Functionality
    const searchButton = document.getElementById("search-button");
    const searchInput = document.getElementById("search-input");

    if (searchButton && searchInput) {
        // Event listener for the search button click
        searchButton.addEventListener("click", function () {
            handleSearch(); // Call the search function on button click
        });

        // Event listener for pressing Enter key in the search input field
        searchInput.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                handleSearch(); // Call the search function if Enter key is pressed
            }
        });

        function handleSearch() {
            const searchQuery = searchInput.value.toLowerCase();
            const productCards = document.querySelectorAll(".product-card");

            productCards.forEach(function (card) {
                const productName = card.getAttribute("data-name").toLowerCase();

                // Check if the product name matches the search query
                if (productName.includes(searchQuery)) {
                    card.style.display = "block"; // Show the product if it matches
                } else {
                    card.style.display = "none"; // Hide the product if it doesn't match
                }
            });
        }
    }

    // Slider Functionality
    const slides = document.querySelectorAll(".slide");
    if (slides.length > 0) {
        let currentIndex = 0;

        const showSlide = () => {
            slides.forEach((slide, index) => {
                slide.style.transform = `translateX(${(index - currentIndex) * 100}%)`;
            });
            currentIndex = (currentIndex + 1) % slides.length;
        };

        // Initialize the slider
        showSlide(); // Show the first slide
        setInterval(showSlide, 4000); // Auto-slide every 4 seconds
    }
}); // End of the DOMContentLoaded event listener





let cart = [];

function addToCart(productName, price) {
    cart.push({ name: productName, price: price, quantity: 1 });
    updateCartCount();
}

function buyNow(productName, price) {
    addToCart(productName, price);
    window.location.href = 'cart.html'; // Redirect to cart page
}

function updateCartCount() {
    const cartCount = cart.length;
    document.getElementById('cart-icon').innerText = `Cart (${cartCount})`;
}

// Search function triggered by Enter key or button click
function searchProduct(event) {
    if (event.key === 'Enter' || event.type === 'click') {
        const searchTerm = document.getElementById('search-input').value.toLowerCase();
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
            const productName = card.getAttribute('data-name').toLowerCase();
            if (productName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
}
