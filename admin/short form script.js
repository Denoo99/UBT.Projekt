document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("search-input");
    const cart = [];
    const updateCartCount = () => {
        const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
        document.getElementById("cart-icon").innerText = `Shporta (${cartCount})`;
    };

    window.searchProduct = (event) => {
        if (!searchInput || (event && event.key !== "Enter" && event.type !== "click")) return;
        const query = searchInput.value.trim().toLowerCase();
        let matches = false;

        document.querySelectorAll(".product-card").forEach(card => {
            const productName = card.getAttribute("data-name")?.toLowerCase();
            if (query && productName?.includes(query)) {
                card.style.display = "block";
                matches = true;
            } else {
                card.style.display = "none";
            }
        });

        const noResults = document.getElementById("no-results");
        if (query && !matches) {
            if (!noResults) {
                const msg = document.createElement("div");
                msg.id = "no-results";
                msg.innerText = "Nuk u gjet asnjë produkt që përputhet me kërkimin tuaj.";
                msg.style.color = "red";
                msg.style.textAlign = "center";
                msg.style.marginTop = "20px";
                document.querySelector(".product-section")?.appendChild(msg);
            } else noResults.style.display = "block";
        } else if (noResults) noResults.style.display = "none";
    };

    const addToCart = (name, price) => {
        const item = cart.find(i => i.name === name);
        item ? item.quantity++ : cart.push({ name, price, quantity: 1 });
        updateCartCount();
    };

    window.addToCart = addToCart;
    window.buyNow = (name, price) => {
        addToCart(name, price);
        window.location.href = "cart.html";
    };
});
