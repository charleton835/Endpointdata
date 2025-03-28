// Navigation and header functionality
document.addEventListener('DOMContentLoaded', function() {
    const currentPageAttr = document.body.getAttribute('data-current-page');
    
    if (!currentPageAttr) {
        console.error('Error: data-current-page attribute is missing on <body>');
        return;
    }
    
    const currentPage = currentPageAttr.toLowerCase();

    if (currentPage === 'payment.php') {
        return;
    }

    const navLinks = document.querySelectorAll('.nav-links li a');

    if (navLinks.length === 0) {
        console.warn('No navigation links found.');
        return;
    }

    // Set active navigation link
    navLinks.forEach(link => {
        let linkPage = link.getAttribute('href').toLowerCase();
        if (currentPage === linkPage) {
            link.classList.add('active');
        }
    });

    // Handle navigation click events
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Header scroll effect
    const header = document.querySelector('.header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    } else {
        console.warn('Header element not found.');
    }

    // Cart functionality
    updateCartCount();
    initializeCartForms();
});

// Update cart count in the header
function updateCartCount() {
    fetch('/CYBERSECURITY/server/get_cart_count.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.querySelector('#cartCount').textContent = `(${data.count})`;
            }
        })
        .catch(error => console.error('Error updating cart count:', error));
}

// Show notification
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Initialize cart form handlers
function initializeCartForms() {
    document.querySelectorAll('form[action*="add_to_cart.php"]').forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showNotification('Product added to cart');
                    updateCartCount();
                } else {
                    showNotification(data.message || 'Error adding product to cart', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error adding product to cart', 'error');
            });
        });
    });
}