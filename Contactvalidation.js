document.addEventListener("DOMContentLoaded", function () {
    const contactForm = document.getElementById("contactForm");

    if (contactForm) {
        contactForm.addEventListener("submit", function (event) {
            let valid = validateForm(contactForm);

            if (!valid) {
                event.preventDefault();
            }
        });
    }

    // Validation function for form
    function validateForm(form) {
        let valid = true;
        const name = form.querySelector("input[name='name']").value.trim();
        const company = form.querySelector("input[name='company']").value.trim();
        const email = form.querySelector("input[name='email']").value.trim();
        const phone = form.querySelector("input[name='phone']").value.trim();
        const solution = form.querySelector("select[name='solution']").value.trim();
        const message = form.querySelector("textarea[name='message']").value.trim();

        if (!name || !company || !email || !phone || !solution || !message) {
            valid = false;
            alert("All fields are required.");
        }

        if (!validateEmail(email)) {
            valid = false;
            alert("Please enter a valid email address.");
        }

        return valid;
    }

    // Email validation function
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(email);
    }
});