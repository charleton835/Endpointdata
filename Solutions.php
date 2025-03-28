<?php
require_once dirname(__DIR__, 2) . '/server/config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
if (isset($_SESSION['quiz_result'])) {
    $quizResult = $_SESSION['quiz_result'];
    unset($_SESSION['quiz_result']); 
}
?>

<?php if (isset($quizResult)) : ?>
    <section class="quiz-result">
        <div class="container">
            <h3>Your Recommended Solution:</h3>
            <p><?php echo htmlspecialchars($quizResult); ?></p>
        </div>
    </section>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solutions - EndpointGuard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/solutions.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body data-current-page="Solutions.php">
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

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Enterprise-Grade Security Solutions</h1>
                <p>Comprehensive endpoint protection tailored to your organization's needs.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h2 class="section-title">Our Solutions</h2>
            <div class="solutions-grid">
                <div class="solution-card">
                    <h3>Enterprise Security</h3>
                    <p>Complete endpoint protection for large organizations.</p>
                    <ul>
                        <li>Advanced Threat Detection</li>
                        <li>Network Security</li>
                        <li>Cloud Security</li>
                        <li>24/7 Support</li>
                    </ul>
                    <a href="EnterpriseSecurity.php" class="btn btn-primary">Learn More</a>
                </div>
                <div class="solution-card">
                    <h3>Small Business</h3>
                    <p>Affordable security for growing businesses.</p>
                    <ul>
                        <li>Essential Protection</li>
                        <li>Easy Management</li>
                        <li>Cloud-Based Console</li>
                        <li>Email Support</li>
                    </ul>
                    <a href="SmallBusinessSecurity.php" class="btn btn-primary">Learn More</a>
                </div>
                <div class="solution-card">
                    <h3>Government</h3>
                    <p>Compliance-ready security solutions.</p>
                    <ul>
                        <li>FedRAMP Certified</li>
                        <li>FIPS Compliance</li>
                        <li>Air-Gap Support</li>
                        <li>Dedicated Support</li>
                    </ul>
                    <a href="GovernmentSecurity.php" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </section>
    
    <section class="quiz-link">
        <div class="container">
            <h2>Not sure which solution is right for you?</h2>
            <p>Take our quick quiz to find the best cybersecurity solution for your organization.</p>
            <a href="Quiz.php" class="btn btn-primary">Take the Quiz</a>
        </div>
    </section>


    <footer class="footer">
        <!-- Same footer as home.html -->
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
                        <li><a href="ContactUs.php">Support</a></li>
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