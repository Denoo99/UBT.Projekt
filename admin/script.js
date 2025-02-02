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

        if (!searchInput || !productGrid) return;

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

    // Slideshow Fix
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const slider = document.querySelector('.slider');

    if (slides.length > 0 && slider) {
        const totalSlides = slides.length;

        function showSlide(index) {
            const offset = -index * (100 / totalSlides);
            slider.style.transform = `translateX(${offset}%)`;
        }

        function moveSlide(direction) {
            currentIndex += direction;
            if (currentIndex < 0) {
                currentIndex = totalSlides - 1;
            } else if (currentIndex >= totalSlides) {
                currentIndex = 0;
            }
            showSlide(currentIndex);
        }

        setInterval(() => {
            moveSlide(1);
        }, 3000);
    }

    // Cookie Consent Fix
    function setCookie(name, value, days) {
        const expires = new Date(Date.now() + days * 864e5).toUTCString();
        document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/';
    }

    function getCookie(name) {
        return document.cookie.split('; ').reduce((r, c) => {
            const [key, val] = c.split('=');
            return key === name ? decodeURIComponent(val) : r;
        }, '');
    }

    function checkCookie() {
        const userConsent = getCookie('cookieConsent');
        const themePreference = getCookie('themePreference');
        const languagePreference = getCookie('languagePreference');
        const cookieBanner = document.getElementById('cookie-consent');

        if (cookieBanner) {
            if (userConsent) {
                cookieBanner.style.display = 'none';
            } else {
                cookieBanner.style.display = 'block';
            }
        }

        if (themePreference) {
            document.body.className = themePreference;
        }

        if (languagePreference) {
            alert('Language preference set to: ' + languagePreference);
        }
    }

    checkCookie();

    const acceptCookiesButton = document.getElementById('accept-cookies');
    if (acceptCookiesButton) {
        acceptCookiesButton.onclick = function () {
            setCookie('cookieConsent', 'accepted', 7);
            document.getElementById('cookie-consent').style.display = 'none';
        };
    }

    const themeButton = document.getElementById('set-theme');
    if (themeButton) {
        themeButton.onclick = function () {
            const theme = prompt('Enter theme (light/dark):');
            if (theme === 'light' || theme === 'dark') {
                setCookie('themePreference', theme, 30);
                document.body.className = theme;
            }
        };
    }

    const languageButton = document.getElementById('set-language');
    if (languageButton) {
        languageButton.onclick = function () {
            const language = prompt('Enter your preferred language:');
            setCookie('languagePreference', language, 30);
            alert('Language preference set to: ' + language);
        };
    }
});
