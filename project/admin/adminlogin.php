<?php
session_start();
include('connection.php');
$objarray = array();
$message = '';
  if(isset($_POST['login'])) 
  {

      $username = $_POST['username'];
      $password = $_POST['password']; 
     //role_id='1';
$sql = "SELECT * FROM tbl_user WHERE  username = '$username' and password =md5('$password')";

$result=mysqli_query($conn,$sql);
if($result > 0){
 
    while($obj=mysqli_fetch_object($result)) 
    {
        array_push($objarray,$obj);
         
    }
   if(($objarray[0]->role_id=="1")&&($objarray[0]->status=="1"))
    {
       // echo "Mai Marega";
        $_SESSION['users_id'] = $users_id;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email_id;
        header("location: admindashboard.php");
        
    }
  else
  {
       echo "User activation is pending or role mismatched";
  }
}else{
    echo 'kindly check your credentials';
}
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="adminlogin.css">

</head>
<body>

    <form action="adminlogin.php" method="post">
        <!-- Headings for the form -->
        <div class="headingsContainer">
            <h3>Admin Log in</h3>
            <p>Log in with your username and password</p>
        </div>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
            <!-- Username -->
            <label for="username">Your username</label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>

            <br><br>

            <!-- Password -->
            <label for="pswrd">Your password</label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <!-- sub container for the checkbox and forgot password link -->
            <div class="subcontainer">
                <p class="forgotpsd"> <a href="#">Forgot Password?</a></p>
            </div>

            <!-- Submit button -->
            <button name="login" type="login">Login</button>

        </div>

    </form>
        <script>
                function isvalid(){
                var username = document.form.user.value;
                var password = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(username.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(password.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
   
    </script>
        <script>
        $('.message a').click(function(){
        $('form').animate({height: "toggle",opacity: "toggle"}, "slow");
        });
    </script>
</body>
</html>
