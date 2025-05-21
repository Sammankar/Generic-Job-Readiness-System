<?php 
include "connection.php";
  //echo "hello=".$college_id;
  $id = $_POST['id'];
 $sql="SELECT `sumap_id`, subjects_mapping.college_id, `program_id`, `year_id`, `specialization_id`, `semester_id`, tbl_subject.subject_name, `subjectmap_status` FROM subjects_mapping,tbl_subject WHERE subjects_mapping.subject_id=tbl_subject.subject_id AND semester_id= $id";
   $result = mysqli_query($conn,$sql);
 
  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
     $out .=  '<option>'.$row['subject_name'].'</option>'; 
  }
   echo $out;
   
   
?>