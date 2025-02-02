# Query: const form = document.getElementById('contactForm');\nform.addEventListener('submit', function(event) {\n    const email = document.getElementById('email').value;\n    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/;\n    if (!emailPattern.test(email)) {\n        event.preventDefault();\n        alert('Ju lutem vendosni një email të vlefshëm.');\n    }\n});\n
# Flags: WordMatch
# ContextLines: 1

No Results
