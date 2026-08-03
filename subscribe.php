<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: index.html?signup=error');
        exit;
    }
    $to = 'jt@mowinton.com';
    $subject = 'New PrimeCrop Signup';
    $message = "New subscriber email: " . $email . "\n\nDate: " . date('Y-m-d H:i:s');
    $headers = 'From: hello@theprimecrop.com' . "\r\n" . 'Reply-To: ' . $email;
    mail($to, $subject, $message, $headers);
    header('Location: index.html?signup=success');
    exit;
}
header('Location: index.html');