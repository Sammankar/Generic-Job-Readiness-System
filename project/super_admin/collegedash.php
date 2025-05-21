<?php
include 'connection.php';
$res= mysqli_query($conn,"SELECT `users_id`,`fullname`,`username`,`email_id`,'phone_no',`password`,'profile_photo','gender','age','address',`dor`,`status`, role.role_name FROM tbl_user,role WHERE tbl_user.role_id=role.role_id AND college_id='" . $_GET['college_id'] . "'");
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
        <th>UserId</th>
        <th>Role</th>
        <th>Username</th>
        <th>Email Id</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($res)){?>
      <tr>
        <td><?php echo $row['users_id']?></td>
        <td><?php echo $row['role_name']?></td>
        <td><?php echo $row['username']?></td>
        <td><?php echo $row['email_id']?></td>
         <td><?php 

        if( $row['status']==1)

        {

        //echo "Deactive";

        echo '<p><a href="activeusers.php?users_id=' .$row['users_id'].' &status=0" class="btn btn-success">Active</a><p>';

        }else{

             echo '<p><a href="activeusers.php?users_id=' .$row['users_id'].' &status=1" class="btn btn-danger">Deative</a><p>';

        }

        ?>

        </td>

        <td>
                    <a href="editusers.php?users_id=<?php echo $row['users_id']?>"><i class="fa fa-pen text-indigo-500" data-toggle="tooltip" title="Edit"></i></a>
                    <a href="deleteusers.php?users_id=<?php echo $row['users_id']?>"><i class="fa fa-trash ml-5 text-red-500" data-toggle="tooltip" title="Delete"></i></a>
                </td>
        
      </tr>
      <?php } ?>
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