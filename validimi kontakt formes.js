document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    
    if (form) {
        form.addEventListener("submit", function (event) {
            const emailInput = document.getElementById("email");
            const email = emailInput.value.trim();
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (email === "") {
                event.preventDefault();
                alert("Ju lutem vendosni një email.");
                emailInput.focus();
                return;
            }

            if (!emailPattern.test(email)) {
                event.preventDefault();
                alert("Ju lutem vendosni një email të vlefshëm.");
                emailInput.focus();
            }
        });
    }
});
