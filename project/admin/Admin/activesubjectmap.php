<?php
include_once 'connection.php';

 $sumap_id= $_GET['sumap_id'];
 $subjectmap_status= $_GET['subjectmap_status'];
 $updatequery = "UPDATE subjects_mapping set subjectmap_status=$subjectmap_status WHERE sumap_id=$sumap_id";
 mysqli_query($conn, $updatequery);
 header('location: viewsubjectmap.php');
?>