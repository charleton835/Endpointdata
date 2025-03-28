<?php
require_once '../../server/database.php';
require_once dirname(__DIR__, 2) . '/server/config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    if ($name && $email && $phone && $message) {
        try {
            $stmt = $GLOBALS['pdo']->prepare("INSERT INTO consultations (name, email, phone, message) VALUES (:name, :email, :phone, :message)");
            $stmt->execute([
                ':name' => $name,
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
    <title>Book a Consultation</title>
    <link rel="stylesheet" href="../css/Consultation.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
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

    <section class="consultation-form">
        <div class="container">
            <h2>Book a Cybersecurity Consultation</h2>
            <p>Fill out the form below to schedule a consultation with our cybersecurity experts.</p>
            <?php if (!empty($success_message)) : ?>
                <div class="success-message"><?= $success_message ?></div>
            <?php endif; ?>
            <?php if (!empty($error_message)) : ?>
                <div class="error-message"><?= $error_message ?></div>
            <?php endif; ?>
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="consultationForm">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
                
                <label for="message">Consultation Details</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <!-- Get Expert Advice Section -->
    <section class="expert-advice">
        <div class="container">
            <h2>Get Expert Advice</h2>
            <p>Need quick help? Choose one of the options below to get expert advice from our cybersecurity team.</p>

            <!-- Option 1: Quick Advice Form -->
            <div class="advice-option">
                <h3>Quick Advice Form</h3>
                <p>Fill out a short form, and our experts will get back to you within 24 hours.</p>
                <form action="QuickAdviceHandler.php" method="POST">
                    <label for="quick-name">Full Name</label>
                    <input type="text" id="quick-name" name="quick-name" required>
                    
                    <label for="quick-email">Email</label>
                    <input type="email" id="quick-email" name="quick-email" required>
                    
                    <label for="quick-question">Your Question</label>
                    <textarea id="quick-question" name="quick-question" rows="4" required></textarea>
                    
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>
            </div>

            <!-- Option 2: Email Us -->
            <div class="advice-option">
                <h3>Email Us</h3>
                <p>Prefer to email us directly? Reach out at <a href="kiambuthicharleton@gmail.com">kiambuthicharleton@gmail.com</a>.</p>
            </div>

            <!-- Option 3: Chat with Us -->
            <div class="advice-option">
                <h3>Chat with Us</h3>
                <p>Chat with our experts in real-time using the chat widget below.</p>
                <div id="chat-widget">
                    <p>Chat widget will appear here.</p>
                </div>
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
    <script src="../js/consultation.js"></script>
</body>
</html>