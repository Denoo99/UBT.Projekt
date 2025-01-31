document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("search-input");
    const searchButton = document.querySelector(".search-bar button");
    const productGrid = document.querySelector(".product-grid");

    const normalizeString = (str) => {
        return str
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .toLowerCase()
            .trim();
    };

    window.searchProduct = (event) => {
        if (event && event.type === "keyup" && event.key !== "Enter") {
            return;
        }

        const searchQuery = normalizeString(searchInput.value);
        const productCards = document.querySelectorAll(".product-card");
        let matchesFound = false;

        productCards.forEach((card) => {
            const productName = normalizeString(card.getAttribute("data-name") || "");
            if (productName.includes(searchQuery)) {
                card.style.display = "block";
                matchesFound = true;
            } else {
                card.style.display = "none";
            }
        });

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

        if (matchesFound) {
            productGrid.style.display = "flex";
            productGrid.style.flexDirection = "row";
            productGrid.style.justifyContent = "center";
            productGrid.style.flexWrap = "wrap";
            productGrid.style.gap = "20px";
            productGrid.style.padding = "20px";
        } else {
            productGrid.style.display = "grid";
            productGrid.style.gridTemplateColumns = "repeat(auto-fit, minmax(200px, 1fr))";
            productGrid.style.gap = "20px";
        }
    };

    if (searchButton) {
        searchButton.addEventListener("click", searchProduct);
    }
    if (searchInput) {
        searchInput.addEventListener("keyup", searchProduct);
    }
});
