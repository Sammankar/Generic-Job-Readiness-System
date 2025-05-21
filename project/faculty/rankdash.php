<?php
session_start();
include 'connection.php';

        $username=   $_SESSION['username'];
   //$tat ="SELECT * FROM `tbl_user` WHERE `username`=$username";
   $tat = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
     $tresult1= mysqli_query($conn, $tat);
     //$tcheck= mysqli_num_rows($tresult1);
    if($tresult1)
    {
            while($obj=mysqli_fetch_object($tresult1))
                {
                    array_push($objarray,$obj);
                     
                }
             $tusers_id= $objarray[0]->users_id;
             
     }
     else
     {
         echo "JHAND";
     }
if(isset($_POST['request'])){
    
    $request= $_POST['request'];
    
    $query="SELECT `users_id`, `role_id`, `college_id`, `fullname`, `username`, rank.email_id, `phone_no`, `password`, `semesters`, `profile_photo`, `gender`, `age`, `address`, `dor`, `status`, rank.score, rank.time FROM tbl_user,rank WHERE tbl_user.email_id=rank.email_id";
    $result= mysqli_query($conn,$query);
    $count= mysqli_num_rows($result);

    
     
     
//$res= mysqli_query($conn,"SELECT `users_id`, `role_id`, `college_id`, `fullname`, `username`, rank.email_id, `phone_no`, `password`, `semesters`, `profile_photo`, `gender`, `age`, `address`, `dor`, `status`, rank.score, rank.time FROM tbl_user,rank WHERE tbl_user.email_id=rank.email_id");

//$res = mysqli_query($conn,"SELECT * FROM tbl_user WHERE college_id='" . $_GET['college_id'] . "'");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Admins</title>
      <link href=  "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
       <link href= "https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
       <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
       <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        
   <style>
                   .container{
                    border-collapse: collapse;
                    margin: 10px 0;
                    font-size: 0.9em;
                    min-width: 400px;
                    border-radius: 5px 5px 0 0;
                    overflow: hidden;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                }
                .table tr th{
                    background-color:var(--box1-color);
                    border-collapse: collapse;
                    margin: 25px 0;
                    font-size: 0.9em;
                    min-width: 100px;
                    border-radius: 5px 5px 0 0;
                    overflow: hidden;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                    color: black;
                    text-align: center;
                    font-weight: bold;
                }
                 tr th{
                    color: black;
                    text-align: center;
                    font-weight: bold;
                }
                ..table tr td{
                    border-collapse: collapse;
                    margin: 25px 0;
                    font-size: 0.9em;
                    min-width: 100px;
                    border-radius: 10px 10px 10px 10px;
                    overflow: hidden;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                    color: black;
                    text-align: justify;
                }
                .table tr td i{
                    border-collapse: collapse;
                    font-size: 25px;
                    padding: 14px;
                    min-width: 20px;
                    border-radius: 5px 5px 0 0;
                    overflow: hidden;
                    color: blue;
                    text-align: center;
                }
                .table tr td far{
                    color:Red;
                }
       .container .table tr td .btn{
           background: #87f07e;
       }

   </style>
   
</head>
<body>
  <div class="container">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Rank</th>
        <th>Name</th>
        <th>Gender</th>
        <th>College</th>
        <th>Score</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if($count){
      $c=1;
      while($row1=mysqli_fetch_assoc($result)){?>
      <tr>
        <td><?php echo $c++;?></td>
        <td><?php echo $row1['fullname']?></td>
        <td><?php echo $row1['gender']?></td>
        <td><?php echo $row1['college_id']?></td>
        <td><?php echo $row1['score']?></td>

      </tr>
      <?php }}} ?>
    </thead>
    </table>
   </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
  <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js" ></script>
  <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready( function () {
    $('.table').DataTable();
  });
  </script>
</body>
</html>