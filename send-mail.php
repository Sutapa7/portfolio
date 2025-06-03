<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = strip_tags(trim($_POST["Name"]));
    $email   = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["Subject"]));
    $message = strip_tags(trim($_POST["message"]));

    // Check required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Email details
    $to      = "sutpanandan7@gmail.com";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n";
    $body .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Error sending message.";
    }
} else {
    echo "Invalid request.";
}
?>
