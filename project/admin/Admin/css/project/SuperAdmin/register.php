<?php
require 'connection.php'; // Database connection file
require 'mail.php'; // PHPMailer script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password
    $verification_token = bin2hex(random_bytes(32)); // Generate unique token

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        echo "Email already registered!";
        exit;
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, verification_token) 
                            VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$full_name, $username, $email, $phone_number, $password, $verification_token])) {
        $verification_link = "http://sanjyotmankar.infinityfreeapp.com/verify.php?token=$verification_token";
        $subject = "Verify Your Email Address";
        $message = "Click the link below to verify your email:\n\n$verification_link";
        
        if (sendMail($email, $subject, $message)) {
            echo "Registration successful! Please check your email to verify your account.";
        } else {
            echo "Error sending verification email!";
        }
    } else {
        echo "Registration failed!";
    }
}
?>
