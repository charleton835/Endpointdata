<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endpoint Security - Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/Home.css">
</head>

<body data-current-page="Home.php">
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
                <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="../../server/logout.php" class="btn btn-primary">Logout</a></li>
                <?php else: ?>
                <li><a href="SignUp.php" class="btn btn-primary">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Advanced Endpoint Security for Modern Enterprises</h1>
                <p>Protect your organization with AI-powered endpoint detection and response.</p>
                <div class="hero-buttons">
                    <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="SignUp.php" class="btn btn-primary">Start Free Trial</a>
                    <?php endif; ?>
                    <a href="Resources.php" class="btn btn-outline">Learn More</a>
                    <a href="Consultation.php" class="btn btn-secondary">Book a Consultation</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="section-title">Why Choose EndpointGuard?</h2>
            <div class="card-grid">
                <div class="card">
                    <a href="ai-protection.php">
                        <h3 class="card-title">AI-Powered Protection</h3>
                        <p>Advanced machine learning algorithms detect and prevent threats in real-time.</p>
                    </a>
                </div>
                <div class="card">
                    <a href="zero-day-defense.php">
                        <h3 class="card-title">Zero-Day Defense</h3>
                        <p>Proactive protection against unknown threats and zero-day exploits.</p>
                    </a>
                </div>
                <div class="card">
                    <a href="cloud-native.php">
                        <h3 class="card-title">Cloud-Native</h3>
                        <p>Seamless protection across all endpoints, regardless of location.</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light">
        <div class="container">
            <h2 class="section-title">Trusted by Industry Leaders</h2>
            <div class="logos-grid">
                <!-- Add company logos here -->
            </div>
        </div>
    </section>

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
</body>

</html>