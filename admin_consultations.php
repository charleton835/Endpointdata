<?php
require_once '../backend/database.php';
require_once '../backend/google_calendar.php'; 

try {
    $stmt = $GLOBALS['pdo']->query("SELECT * FROM consultations ORDER BY created_at DESC");
    $consultations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching consultations: " . $e->getMessage());
}

if (isset($_POST['add_to_calendar'])) {
    $eventId = addToGoogleCalendar($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message']);
    if ($eventId) {
        $success_message = "Added to Google Calendar successfully!";
    } else {
        $error_message = "Failed to add to Google Calendar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Consultations</title>
    <link rel="stylesheet" href="../css/admin_consultations.css">
</head>
<body>
    <header>
        <h1>Consultation Requests</h1>
    </header>

    <main>
        <?php if (isset($success_message)) echo "<p class='success'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p class='error'>$error_message</p>"; ?>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultations as $consult): ?>
                <tr>
                    <td><?= htmlspecialchars($consult['name']) ?></td>
                    <td><?= htmlspecialchars($consult['email']) ?></td>
                    <td><?= htmlspecialchars($consult['phone']) ?></td>
                    <td><?= htmlspecialchars($consult['message']) ?></td>
                    <td><?= htmlspecialchars($consult['created_at']) ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="name" value="<?= $consult['name'] ?>">
                            <input type="hidden" name="email" value="<?= $consult['email'] ?>">
                            <input type="hidden" name="phone" value="<?= $consult['phone'] ?>">
                            <input type="hidden" name="message" value="<?= $consult['message'] ?>">
                            <button type="submit" name="add_to_calendar">Add to Calendar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
