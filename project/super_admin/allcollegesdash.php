<?php
include_once 'connection.php';
//$res= mysqli_query($conn,"SELECT * FROM tbl_user WHERE role_id=1");
$res= mysqli_query($conn,"SELECT college_registration.college_id,`college_name`,`college_address`,`college_logo`, tbl_user.username FROM college_registration,tbl_user WHERE college_registration.users_id=tbl_user.users_id");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Colleges</title>
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
        <th>College ID</th>
        <th>Admin Name</th>
        <th>College Name</th>
        <th>College Address</th>
        <th>College Logo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($res)){?>
      <tr>
        <td><?php echo $row['college_id']?></td>
        <td><?php echo $row['username']?>
        <td><?php echo $row['college_name']?></td>
        <td><?php echo $row['college_address']?></td>
        <td><img src="../images/allcollegelogo/<?php echo $row['college_logo']?>" height="30px" width="30px">
        <td>
          <a href="viewcollege.php?college_id=<?php echo $row['college_id']?>"><i class="fa fa-eye text-indigo-500" style="color: #0bea4e;" data-toggle="tooltip" title="View"></i></a>
          <a href="editcollege.php?college_id=<?php echo $row['college_id']?>"><i class="fa fa-pen ml-5 text-indigo-500" data-toggle="tooltip" title="edit"></i></a>
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