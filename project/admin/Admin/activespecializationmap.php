<?php
include_once 'connection.php';

 $smap_id= $_GET['smap_id'];
 $specializationmap_status= $_GET['specializationmap_status'];
 $updatequery = "UPDATE `specializations_mapping` set specializationmap_status=$specializationmap_status WHERE smap_id=$smap_id";
 mysqli_query($conn, $updatequery);
 header('location: viewspecializationmap.php');
?>