<?php
include "connection.php";
include "promotestudentmap.php";
$users_id=$_GET['users_id'];
$semester_id=$_GET['semester_id'];
$sm_id=$_GET['sm_id'];
//function promote($users_id, $semester_id, $sm_id){
                    $query= "SELECT * FROM student_mapping WHERE sm_id=$sm_id";
                    $result_p=mysqli_query($conn,$query);
                    if(mysqli_num_rows($result_p)>0){
                        echo "success";
                    }else{
                        echo "fail00";
                    }
    echo $users_id,$semester_id,$sm_id;

//}
?>