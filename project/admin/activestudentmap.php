<?php
include_once 'connection.php';

 $sm_id= $_GET['sm_id'];
 $studentmap_status= $_GET['studentmap_status'];
 $updatequery = "UPDATE student_mapping set studentmap_status=$studentmap_status WHERE sm_id=$sm_id";
 mysqli_query($conn, $updatequery);
 header('location: viewstudentmap.php');
?>