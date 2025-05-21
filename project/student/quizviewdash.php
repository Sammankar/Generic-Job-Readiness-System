<?php
session_start();
include 'connection.php';
$objarray = array();
$objarray1 = array();
$objarray2 = array();
$objarray3 = array();
$objarray4 = array();

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
     
     
     $sql="SELECT * FROM `student_mapping` WHERE users_id=$tusers_id";
     $result=mysqli_query($conn,$sql);
     if($result)
    {
            while($obj1=mysqli_fetch_object($result))
                {
                    array_push($objarray1,$obj1);
                     
                }
             $college_id= $objarray1[0]->college_id;
             
     }
     else
     {
         echo "JHAND";
     }
     //echo "hello=".$college_id;
     
     
     $sql1="SELECT * FROM `student_mapping` WHERE users_id=$tusers_id";
     $result1=mysqli_query($conn,$sql1);
     if($result1)
    {
            while($obj2=mysqli_fetch_object($result1))
                {
                    array_push($objarray2,$obj2);
                     
                }
             $program_id= $objarray2[0]->program_id;
             
     }
     else
     {
         echo "JHAND";
     }
     //echo "hello=".$program_id;
     
     
     $sql2="SELECT * FROM `student_mapping` WHERE users_id=$tusers_id";
     $result2=mysqli_query($conn,$sql2);
     if($result2)
    {
            while($obj3=mysqli_fetch_object($result2))
                {
                    array_push($objarray3,$obj3);
                     
                }
             $specialization_id= $objarray3[0]->specialization_id;
             
     }
     else
     {
         echo "JHAND";
     }
     //echo "hello=".$specialization_id;
     
     
     $sql3="SELECT * FROM `student_mapping` WHERE users_id=$tusers_id";
     $result3=mysqli_query($conn,$sql3);
     if($result3)
    {
            while($obj4=mysqli_fetch_object($result3))
                {
                    array_push($objarray4,$obj4);
                     
                }
             $semester_id= $objarray4[0]->semester_id;
             
     }
     else
     {
         echo "JHAND";
     }
     //echo "hello=".$semester_id;
     
     
     
$res= mysqli_query($conn,"SELECT `quiz_id`,tbl_program.program_id, tbl_program.program_name,tbl_specialization.specialization_id,  tbl_specialization.specialization_name,tbl_quiz.semester_id,tbl_subject.subject_name,tbl_user.fullname, `title`, `sahi`, `wrong`, `total`, `time`, `tag`, `upload_time` FROM tbl_quiz,tbl_program,tbl_specialization,tbl_subject,tbl_user WHERE tbl_quiz.program_id=tbl_program.program_id AND tbl_quiz.specialization_id=tbl_specialization.specialization_id AND tbl_subject.subject_id=tbl_quiz.subject_id AND tbl_quiz.users_id=tbl_user.users_id AND tbl_quiz.program_id=$program_id AND tbl_quiz.specialization_id=$specialization_id AND tbl_quiz.semester_id=$semester_id");
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
        <th>Program Name</th>
        <th>Specialization Name</th>
        <th>Semester Name</th>
        <th>Subject Name</th>
        <th>Quiz Title</th>
        <th>Total Questions</th>
        <th>Upload Time</th>
        <th>Uploaded By</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($res)){?>
      <tr>
        <td><?php echo $row['program_name']?></td>
        <td><?php echo $row['specialization_name']?></td>
        <td><?php echo $row['semester_id']?></td>
        <td><?php echo $row['subject_name']?></td>
        <td><?php echo $row['title']?></td>
        <td><?php echo $row['total']?></td>
        <td><?php echo $row['upload_time']?></td>
        <td><?php echo $row['fullname']?></td>

        <td>        
                     <p><a href="solvequiz.php?sumap_id=<?php echo $row['sumap_id']?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="View Quiz">View Quiz</a></p>
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