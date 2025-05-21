<?php
    $servername='localhost';
    $username='j1bd739jt478';
    $password='Sanjyot@03';
    $dbname = "projectquiz";
    $con=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$con){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>