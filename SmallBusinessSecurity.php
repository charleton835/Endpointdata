<?php
require_once dirname(__DIR__, 2) . '/server/config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Small Business Security Solutions</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/SmallBusinessSecurity.css">
</head>

<body data-current-page="SmallBusinessSecurity.php">
    <header class="header">
        Small Business Security Solutions
    </header>

    <div class="container">
        <header class="page-header">
            <p>Affordable and easy-to-manage security for growing businesses</p>
        </header>

        <div class="features-grid">
            <div class="feature-card">
                <a href="Easy-management.php">
                    <h3>Easy Management</h3>
                    <p>User-friendly dashboard with simple controls and automated security updates, perfect for businesses without dedicated IT staff.</p>
                </a>
            </div>

            <div class="feature-card">
                <a href="Essential-protection.php">
                    <h3>Essential Protection</h3>
                    <p>Complete security suite including antivirus, firewall, and ransomware protection designed for small business needs.</p>
                </a>
            </div>

            <div class="feature-card">
                <a href="Cloud-security.php">
                    <h3>Cloud Security</h3>
                    <p>Secure cloud storage and backup solutions with automatic syncing and disaster recovery options.</p>
                </a>
            </div>
        </div>

        <section class="pricing-section">
            <h2>Small Business Pricing</h2>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3>Starter</h3>
                    <div class="price">Ksh12,806.00<span>/month</span></div>
                    <ul class="feature-list">
                        <li>Up to 10 users</li>
                        <li>Basic security suite</li>
                        <li>Email support</li>
                        <li>5TB cloud storage</li>
                    </ul>
                    <a href="Payment.php?plan=starter" class="cta-button">Get Started</a>
                </div>

                <div class="pricing-card">
                    <h3>Business</h3>
                    <div class="price">Ksh25,741.00<span>/month</span></div>
                    <ul class="feature-list">
                        <li>Up to 25 users</li>
                        <li>Advanced security</li>
                        <li>24/7 support</li>
                        <li>10TB cloud storage</li>
                        <li>Mobile protection</li>
                    </ul>
                    <a href="Payment.php?plan=business" class="cta-button">Get Started</a>
                </div>

                <div class="pricing-card">
                    <h3>Growth</h3>
                    <div class="price">Ksh51,611.00<span>/month</span></div>
                    <ul class="feature-list">
                        <li>Up to 50 users</li>
                        <li>Premium security</li>
                        <li>Priority support</li>
                        <li>Unlimited storage</li>
                        <li>Custom integrations</li>
                    </ul>
                    <a href="Payment.php?plan=growth" class="cta-button">Get Started</a>
                </div>
            </div>
        </section>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> EndpointGuard. All rights reserved.</p>
        </div>
    </footer>

    <script src="../js/script.js"></script>
    <script src="../js/pricing-card.js"></script>
</body>

</html>
