document.addEventListener("DOMContentLoaded", function () {
    const consultationForm = document.getElementById("consultationForm");
    const quickAdviceForm = document.querySelector("form[action='QuickAdviceHandler.php']");

    // Book Consultation form validation
    if (consultationForm) {
        consultationForm.addEventListener("submit", function (event) {
            let valid = validateForm(consultationForm);

            if (!valid) {
                event.preventDefault();
            }
        });
    }

    // Quick Advice form validation
    if (quickAdviceForm) {
        quickAdviceForm.addEventListener("submit", function (event) {
            let valid = validateForm(quickAdviceForm);

            if (!valid) {
                event.preventDefault();
            }
        });
    }

    // Validation function for form
    function validateForm(form) {
        let valid = true;
        const name = form.querySelector("input[name='name'], input[name='quick-name']") ? form.querySelector("input[name='name'], input[name='quick-name']").value.trim() : '';
        const email = form.querySelector("input[name='email'], input[name='quick-email']") ? form.querySelector("input[name='email'], input[name='quick-email']").value.trim() : '';
        const phone = form.querySelector("input[name='phone']") ? form.querySelector("input[name='phone']").value.trim() : '';
        const message = form.querySelector("textarea[name='message'], textarea[name='quick-question']") ? form.querySelector("textarea[name='message'], textarea[name='quick-question']").value.trim() : '';

        if (!name || !email || (form.querySelector("input[name='phone']") && !phone) || !message) {
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