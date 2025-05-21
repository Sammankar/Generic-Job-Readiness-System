<?php 
session_start();
include "connection.php";
$objarray = array();
$objarray1 = array();
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
  $college_id=$tcollege_id;
  
  //echo "hello=".$college_id;
  $id = $_POST['id'];
  $sql = "SELECT DISTINCT `smap_id`, specializations_mapping.college_id, specializations_mapping.program_id,tbl_specialization.specialization_id, tbl_specialization.specialization_name, `year_id`, `semester_id`, `specializationmap_status` FROM specializations_mapping,tbl_specialization WHERE specializations_mapping.specialization_id=tbl_specialization.specialization_id AND specializations_mapping.program_id= $id AND specializations_mapping.college_id=$college_id";
  $result = mysqli_query($conn,$sql);
 
  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
     $out .=  "<option value='".$row['specialization_id']."'>".$row['specialization_name']."</option>";
  }
   echo $out;
   
   
?>