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
    <title>Enterprise Security Solutions</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/EnterpriseSecurity.css">
</head>

<body data-current-page="EnterpriseSecurity.php">
    <header class="header">
       Enterprise Security Solutions
    </header>

    <div class="container">
        <header class="page-header">
            <p>Comprehensive security solutions for large-scale organizations</p>
        </header>

        <div class="features-grid">
            <div class="feature-card">
                <a href="advanced-threat-protection.php">
                    <h3>Advanced Threat Protection</h3>
                    <p>AI-powered security system that detects and prevents sophisticated cyber attacks in real-time, protecting your enterprise from emerging threats.</p>
                </a>
            </div>
    
            <div class="feature-card">
                <a href="secure-infrastructure.php">
                    <h3>Secure Infrastructure</h3>
                    <p>End-to-end encryption and secure cloud infrastructure with 99.99% uptime guarantee, ensuring your data remains protected and accessible.</p>
                </a>
            </div>
    
            <div class="feature-card">
                <a href="access-control.php">
                    <h3>Access Control</h3>
                    <p>Role-based access control with multi-factor authentication and single sign-on capabilities for seamless yet secure access management.</p>
                </a>
            </div>
        </div>
        <section class="pricing-section">
            <h2>Enterprise Pricing</h2>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3>Basic</h3>
                    <div class="price">Ksh129,251.00<span>/month</span></div>
                    <ul class="feature-list">
                        <li>Up to 100 users</li>
                        <li>Basic threat protection</li>
                        <li>24/7 support</li>
                        <li>Cloud backup</li>
                    </ul>
                    <a href="Payment.php?plan=basic" class="cta-button">Get Started</a>
                </div>
        
                <div class="pricing-card ">
                    <h3>Professional</h3>
                    <div class="price">Ksh258,631.00<span>/month</span></div>
                    <ul class="feature-list">
                        <li>Up to 500 users</li>
                        <li>Advanced threat protection</li>
                        <li>Priority support</li>
                        <li>Advanced analytics</li>
                        <li>API access</li>
                    </ul>
                    <a href="Payment.php?plan=professional" class="cta-button">Get Started</a>
                </div>
        
                <div class="pricing-card">
                    <h3>Enterprise</h3>
                    <div class="price">Custom</div>
                    <ul class="feature-list">
                        <li>Unlimited users</li>
                        <li>Custom solutions</li>
                        <li>Dedicated support team</li>
                        <li>Custom integrations</li>
                        <li>On-premise options</li>
                    </ul>
                    <a href="ContactUs.php?plan=enterprise" class="cta-button">Contact Sales</a>
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