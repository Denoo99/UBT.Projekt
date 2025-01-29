document.addEventListener("DOMContentLoaded", () => {
    // Search Functionality
    const searchInput = document.getElementById("search-input");
    const searchButton = document.getElementById("search-button"); // Ensure a search button exists

    window.searchProduct = (event) => { 
        if (!searchInput) {
            console.error("Search input field with id 'search-input' was not found.");
            return;
        }

        if (!event || event.key === "Enter" || event.type === "click") {
            const searchQuery = searchInput.value.trim().toLowerCase();
            const productCards = document.querySelectorAll(".product-card");

            if (!productCards.length) {
                console.error("No product cards found.");
                return;
            }

            let matchesFound = false;

            productCards.forEach((card) => {
                const productName = card.getAttribute("data-name")?.toLowerCase() || "";
                
                if (productName.includes(searchQuery) || searchQuery === "") {
                    card.style.display = "block";
                    matchesFound = true;
                } else {
                    card.style.display = "none";
                }
            });

            // Handle "No results found" message
            let noResultsMessage = document.getElementById("no-results");
            
            if (!matchesFound && searchQuery) {
                if (!noResultsMessage) {
                    noResultsMessage = document.createElement("div");
                    noResultsMessage.id = "no-results";
                    noResultsMessage.innerText = "Nuk u gjet asnjë produkt që përputhet me kërkimin tuaj.";
                    noResultsMessage.style.color = "red";
                    noResultsMessage.style.textAlign = "center";
                    noResultsMessage.style.marginTop = "20px";
                    document.querySelector(".product-section")?.appendChild(noResultsMessage);
                } else {
                    noResultsMessage.style.display = "block";
                }
            } else if (noResultsMessage) {
                noResultsMessage.style.display = "none";
            }
        }
    };

    // Attach event listener for the search button if it exists
    if (searchButton) {
        searchButton.addEventListener("click", searchProduct);
    }

    // Attach event listener for "Enter" key press in input
    if (searchInput) {
        searchInput.addEventListener("keyup", searchProduct);
    }
});
