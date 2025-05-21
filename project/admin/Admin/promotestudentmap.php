<?php
include_once 'connection.php';
$objarray = array();
$result = mysqli_query($conn,"SELECT * FROM student_mapping WHERE sm_id='" . $_GET['sm_id'] . "'");
$sm_id=$_GET['sm_id'];

function promote($users_id, $semester_id, $sm_id, $conn){
    
    
    //echo $users_id,$semester_id,$sm_id;
    

    $result_p = mysqli_query($conn,"SELECT * FROM student_mapping WHERE sm_id='" . $_GET['sm_id'] . "'");
                    if(mysqli_num_rows($result_p)>0){
                        //echo "success";
                     $sql = "UPDATE `student_mapping` SET `semester_id`=$semester_id WHERE sm_id=$sm_id";
                     $result1=mysqli_query($conn,$sql);
                     if($result1){
                         echo "promoted";
                         $sql1="SELECT * FROM `tbl_user` WHERE `users_id`=$users_id";
                         $result2=mysqli_query($conn,$sql1);
                         if($result2){
                             $sql2="UPDATE `tbl_user` SET `semesters`=$semester_id WHERE `users_id`=$users_id ";
                             $result3=mysqli_query($conn,$sql2);
                             if($result3){
                                 header("Location: viewstudentmap.php");
                                 //echo "success";
                             }else{
                                 echo "failed";
                             }
                         }else{
                             echo "fail1";
                         }
                     }else{
                         echo "fail";
                     }
                    }else{
                        echo "fail";
                    }

                  
}
if(mysqli_num_rows($result) > 0)
{
     while($obj=mysqli_fetch_object($result))
                {
                    array_push($objarray,$obj);
                     
                }
             $users_id= $objarray[0]->users_id;
             $program_id=$objarray[0]->program_id;
             $semester_id=$objarray[0]->semester_id;
             $year_id=$objarray[0]->year_id;
             
             switch($year_id){
                 default: echo "kindly Contact to Developer";
                 break;
                 case 1: if($semester_id < 2){
                     $semester_id++;
                     promote($users_id, $semester_id, $sm_id, $conn);
                 }else{
                     echo "Semester Not mapped or Student is in Last semester";
                 }
                 break;
               case 2: if($semester_id < 4){
                     $semester_id++;
                     promote($users_id, $semester_id, $sm_id, $conn);
                 }else{
                     echo "Semester Not mapped or Student is in Last semester";
                 }
                 break;
                 case 3: if($semester_id <6){
                     $semester_id++;
                     promote($users_id, $semester_id, $sm_id, $conn);
                 }else{
                     echo "Semester Not mapped or Student is in Last semester";
                 }
                 break;
                 case 4: if($semester_id <8){
                     $semester_id++;
                     promote($users_id, $semester_id, $sm_id, $conn);
                 }else{
                     echo "Semester Not mapped or Student is in Last semester";
                 }
                 break;
                 
             }
             //echo $users_id,$program_id,$year_id,$semester_id;
}else{
    echo "Maaping not found";
}


?>
