<?php 
include "connection.php";

  //echo "hello=".$college_id;
   $id = $_POST['id'];
   //$id = 7;
  $sql = "SELECT DISTINCT tbl_specialization.specialization_id, tbl_specialization.specialization_name FROM subjects_mapping,tbl_specialization WHERE subjects_mapping.specialization_id=tbl_specialization.specialization_id AND program_id=$id";
  $result = mysqli_query($conn,$sql);
 
  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
     $out .=  "<option value='".$row['specialization_id']."'>".$row['specialization_name']."</option>";
    // $out .=  '<option>'.$row['specialization_name'].'</option>'; 
  }
   echo $out;
   
   
?>