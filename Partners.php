<?php
require_once '../../server/database.php'; 
require_once dirname(__DIR__, 2) . '/server/config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = trim($_POST['company-name']);
    $contact_name = trim($_POST['contact-name']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    if ($company_name && $contact_name && $email && $phone && $message) {
        try {
            $stmt = $GLOBALS['pdo']->prepare("INSERT INTO partners (company_name, contact_name, email, phone, message) VALUES (:company_name, :contact_name, :email, :phone, :message)");
            $stmt->execute([
                ':company_name' => $company_name,
                ':contact_name' => $contact_name,
                ':email' => $email,
                ':phone' => $phone,
                ':message' => $message
            ]);
            header("Location: Success.php");
            exit();
        } catch (PDOException $e) {
            header("Location: Error.php?msg=" . urlencode($e->getMessage()));
            exit();
        }
    } else {
        header("Location: Error.php?msg=" . urlencode("All fields are required and must be valid."));
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partners</title>
    <link rel="stylesheet" href="../css/Partners.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body data-current-page="Partners.php">
    <header>
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
                    <li><a href="cart.php" class="btn"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="../../server/logout.php" class="btn btn-primary">Logout</a></li>
                </ul>
            </nav>
        </header>
    </header>

    <!-- Value Proposition Section -->
    <section class="partners-grid">
        <div class="partner-card">
            <div class="partner-icon">🚀</div>
            <h3 class="partner-name">Innovation</h3>
            <p class="partner-description">
                We are at the forefront of cybersecurity innovation, developing cutting-edge solutions to protect businesses from evolving threats.
            </p>
        </div>

        <div class="partner-card">
            <div class="partner-icon">🌍</div>
            <h3 class="partner-name">Global Reach</h3>
            <p class="partner-description">
                Our solutions are designed to scale, helping businesses secure their operations across multiple regions and industries.
            </p>
        </div>

        <div class="partner-card">
            <div class="partner-icon">🔒</div>
            <h3 class="partner-name">Trusted Expertise</h3>
            <p class="partner-description">
                With years of experience in cybersecurity, we provide reliable and proven solutions to safeguard your business.
            </p>
        </div>
    </section>

    <!-- Partner Benefits Section -->
    <section class="partner-benefits">
        <h2>Why Partner with Us?</h2>
        <div class="benefit">
            <div class="benefit-icon">🤝</div>
            <p class="benefit-description">Collaborate with a forward-thinking team dedicated to cybersecurity excellence.</p>
        </div>
        <div class="benefit">
            <div class="benefit-icon">📈</div>
            <p class="benefit-description">Grow your business by offering our proven solutions to your clients.</p>
        </div>
        <div class="benefit">
            <div class="benefit-icon">💡</div>
            <p class="benefit-description">Access innovative tools and resources to enhance your service offerings.</p>
        </div>
    </section>

    <!-- Achievements Section -->
    <section class="achievements">
        <h2>Our Achievements</h2>
        <div class="achievement">
            <div class="achievement-icon">🏆</div>
            <p class="achievement-description">Secured over 500 businesses against cyber threats.</p>
        </div>
        <div class="achievement">
            <div class="achievement-icon">📊</div>
            <p class="achievement-description">Reduced security breaches by 40% for our clients.</p>
        </div>
        <div class="achievement">
            <div class="achievement-icon">💼</div>
            <p class="achievement-description">Trusted by leading companies in healthcare, finance, and technology.</p>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2>What Our Clients Say</h2>
        <div class="testimonial">
            <p class="testimonial-text">
                "Their cybersecurity solutions have transformed how we protect our data. Highly recommend their services!"
            </p>
            <p class="testimonial-author">– Jane Doe, CEO of SecureBiz</p>
        </div>
        <div class="testimonial">
            <p class="testimonial-text">
                "Working with them has been a game-changer for our business. Their team is knowledgeable and responsive."
            </p>
            <p class="testimonial-author">– John Smith, CTO of TechGlobal</p>
        </div>
    </section>

    <!-- Future Partnerships Section -->
    <section class="future-partnerships">
        <h2>Future Partnerships</h2>
        <p>We’re excited to collaborate with companies in the following areas:</p>
        <ul>
            <li>Technology Providers</li>
            <li>Cloud Service Providers</li>
            <li>AI and Machine Learning Innovators</li>
            <li>Cybersecurity Experts</li>
        </ul>
        <p>If you’re interested in partnering with us, please reach out!</p>
    </section>

    <!-- Partner Application Form -->
    <section class="partner-form">
        <h2>Become a Partner</h2>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="partner-form">
            <div class="form-row">
                <label for="company-name">Company Name</label>
                <input type="text" id="company-name" name="company-name" required>
            </div>
            <div class="form-row">
                <label for="contact-name">Contact Person</label>
                <input type="text" id="contact-name" name="contact-name" required>
            </div>
            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-row">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-row">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Submit Application</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <h3 class="footer-title">EndpointGuard</h3>
                    <p>Advanced endpoint security for modern enterprises.</p>
                    <ul class="social-links">
                        <li><a href="https://twitter.com/EndpointGuard" class="fab fa-twitter"></a></li>
                        <li><a href="https://linkedin.com/company/EndpointGuard" class="fab fa-linkedin"></a></li>
                    </ul>
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
    <script src="../js/formValidation.js"></script>
</body>
</html>