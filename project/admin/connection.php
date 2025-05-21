<?php
    $servername='localhost';
    $username='j1bd739jt478';
    $password='Sanjyot@03';
    $dbname = "bcafinalproject";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>