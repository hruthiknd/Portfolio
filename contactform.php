<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $message = $_POST['message'];

    $email_to = "hruthik.nd@gmail.com";
    $email_subject = "Contact Message from " . $visitor_email;
    $email_from = "noreply@example.com"; // Use a valid email address here for From header

    $headers = "From: " . $email_from . "\r\n";
    $headers .= "Reply-To: " . $visitor_email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    $txt = "Name: " . $name . "\n";
    $txt .= "Email: " . $visitor_email . "\n";
    $txt .= "Message:\n" . $message;

    if (mail($email_to, $email_subject, $txt, $headers)) {
        header("Location: index.html"); // Redirect upon successful submission
        exit;
    } else {
        echo "Failed to send email. Please try again later."; // Handle mail sending failure
    }
} else {
    echo "Method not allowed."; // Handle non-POST requests
}
?>
