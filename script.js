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
}
