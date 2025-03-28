<?php
require_once dirname(__DIR__, 2) . '/server/config.php';
require_once dirname(__DIR__, 2) . '/server/database.php';

if (!isset($pdo)) {
    die("Error: \$pdo is not defined. Check database.php.");
}

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

try {
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <link rel="stylesheet" href="../css/Products.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body data-current-page="Products.php">
    <header class="header">
        <nav class="nav container">
            <a href="home.html" class="logo">
                <img src="../Img/endpoint-guard.webp" alt="Logo" width="40" height="40">
                EndpointGuard
            </a>
            <ul class="nav-links">
                <li><a href="Home.php">Home</a></li>
                <li><a href="Solutions.php">Solutions</a></li>
                <li><a href="Products.php">Products</a></li>
                <li><a href="Researchandservices.php">Research</a></li>
                <li><a href="Resources.php">Resources</a></li>
                <li><a href="Partners.php">Partners</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="cart.php" class="btn"><i class="fas fa-shopping-cart"></i><span id="cartCount">(0)</span></a></li>
                <li><a href="../../server/logout.php" class="btn btn-primary">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Product Grid Section -->
    <section class="product-grid">
        <?php foreach ($products as $product): ?>
            <form class="add-to-cart-form" data-product-id="<?php echo htmlspecialchars($product['id']); ?>">
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($product['image_path'] ?? ''); ?>" alt="<?php echo htmlspecialchars($product['name'] ?? ''); ?>" class="product-image">
                    <div class="product-content">
                        <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                        <ul class="product-features">
                            <?php
                            $features = explode(', ', $product['features']);
                            foreach ($features as $feature): ?>
                                <li><?php echo htmlspecialchars($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="product-subscription-price">
                            Subscription: Ksh<?php echo number_format($product['subscription_price_min'], 2); ?> - Ksh<?php echo number_format($product['subscription_price_max'], 2); ?> per device/user/month
                        </p>
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">
                        <input type="hidden" name="subscription_price_min" value="<?php echo htmlspecialchars($product['subscription_price_min']); ?>">
                        <input type="hidden" name="subscription_price_max" value="<?php echo htmlspecialchars($product['subscription_price_max']); ?>">
                        <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image_path'] ?? ''); ?>">
                        <button type="submit" class="btn">Add to Cart</button>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </section>

    <!-- Cart Items Element for JavaScript -->
    <div id="cartItems" style="display:none;"></div>
    <div id="subtotal" style="display:none;"></div>
    <div id="tax" style="display:none;"></div>
    <div id="total" style="display:none;"></div>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <h3 class="footer-title">EndpointGuard</h3>
                    <p>Advanced endpoint security for modern enterprises.</p>
                </div>
                <div>
                    <h3 class="footer-title">Solutions</h3>
                    <ul class="footer-links">
                        <li><a href="EnterpriseSecurity.php">Enterprise</a></li>
                        <li><a href="SmallBusinessSecurity.php">Small Business</a></li>
                        <li><a href="GovernmentSecurity.php">Government</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-title">Resources</h3>
                    <ul class="footer-links">
                        <li><a href="resources.php">Documentation</a></li>
                        <li><a href="resources.php">Blog</a></li>
                        <li><a href="resources.php">Support</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-title">Company</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="partners.php">Partners</a></li>
                        <li><a href="ContactUs.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/script.js"></script>
    <script>
        function updateCartIcon(cartCount) {
            document.querySelector('#cartCount').textContent = `(${cartCount})`;
        }

        document.querySelectorAll('.add-to-cart-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                const productId = this.dataset.productId;

                fetch('add_to_cart.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        updateCartIcon(data.cartCount);
                    } else {
                        alert('Failed to add to cart: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to add to cart.');
                });
            });
        });

        window.onload = function() {
            const cartCount = <?php echo json_encode(count($_SESSION['cart'] ?? [])); ?>;
            updateCartIcon(cartCount);
        }
    </script>
    <script src="../js/cart.js"></script>
</body>

</html>