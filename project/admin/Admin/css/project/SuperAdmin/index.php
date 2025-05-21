
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>Super-Admin Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="wrapper">
        <div class="form-wrapper login">
            <form action="">
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" placeholder="Email or Phone Number" required>
                </div>
<div class="input-box">
    <span class="icon">
        <i class="uil uil-eye-slash showHidePw"></i> <!-- Eye Icon -->
    </span>
    <input type="password" id="password" placeholder="Password" required>
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
        <i class="uil uil-eye-slash showHidePw"></i> <!-- Eye Icon -->
    </span>
    <input type="password" id="password" placeholder="Password" required>
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
    <script>
    // Select password input field and eye icon
    const passwordInput = document.querySelector('.input-box input[type="password"]');
    const togglePassword = document.querySelector('.showHidePw');

    // Add event listener to toggle visibility
    togglePassword.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.classList.replace('uil-eye-slash', 'uil-eye');
        } else {
            passwordInput.type = 'password';
            togglePassword.classList.replace('uil-eye', 'uil-eye-slash');
        }
    });
</script>
</body>
</html>
