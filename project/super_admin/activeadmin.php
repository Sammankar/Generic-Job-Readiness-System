<?php
include_once 'connection.php';

 $users_id= $_GET['users_id'];
 $status= $_GET['status'];
 $updatequery = "UPDATE tbl_user set status=$status WHERE users_id=$users_id";
 mysqli_query($conn, $updatequery);
 header('location: dashboard.php');
?>