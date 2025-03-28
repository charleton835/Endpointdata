<?php
$pageTitle = "Zero Trust Architecture - EndpointGuard";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="../css/AI-protection.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <header>
        <h1>Zero Trust Architecture</h1>
    </header>

    <section class="section">
        <div class="container">
            <p>Zero Trust Architecture (ZTA) is a security model that assumes no user or device is inherently trusted, even if inside the network. EndpointGuard's ZTA implementation provides continuous verification of user identities and devices for enhanced security.</p>
            <ul>
                <li>Enforce strict access controls, even within the organization.</li>
                <li>Continuous monitoring of user behavior and device integrity.</li>
                <li>Minimize the risk of insider threats and unauthorized access.</li>
            </ul>

            <h2>Learn More</h2>
            <p>To learn more about Zero Trust, check out this <a href="https://nvlpubs.nist.gov/nistpubs/specialpublications/NIST.SP.800-207.pdf" target="_blank">article</a>.</p>
        </div>
    </section>

    <footer>
        <p>&copy; <?= date("Y") ?> EndpointGuard. All rights reserved.</p>
    </footer>

</body>
</html>
