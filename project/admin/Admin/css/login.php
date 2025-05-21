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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super-Admin Login Page</title>
    <link rel="stylesheet" href="css/Login.css">
</head>
<body>
    <div class="wrapper">
        <video class="video"   preload="auto" autoplay loop muted="muted" volume="0" width="100%"> 
					  <source src="images/Banner.mp4" type="video/mp4"> 
					  </video>
        <div class="form-wrapper login">
            <form action="">
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" placeholder="Password" required>
                </div>
                <div class="forgot-pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit">Login</button>
                <div class="sign-link">
                    <p>Don't have an account? <a href="#" onclick="registerActive()">Register</a></p>
                </div>
            </form>
        </div>
        <div class="form-wrapper register">
            <form action="">
                <h2>Registration</h2>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" placeholder="Full Name" required>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" placeholder="Password" required>
                </div>
                <button type="submit">Register</button>
                <div class="sign-link">
                    <p>Already have an account? <a href="#" onclick="loginActive()">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
    const wrapper = document.querySelector('.wrapper');
function registerActive() {
    wrapper.classList.toggle('active');
}
function loginActive() {
    wrapper.classList.toggle('active');
}
    </script>
</body>
</html>