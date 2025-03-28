document.addEventListener("DOMContentLoaded", function () {
    const partnerForm = document.getElementById("partner-form");

    if (partnerForm) {
        partnerForm.addEventListener("submit", function (event) {
            let valid = validateForm(partnerForm);

            if (!valid) {
                event.preventDefault();
            }
        });
    }

    // Validation function for form
    function validateForm(form) {
        let valid = true;
        const companyName = form.querySelector("input[name='company-name']").value.trim();
        const contactName = form.querySelector("input[name='contact-name']").value.trim();
        const email = form.querySelector("input[name='email']").value.trim();
        const phone = form.querySelector("input[name='phone']").value.trim();
        const message = form.querySelector("textarea[name='message']").value.trim();

        if (!companyName || !contactName || !email || !phone || !message) {
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