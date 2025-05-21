<?php
include_once 'adminheader.php';
?>

<?php
include 'connection.php';
$objarray = array();
$objarray1 = array();
if (isset($_POST['submit'])) {
    $fullname = $_POST['firstname'];
    $username = $_POST['username'];
    $email = $_POST['email_id'];
    $phone_no = $_POST['phone_no'];
    $passowrd = $_POST['passowrd'];
    $username1= $_POST['username1'];


    $username=   $_SESSION['username'];
   //$tat ="SELECT * FROM `tbl_user` WHERE `username`=$username";
   $tat = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
     $tresult1= mysqli_query($conn, $tat);
     //$tcheck= mysqli_num_rows($tresult1);
    if($tresult1)
    {
            while($obj=mysqli_fetch_object($tresult1))
                {
                    array_push($objarray,$obj);
                     
                }
             $tusers_id= $objarray[0]->users_id;
             
     }
     else
     {
         echo "JHAND";
     }
     
        $sql1 = "SELECT * FROM `college_registration` WHERE `users_id`=$tusers_id";
        $result1= mysqli_query($conn, $sql1);
        
            if($result1)
            {
            while($obj1=mysqli_fetch_object($result1))
                {
                    array_push($objarray1,$obj1);
                     
                }
             $tcollege_id= $objarray1[0]->college_id;
             
             }
             else
             {
                 echo "JHAND";
             }
        
  $check= mysqli_num_rows($result1);
  if($check == 1){
    //echo "Let's add Student=".$tcollege_id;
    $college_id=$tcollege_id;
    $query= "SELECT * FROM tbl_user WHERE username = '$username'";
        $output = mysqli_query($conn, $query);
        $final=mysqli_num_rows($output);
        if($final == 0){
   $sql = "INSERT INTO `tbl_user`(`users_id`, `role_id`, `college_id`, `fullname`, `username`, `email_id`, `phone_no`, `password`, `profile_photo`, `gender`, `age`, `address`, `dor`, `status`) VALUES (NULL,'3','$college_id','$fullname','$username1','$email','$phone_no',MD5('$password'),'','','','',CURRENT_TIMESTAMP(),'0')";
   
     $result2=mysqli_query($conn,$sql);
    if($result2){
          echo "New Student Added successfully.";
     }else{
         echo "failed";
     }
        }else{
            echo "Username is Alerady Taken.";
        }
    
  }else{

   echo "College Not Register Yet";

    }
   
}



?>


     <div class="container">

      <header>Add Student</header>

     <div class="content">

      <form action="#" class="form" method="post">

      <div class="user_details">

        <div class="input-box">

          <label>Full Name</label>

          <input type="text" id="firstname" name="firstname" placeholder="Enter full name" required />

        </div>



        <div class="column">

            <div class="input-box">

              <label>Username</label>

              <input type="text" id="username1" name="username1" placeholder="Enter username here" required />

            </div>

            <div class="input-box">

              <label>Phone_No</label>

              <input type="tel" id="phone_no" name="phone_no" placeholder="Enter your Phone Number" required />

            </div>

          </div>



        <div class="column">

          <div class="input-box">

            <label>Email_ID</label>

            <input type="email" id="email_id" name="email_id" placeholder="Enter email address" required />

          </div>

          <div class="input-box">

            <label>Password</label>

            <input type="text"  id="passowrd" name="passowrd" placeholder="Enter your password" required />

          </div>

        </div>

      <div class="button">
          <input name="submit" type="submit" value="Add Student">
        </div>

    </div>

      </form>

    </div>

    </div>

</section>

 <link rel="stylesheet" href="addstudents.css" />

  </body>

</html>
