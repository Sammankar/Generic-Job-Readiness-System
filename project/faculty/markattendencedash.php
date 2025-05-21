<?php
session_start();
include 'connection.php';
$objarray = array();

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
     //echo "hello=".$tusers_id;
     
     
$res= mysqli_query($conn,"SELECT `sumap_id`,tbl_program.program_name,tbl_program.year_id,tbl_specialization.specialization_name,subjects_mapping.semester_id,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_credits FROM subjects_mapping,tbl_program,tbl_specialization,tbl_subject WHERE subjects_mapping.program_id=tbl_program.program_id AND subjects_mapping.specialization_id=tbl_specialization.specialization_id AND subjects_mapping.subject_id=tbl_subject.subject_id AND users_id=$tusers_id");
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
       <link href= "https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
       <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
       <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">
        
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
        
        <th>Program</th>
        <th>Specialization</th>
        <th>Semester</th>
        <th>Subject Name</th>
        <th>Subject Code</th>
        <th>View students</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($res)){?>
      <tr>
        
        <td><?php echo $row['program_name']?></td>
        <td><?php echo $row['specialization_name']?></td>
        <td><?php echo $row['semester_id']?></td>
        <td><?php echo $row['subject_name']?></td>
        <td><?php echo $row['subject_code']?></td>
        <td>
            <p><a href="viewsubjectstudents.php?sumap_id=<?php echo $row['sumap_id']?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Mark Attendance">Mark Attendance</a></p>
        </td>


        
      </tr>
      <?php } ?>
    </thead>
    </table>
   </div>



  <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" ></script>
  <script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  $(document).ready( function () {
    $('.table').DataTable();
  });
  </script>
</body>
</html>