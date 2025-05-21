<?php
include_once 'connection.php';
 $program_id= $_GET['program_id'];
 $program_status= $_GET['program_status'];
 $updatequery = "UPDATE tbl_program set program_status=$program_status WHERE program_id=$program_id";
 mysqli_query($conn, $updatequery);
 header('location: viewprogram.php');
?>