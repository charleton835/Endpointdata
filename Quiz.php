<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Solution Finder - EndpointGuard</title>
    <link rel="stylesheet" href="../css/Quiz.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="header">
        <nav class="nav container">
            <a href="home.html" class="logo">
                <img src="img/endpoint-guard.webp" alt="Logo" width="40" height="40">
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

    <main>
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Find Your Perfect Security Solution</h1>
                    <p>Answer a few questions to get a personalized security recommendation for your organization.</p>
                </div>
            </div>
        </section>

        <section class="quiz-container">
            <div id="quiz" class="quiz-content">
                <!-- Quiz content will be dynamically inserted here -->
            </div>
        </section>
    </main>

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
                        <li><a href="solutions.html">Enterprise</a></li>
                        <li><a href="solutions.html">Small Business</a></li>
                        <li><a href="solutions.php">Government</a></li>
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
    <script src="../js/quiz.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', startQuiz);
    </script>
</body>
</html>