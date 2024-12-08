document.addEventListener("DOMContentLoaded", () => {
    // Search Functionality
    const searchInput = document.getElementById("search-input");

    window.searchProduct = (event) => { 
        if (!searchInput) {
            console.error("Search input field with id 'search-input' was not found.");
            return;
        }

        if (!event || event.key === "Enter" || event.type === "click") {
            const searchQuery = searchInput.value.trim().toLowerCase();
            const productCards = document.querySelectorAll(".product-card");

            if (!productCards) {
                console.error("No product cards found.");
                return;
            }

            let matchesFound = false;

            productCards.forEach((card) => {
                const productName = card.getAttribute("data-name")?.toLowerCase();
                // Ensure the attribute exists
                if (productName) {
                    if (!searchQuery || productName.includes(searchQuery)) {
                        card.style.display = "block";
                        matchesFound = true;
                    } else {
                        card.style.display = "none";
                    }
                }
            });

            // Show "No results found" message if no matches
            const noResultsMessage = document.getElementById("no-results");
            if (!matchesFound && searchQuery) {
                if (!noResultsMessage) {
                    const message = document.createElement("div");
                    message.id = "no-results";
                    message.innerText = "Nuk u gjet asnjë produkt që përputhet me kërkimin tuaj.";
                    message.style.color = "red";
                    message.style.textAlign = "center";
                    message.style.marginTop = "20px";
                    document.querySelector(".product-section")?.appendChild(message);
                } else {
                    noResultsMessage.style.display = "block";
                }
            } else if (noResultsMessage) {
                noResultsMessage.style.display = "none";
            }
        }
    };

    // Cart Functionality
    let cart = [];

    const addToCart = (productName, price) => {
        const existingProduct = cart.find((item) => item.name === productName);
        if (existingProduct) {
            existingProduct.quantity++;
        } else {
            cart.push({ name: productName, price, quantity: 1 });
        }
        updateCartCount();
    };

    const buyNow = (productName, price) => {
        addToCart(productName, price);
        window.location.href = "cart.html"; 
    };

    const updateCartCount = () => {
        const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
        const cartIcon = document.getElementById("cart-icon");
        if (cartIcon) {
            cartIcon.innerText = `Shporta (${cartCount})`;
        }
    };

    // Attach functions to the global window object for HTML onclick attributes
    window.addToCart = addToCart;
    window.buyNow = buyNow;
});






// JavaScript to cycle through the images inside .slide elements
const slides = document.querySelectorAll('.slider .slide');
let currentIndex = 0;

// Function to show the next slide
function showNextSlide() {
  // Hide all slides
  slides.forEach((slide, index) => {
    slide.style.display = index === currentIndex ? 'block' : 'none';
  });

  // Move to the next slide
  currentIndex = (currentIndex + 1) % slides.length;
}

// Initially, show the first slide
showNextSlide();

// Change slide every 3 seconds
setInterval(showNextSlide, 3000);

