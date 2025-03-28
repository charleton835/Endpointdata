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
    <title>Resources - EndpointGuard</title>
    <link rel="stylesheet" href="../css/resources.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body data-current-page="Resources.php">
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

    <!-- Featured Resources Section -->
    <section class="resources-grid">
        <div class="resource-card">
            <div class="resource-icon">📚</div>
            <h3 class="resource-title">Cybersecurity Best Practices Guide</h3>
            <p class="resource-description">
                A comprehensive guide to understanding the best practices for securing your business from cyber threats. Learn how to protect your network, endpoints, and data.
            </p>
            <a href="https://books.google.co.ke/books?hl=en&lr=&id=e00EEQAAQBAJ&oi=fnd&pg=PP1&dq=Cybersecurity+Best+Practices+Guide&ots=LGV0tBWm8X&sig=IWF3nw_zAv3lJEfYAH0osrpJgIY&redir_esc=y#v=onepage&q=Cybersecurity%20Best%20Practices%20Guide&f=false" class="resource-link">Download the Guide</a>
        </div>

        <div class="resource-card">
            <div class="resource-icon">🎥</div>
            <h3 class="resource-title">AI in Cybersecurity - Video Tutorial</h3>
            <p class="resource-description">
                Watch this tutorial to understand how Artificial Intelligence (AI) is revolutionizing the cybersecurity landscape and how it can enhance your organization's security measures.
            </p>
            <a href="https://youtu.be/4QzBdeUQ0Dc?si=M54gdPF0M2FszNwu" class="resource-link">Watch Now</a>
        </div>

        <div class="resource-card">
            <div class="resource-icon">📝</div>
            <h3 class="resource-title">Understanding Cloud Security</h3>
            <p class="resource-description">
                Read this detailed Journal explaining cloud security fundamentals, key risks, and best practices to ensure your cloud infrastructure is secure and compliant.
            </p>
            <a href="https://www.allmultidisciplinaryjournal.com/uploads/archives/20241231183341_F-24-249.1.pdf" class="resource-link">Read the Journal</a>
        </div>
    </section>

    <!-- Documentation and Guides Section -->
    <section class="docs-container">
        <aside class="docs-sidebar">
            <h2>Documentation</h2>
            <ul class="docs-nav">
                <li><a href="#getting-started" class="active">Getting Started</a></li>
                <li><a href="#implementation-guides">Implementation Guides</a></li>
                <li><a href="#security-best-practices">Security Best Practices</a></li>
                <li><a href="#faqs">FAQs</a></li>
                <li><a href="#troubleshooting">Troubleshooting</a></li>
            </ul>
        </aside>

        <div class="docs-content">
            <section id="getting-started">
                <h2>Getting Started</h2>
                <div class="guide-section">
                    <h3>Quick Start Guide</h3>
                    <ol>
                        <li>Assessment of your security needs</li>
                        <li>Choosing the right security solution</li>
                        <li>Implementation planning</li>
                        <li>Deployment and configuration</li>
                        <li>Team training and adoption</li>
                    </ol>
                </div>
            </section>

            <section id="implementation-guides">
                <h2>Implementation Guides</h2>
                <div class="guide-section">
                    <h3>Enterprise Implementation</h3>
                    <ul>
                        <li>Network Security Setup</li>
                        <li>Endpoint Protection Configuration</li>
                        <li>Access Control Management</li>
                        <li>Security Monitoring Setup</li>
                    </ul>
                    
                    <h3>Small Business Setup</h3>
                    <ul>
                        <li>Essential Security Measures</li>
                        <li>Cost-Effective Solutions</li>
                        <li>Basic Security Policies</li>
                    </ul>
                </div>
            </section>

            <section id="security-best-practices">
                <h2>Security Best Practices</h2>
                <div class="guide-section">
                    <h3>Daily Security Practices</h3>
                    <ul>
                        <li>Regular Security Audits</li>
                        <li>Password Management</li>
                        <li>Data Backup Procedures</li>
                        <li>Incident Response Plans</li>
                    </ul>
                </div>
            </section>

            <section id="faqs">
                <h2>Frequently Asked Questions</h2>
                <div class="faq-section">
                    <div class="faq-item">
                        <h3>General Questions</h3>
                        <div class="faq-qa">
                            <h4>What is EndpointGuard?</h4>
                            <p>EndpointGuard is a comprehensive security solution that protects your organization's endpoints from cyber threats.</p>
                        </div>
                        <div class="faq-qa">
                            <h4>How does endpoint protection work?</h4>
                            <p>Endpoint protection works by monitoring and securing all devices that connect to your network, including computers, mobile devices, and servers.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <h3>Technical Questions</h3>
                        <div class="faq-qa">
                            <h4>What systems are supported?</h4>
                            <p>EndpointGuard supports Windows, macOS, Linux, iOS, and Android devices.</p>
                        </div>
                        <div class="faq-qa">
                            <h4>How often are updates released?</h4>
                            <p>Security updates are released weekly, with emergency patches available as needed.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <h3>Support Questions</h3>
                        <div class="faq-qa">
                            <h4>How do I get technical support?</h4>
                            <p>Technical support is available 24/7 through our support portal, email, or phone.</p>
                        </div>
                        <div class="faq-qa">
                            <h4>What's included in the support package?</h4>
                            <p>Support packages include installation assistance, troubleshooting, and security consultations.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="troubleshooting">
                <h2>Troubleshooting Guide</h2>
                <div class="guide-section">
                    <h3>Common Issues</h3>
                    <ul>
                        <li>Installation Problems</li>
                        <li>Configuration Issues</li>
                        <li>Update Errors</li>
                        <li>Performance Concerns</li>
                    </ul>
                    
                    <h3>Quick Solutions</h3>
                    <ul>
                        <li>System Requirements Check</li>
                        <li>Configuration Verification</li>
                        <li>Log Analysis</li>
                        <li>Performance Optimization</li>
                    </ul>
                </div>
            </section>
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