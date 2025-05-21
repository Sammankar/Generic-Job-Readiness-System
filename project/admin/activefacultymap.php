<?php
include_once 'connection.php';

 $facultyallocation_id= $_GET['facultyallocation_id'];
 $facultyallocation_status= $_GET['facultyallocation_status'];
 $updatequery = "UPDATE faculty_allocation set facultyallocation_status=$facultyallocation_status WHERE facultyallocation_id=$facultyallocation_id";
 mysqli_query($conn, $updatequery);
 header('location: viewfacultymap.php');
?>