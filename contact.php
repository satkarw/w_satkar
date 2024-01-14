<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST["comment"]);

    if ($email === false) {
        // Invalid email address
        echo "Invalid email address. Please go back and try again.";
        exit();
    }

    // Send email notification
    $to = "satkarw@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    // Compose the email body
    $email_body = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        // Redirect to the thank-you page if email is sent successfully
        header("Location: index.html");
        exit();
    } else {
        // Handle the case where email sending fails
        echo "Email could not be sent. Please try again later.";
    }
}
?>
