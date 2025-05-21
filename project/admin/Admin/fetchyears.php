<?php 
include "connection.php";
  //echo "hello=".$college_id;
  $id = $_POST['id'];
 $sql="SELECT `college_id`, `program_id`, `program_name`, `program_description`,`program_status`, years.years, tbl_semester.semesters FROM tbl_program,years,tbl_semester WHERE tbl_program.year_id=years.year_id AND tbl_program.semester_id=tbl_semester.semester_id AND program_id= $id";
   $result = mysqli_query($conn,$sql);
 
  $out='';
  while($row = mysqli_fetch_assoc($result)) 
  {   
     $out .=  '<option>'.$row['years'].'</option>'; 
  }
   echo $out;
   
   
?>