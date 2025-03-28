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
    <title>Research and Services</title>
    <link rel="stylesheet" href="../css/researchAndservices.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body data-current-page="ResearchAndServices.php">
    <header class="header">
        <nav class="nav container">
            <a href="home.php" class="logo">
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
                <li><a href="#" onclick="confirmLogout()" class="btn btn-primary">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Research Section -->
    <section class="research-grid">
    <?php
    $researches = [
    [
        "title" => "AI in Cybersecurity",
        "author" => "Khan, Muhammad Ismaeel, Aftab Arif, and Ali Raza A. Khan.",
        "year" => 2025,
        "image" => "https://securityintelligence.com/wp-content/uploads/2024/10/AI-robot-using-cyber-security-to-protect-information-privacy.jpeg",
        "summary" => "Exploring how AI can enhance threat detection and response in real-time.",
        "link" => "https://www.neliti.com/publications/592396/the-most-recent-advances-and-uses-of-ai-in-cybersecurity"
    ],
    [
        "title" => "Cloud Security Trends",
        "author" => "Alzoubi, Yehia Ibrahim, Alok Mishra, and Ahmet Ercan Topcu.",
        "year" => 2024,
        "image" => "https://assets.techrepublic.com/uploads/2023/03/tr_3923_cloud_security_hampered_hero.jpeg",
        "summary" => "Analyzing the latest trends in cloud security and best practices for 2024.",
        "link" => "https://link.springer.com/chapter/10.1007/978-3-031-52272-7_5"
    ],
    [
        "title" => "Threat Intelligence",
        "author" => "Alaeifar, Poopak.",
        "year" => 2023,
        "image" => "https://analyst1.com/wp-content/uploads/2023/05/threat-intelligence-platform-hero-image.jpg",
        "summary" => "Enhancing security with real-time threat intelligence and predictive analytics.",
        "link" => "https://www.sciencedirect.com/science/article/pii/S2214212624000899"
    ]
];

    foreach ($researches as $research) {
    $research_link = isset($research['link']) ? $research['link'] : '#';  // Default to '#' if 'link' is not set

    echo "<div class='research-card'>
            <img src='{$research['image']}' alt='{$research['title']}' class='research-image'>
            <div class='research-content'>
                <a href='{$research_link}' target='_blank'>
                    <h3 class='research-title'>{$research['title']}</h3>
                </a>
                <div class='research-meta'>
                    <span>Author: {$research['author']}</span>
                    <span>Published: {$research['year']}</span>
                </div>
                <p class='research-description'>{$research['summary']}</p>
            </div>
        </div>";
}
    ?>

    </section>

    <!-- Services Section -->
<section class="services-grid">
<?php
$services = [
    ["icon" => "🔒", "title" => "Cybersecurity Services", "description" => "Protect your data and systems from threats.", "link" => "Services/Cybersecurity-services.php"], 
    ["icon" => "📊", "title" => "Data Analytics", "description" => "Gain insights from your data for better decision-making.", "link" => "Services/Data-analytics.php"], 
    ["icon" => "💻", "title" => "IT Consulting", "description" => "Optimize your technology infrastructure.", "link" => "Services/IT-consulting.php"]
];

foreach ($services as $service) {
    echo "<div class='service-card'>
            <div class='service-icon'>{$service['icon']}</div>
            <a href='{$service['link']}' target='_self'>
                <h3 class='service-title'>{$service['title']}</h3>
            </a>
            <p class='service-description'>{$service['description']}</p>
        </div>";
}
?>
</section>


    <!-- Lab Reports Section -->
<section class="lab-reports">
    <h2>Lab Reports</h2>
    <?php
    $reports = [
        ["title" => "Lab Report 1", "date" => "January 2025", "file" => "report1.pdf", "size" => "1.2MB"],
        ["title" => "Lab Report 2", "date" => "February 2025", "file" => "report2.pdf", "size" => "2.4MB"],
        ["title" => "Lab Report 3", "date" => "March 2025", "file" => "report3.pdf", "size" => "1.8MB"]
    ];

    foreach ($reports as $report) {
        echo "<div class='report-card'>
                <div class='report-info'>
                    <h4 class='report-title'>{$report['title']}</h4>
                    <p class='report-date'>Date: {$report['date']}</p>
                    <p class='report-size'>Size: {$report['size']}</p>
                </div>
                <a href='../files/{$report['file']}' class='report-download' download aria-label='Download {$report['title']}' title='Download {$report['title']}'>
                    <span>&#8595;</span> Download
                </a>
            </div>";
    }
    ?>
</section>

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
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "../../server/logout.php";
            }
        }
    </script>
    <script src="../js/script.js"></script>
</body>
</html>
