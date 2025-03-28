<?php
require_once '../vendor/autoload.php';

function addToGoogleCalendar($name, $email, $phone, $message) {
    $client = new Google_Client();
    $client->setAuthConfig('../backend/credentials.json'); // Path to credentials.json
    $client->addScope(Google_Service_Calendar::CALENDAR);
    $client->setAccessType('offline');

    $service = new Google_Service_Calendar($client);
    $calendarId = 'primary';

    $event = new Google_Service_Calendar_Event([
        'summary' => "Consultation with $name",
        'description' => "Message: $message\nPhone: $phone\nEmail: $email",
        'start' => ['dateTime' => date('c', strtotime('+1 day 10:00 AM'))],
        'end' => ['dateTime' => date('c', strtotime('+1 day 10:30 AM'))],
        'attendees' => [['email' => $email]],
    ]);

    $event = $service->events->insert($calendarId, $event);
    return $event->getId();
}
?>
