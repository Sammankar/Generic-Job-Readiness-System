<?php

include 'connection.php';


//$faculty= $_POST['faculty'];
$faculty= '37';


   $sql = "SELECT * FROM `subjects_mapping` WHERE `assign_status`=0 AND `sumap_id`=5";
   $result= mysqli_query($conn, $sql);
    if($result)
    {
          $sql1 = "UPDATE `subjects_mapping` SET `users_id`=$faculty,`assign_status`=1 WHERE `sumap_id`=5";
          $result1= mysqli_query($conn, $sql1);
          if($result1){
              echo "Faculty Assign Succesfully.";
          }else{
              echo "Faculty Not Assign.";
          }
             
     }
     else
     {
         echo "JHAND";
     }
     
?>