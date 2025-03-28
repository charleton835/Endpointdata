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
    <title>Government Security Solutions</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/GovernmentSecurity.css">
</head>

<body data-current-page="GovernmentSecurity.php">
    <header class="header">
        Government Security Solutions
    </header>

    <div class="container">
        <header class="page-header">
            <h1>Military-grade security solutions with complete compliance and air-gap capabilities</h1>
        </header>

        <div class="features-grid">
            <div class="feature-card">
                <a href="Compliance&Certification.php">
                    <h3>Compliance & Certification</h3>
                    <p>Full compliance with FISMA, FedRAMP, NIST 800-53, and other government security standards and regulations.</p>
                </a>
            </div>

            <div class="feature-card">
                <a href="Air-GappedSystems.php">
                    <h3>Air-Gapped Systems</h3>
                    <p>Completely isolated network infrastructure with physical separation from unsecured networks for maximum security.</p>
                </a>
            </div>

            <div class="feature-card">
                <a href="ZeroTrustArchitecture.php">
                    <h3>Zero Trust Architecture</h3>
                    <p>Implementation of zero trust security model with continuous verification and least privilege access control.</p>
                </a>
            </div>
        </div>

        <section class="pricing-section">
            <h2>Government Solutions</h2>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3>Department</h3>
                    <div class="price">Custom</div>
                    <ul class="feature-list">
                        <li>Department-wide deployment</li>
                        <li>Basic compliance package</li>
                        <li>24/7 dedicated support</li>
                        <li>Secure cloud infrastructure</li>
                    </ul>
                    <a href="Payment.php?plan=department" class="cta-button">Get Started</a>
                </div>

                <div class="pricing-card featured">
                    <h3>Agency</h3>
                    <div class="price">Custom</div>
                    <ul class="feature-list">
                        <li>Agency-wide deployment</li>
                        <li>Full compliance package</li>
                        <li>Dedicated security team</li>
                        <li>Air-gap implementation</li>
                        <li>Custom security protocols</li>
                    </ul>
                    <a href="Payment.php?plan=agency" class="cta-button">Get Started</a>
                </div>

                <div class="pricing-card">
                    <h3>Military</h3>
                    <div class="price">Custom</div>
                    <ul class="feature-list">
                        <li>Military-grade security</li>
                        <li>Complete air-gap solution</li>
                        <li>24/7 war room support</li>
                        <li>Custom hardware integration</li>
                        <li>Classified data handling</li>
                    </ul>
                    <a href="ContactUs.php?plan=military" class="cta-button">Contact Sales</a>
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
