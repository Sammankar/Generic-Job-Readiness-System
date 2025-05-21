<?php
session_start();
include 'connection.php';
$objarray = array();
$objarray1 = array();

    $username=   $_SESSION['username'];

   $tat = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
     $tresult1= mysqli_query($conn, $tat);

    if($tresult1)
    {
            while($obj=mysqli_fetch_object($tresult1))
                {
                    array_push($objarray,$obj);
                     
                }
             $users_id= $objarray[0]->users_id;
             //echo "hello=".$users_id;
     }
     else
     {
         echo "JHAND";
     }
     
        $sql1 = "SELECT * FROM `college_registration` WHERE `users_id`=$users_id";
        $result1= mysqli_query($conn, $sql1);
        
            if($result1)
            {
            while($obj1=mysqli_fetch_object($result1))
                {
                    array_push($objarray1,$obj1);
                     
                }
             $college_id= $objarray1[0]->college_id;
              //echo "hello=".$college_id;
             }
             else
             {
                 echo "JHAND";
             }
             
?>