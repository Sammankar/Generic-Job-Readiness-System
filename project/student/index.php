<?php

session_start();

include('connection.php');

$objarray = array();

$message = '';

  if(isset($_POST['loginSub'])) 

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

   if(($objarray[0]->role_id=="3")&&($objarray[0]->status=="1"))

    {

       // echo "Mai Marega";
                $_SESSION['users_id'] = $users_id;
        
        $_SESSION['fullname'] = $fullname;
        
        $_SESSION['username'] = $username;
        
        $_SESSION['email'] = $email_id;
        

        header("location: studentdashboard.php");

        

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
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="box1">
					<video   preload="auto" autoplay loop muted="muted" volume="0" width="100%"> 
					  <source src="../images/Banner.mp4" type="video/mp4"> 
					  </video>
				  </div>
				<div class=" box">
					<form class="login100-form validate-form" method="post">
						<div class="mb-4">
							<h3><strong>Student Log In</strong></h3>
							<p class="mb-4">Welcome to LogIn Page</p><br>
						  </div>
	
						<div class="wrap-input100 validate-input" data-validate = "Valid username is required">
							<input class="input100" type="text" id="username" name="username" placeholder="Username">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>
	
						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" id="password" name="password" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						
						<div class="wrap-input100 validate-input">
						    <input class="login100-form-btn" name="loginSub" type="submit" value="Login">
						</div>
	
						<div class="text-center p-t-12">
							<span class="txt1">
								Forgot
							</span>
							<a class="txt2" href="#">
								Username / Password?
							</a>
						</div>
					</form>
					
					</div>
				
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>