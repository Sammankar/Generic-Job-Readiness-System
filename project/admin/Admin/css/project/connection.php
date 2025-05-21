<?php
    $servername='sql101.infinityfree.com';
    $username='if0_37900037';
    $password='Sanjyot123';
    $dbname = "if0_37900037_project";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>