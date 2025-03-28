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
    <title>Contact Us - Endpoint Data Threat Protection</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/ContactUs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body data-current-page="ContactUs.php">
    <div class="container">
        <header class="header">
            <!-- Navigation Bar -->
            <nav class="nav container">
                <a href="home.php" class="logo">
                    <img src="../Img/endpoint-guard.webp" alt="Logo" width="40" height="40">
                    EndpointGuard
                </a>
                <ul class="nav-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="solutions.php">Solutions</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="researchAndServices.php">Research</a></li>
                    <li><a href="resources.php">Resources</a></li>
                    <li><a href="partners.php">Partners</a></li>
                    <li><a href="ContactUs.php">Contact Us</a></li>
                    <li><a href="cart.php" class="btn"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="../../server/logout.php" class="btn btn-primary">Logout</a></li>
                </ul>
            </nav>
        </header>

        <div class="contact-grid">
            <div class="contact-form-container">
                <form class="contact-form" id="contactForm" method="POST" action="../../server/submit_contact.php">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="company">Company Name</label>
                        <input type="text" id="company" name="company" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Business Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="solution">Interested Solution</label>
                        <select id="solution" name="solution" required>
                            <option value="">Select a solution</option>
                            <option value="enterprise">Enterprise Security</option>
                            <option value="small-business">Small Business Security</option>
                            <option value="government">Government & Military</option>
                            <option value="custom">Custom Solution</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="cta-button">Send Message</button>
                </form>
            </div>

            <div class="contact-info">
                <div class="info-card">
                    <h3>Emergency Support</h3>
                    <p>24/7 Security Response Team</p>
                    <a href="tel:+254 114 679 270" class="contact-link">+254 114 679 270</a>
                </div>

                <div class="info-card">
                    <h3>Sales Inquiries</h3>
                    <p>Monday - Friday, 9AM - 6PM EAT</p>
                    <a href="mailto:kiambuthicharleton@gmail.com" class="contact-link">kiambuthicharleton@gmail.com</a>
                </div>

                <div class="info-card">
                    <h3>Global Headquarters</h3>
                    <p>00100<br>
                    Nairobi<br>
                    Kenya</p>
                </div>
            </div>
        </div>
    </div>

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
    <script src="../js/Contactvalidation.js"></script>
</body>
</html>