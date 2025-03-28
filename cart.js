let cart = [];

// Fetch cart data from the server
function fetchCart() {
    fetch('/CYBERSECURITY/server/cart.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                cart = data.cart || [];
                renderCart();
            } else {
                console.error('Error fetching cart:', data.message);
            }
        })
        .catch(error => {
            console.error('Error fetching cart:', error);
        });
}

// Render cart items
function renderCart() {
    const cartContainer = document.getElementById('cartItems');
    
    if (!cart || cart.length === 0) {
        cartContainer.innerHTML = '<div class="empty-cart">Your cart is empty</div>';
        updateCartTotals();
        return;
    }

    cartContainer.innerHTML = cart.map(item => {
        const priceMin = typeof item.subscription_price_min === 'number' ? item.subscription_price_min.toFixed(2) : '0.00';
        const priceMax = typeof item.subscription_price_max === 'number' ? item.subscription_price_max.toFixed(2) : '0.00';

        // Debug log to check item structure
        console.log('Item:', item);

        return `
            <div class="cart-item" data-id="${item.id}">
                <img src="${item.image || ''}" alt="${item.name || 'Product Image'}">
                <div class="item-details">
                    <h3>${item.name || 'Unknown Product'}</h3>
                    <div class="item-price">Ksh${priceMin} - Ksh${priceMax}</div>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="updateQuantity('${item.id}', -1)">-</button>
                        <input type="number" class="quantity-input" value="${item.quantity || 1}" 
                               onchange="updateQuantityDirectly('${item.id}', this.value)">
                        <button class="quantity-btn" onclick="updateQuantity('${item.id}', 1)">+</button>
                    </div>
                </div>
                <button class="remove-btn" onclick="removeItem('${item.id}')">Remove</button>
            </div>
        `;
    }).join('');

    updateCartTotals();
}

// Update quantity
function updateQuantity(itemId, change) {
    const itemIndex = cart.findIndex(item => item.id === itemId);
    if (itemIndex > -1) {
        const newQuantity = (cart[itemIndex].quantity || 1) + change;
        if (newQuantity > 0) {
            cart[itemIndex].quantity = newQuantity;
            updateCartOnServer('update', { cart });
        }
    }
}

// Update quantity directly
function updateQuantityDirectly(itemId, newQuantity) {
    const itemIndex = cart.findIndex(item => item.id === itemId);
    if (itemIndex > -1 && !isNaN(newQuantity) && newQuantity > 0) {
        cart[itemIndex].quantity = parseInt(newQuantity);
        updateCartOnServer('update', { cart });
    }
}

// Remove item from cart
function removeItem(itemId) {
    if (!confirm('Are you sure you want to remove this item?')) {
        return;
    }
    
    updateCartOnServer('remove', { id: itemId });
}

// Update cart totals
function updateCartTotals() {
    if (!cart || cart.length === 0) {
        document.getElementById('subtotal').textContent = 'Ksh0.00';
        document.getElementById('tax').textContent = 'Ksh0.00';
        document.getElementById('total').textContent = 'Ksh0.00';
        return;
    }

    const subtotal = cart.reduce((sum, item) => {
        const price = typeof item.subscription_price_min === 'number' ? item.subscription_price_min : 0;
        const quantity = parseInt(item.quantity || 1);
        return sum + (price * quantity);
    }, 0);

    const tax = subtotal * 0.1; 
    const total = subtotal + tax;

    document.getElementById('subtotal').textContent = `Ksh${subtotal.toFixed(2)}`;
    document.getElementById('tax').textContent = `Ksh${tax.toFixed(2)}`;
    document.getElementById('total').textContent = `Ksh${total.toFixed(2)}`;
}

// Update cart on the server
function updateCartOnServer(action, data) {
    fetch('/CYBERSECURITY/server/cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ action, ...data })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            cart = data.cart || [];
            renderCart();
            // Update cart count in the header
            const cartCount = cart.length;
            document.querySelector('#cartCount').textContent = `(${cartCount})`;
        } else {
            console.error('Error updating cart:', data.message);
        }
    })
    .catch(error => {
        console.error('Error updating cart:', error);
    });
}

// Handle checkout
function checkout() {
    if (!cart || cart.length === 0) {
        alert('Your cart is empty!');
        return;
    }

    window.location.href = '/CYBERSECURITY/public/pages/checkout.php';
}

// Initialize the cart when the page loads
document.addEventListener('DOMContentLoaded', fetchCart);