<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_input = $_POST['login_input']; 
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM users WHERE gmail = ? OR phone_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login_input, $login_input); 
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify user exists
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['gmail'] = $user['gmail'];
        $_SESSION['phone_number'] = $user['phone_number'];
        header("Location: SAdashboard.php"); 
        exit();
    } else {
        $error = "Invalid Gmail/Phone Number or Password!";
    }
}
?>