<?php
require 'mail/swift_required.php';

$message = Swift_Message::newInstance()
    // The subject of your email
    ->setSubject('Jane Doe sends you a message')
    // The from address(es)
    ->setFrom(array('jane.doe@gmail.com' => 'Jane Doe'))
    // The to address(es)
    ->setTo(array('frank.stevens@gmail.com' => 'Frank Stevens'))
    // Here, you put the content of your email
    ->setBody('<h3>New message</h3><p>Here goes the rest of my message</p>', 'text/html');

if (Swift_Mailer::newInstance(Swift_MailTransport::newInstance())->send($message)) {
    echo json_encode([
        "status" => "OK",
        "message" => 'Your message has been sent!'
    ], JSON_PRETTY_PRINT);
} else {
    echo json_encode([
        "status" => "error",
        "message" => 'Oops! Something went wrong!'
    ], JSON_PRETTY_PRINT);
}
?>