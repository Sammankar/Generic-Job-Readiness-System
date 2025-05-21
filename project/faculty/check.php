<?php

session_start();

include('connection.php');

$objarray = array();

$message = '';

 // if(isset($_POST['loginSub'])) 

//  {



    //   $username = $_POST['username'];

    //   $password = $_POST['password']; 
      
      $username = "chandanprasad";

      $password = "123456"; 

     //role_id='1';

$sql = "SELECT * FROM tbl_user WHERE  username = '$username' and password =md5('$password')";



$result=mysqli_query($conn,$sql);


if($result > 0){

 

    while($obj=mysqli_fetch_object($result)) 

    {

        array_push($objarray,$obj);

         

    }

   if(($objarray[0]->role_id=="2")&&($objarray[0]->status=="1"))

    {

       echo "Mai Marega";
       
       $users_id=$objarray[0]->users_id;
       $fullname=$objarray[0]->fullname;
       $email_id=$objarray[0]->email_id;
       echo "user=".$fullname;
       echo "user=".$users_id;
       echo "user=".$email_id;
       
        $_SESSION['users_id'] = $users_id;
                
        $_SESSION['fullname'] = $fullname;
        
        $_SESSION['username'] = $username;
        
        $_SESSION['email'] = $email_id;
        

        //header("location: facultydashboard.php");

        

    }

  else

  {

       echo "User activation is pending or role mismatched";

  }

}else{

    echo 'kindly check your credentials';

}

 //  }



?>