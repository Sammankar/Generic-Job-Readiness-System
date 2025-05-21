<?php 
include "connection.php";
  //echo "hello=".$college_id;
 $objarray = array();
  $id = $_POST['id'];
  //$id = "7";
 //$sql="SELECT `college_id`, `program_id`, `program_name`, `program_description`,`program_status`, years.years, tbl_semester.semesters FROM tbl_program,years,tbl_semester WHERE tbl_program.year_id=years.year_id AND tbl_program.semester_id=tbl_semester.semester_id AND program_id= $id";
 $sql1 = "SELECT semester_id FROM tbl_program WHERE program_id= $id";

   $result1 = mysqli_query($conn,$sql1);
   if($result1)
   {
       while($obj=mysqli_fetch_object($result1))
                {
                    array_push($objarray,$obj);
                     
                }
             $tsemester_id= $objarray[0]->semester_id;
            // echo "hello=".$tsemester_id;
            
            $sql = "SELECT `semesters` FROM `tbl_semester` ORDER BY semesters ASC LIMIT $tsemester_id";
            $result = mysqli_query($conn,$sql);
                         $out='';
            while($row =mysqli_fetch_array($result)) 
            {   
               $out .=  '<option>'.$row['semesters'].'</option>'; 
            }
             echo $out;
            
   }
   else{
       echo "fail";
   }

   
   
?>