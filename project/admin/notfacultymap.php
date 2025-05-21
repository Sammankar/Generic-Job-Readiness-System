<?php
include_once 'adminheader.php';
?>

<?php
include 'connection.php';
$sql= "SELECT tbl_program.program_name, tbl_user.fullname,tbl_subject.subject_name,tbl_specialization.specialization_name,subjects_mapping.semester_id FROM subjects_mapping,tbl_subject,tbl_program,tbl_specialization,tbl_user WHERE subjects_mapping.program_id=subjects_mapping.program_id AND subjects_mapping.specialization_id=tbl_specialization.specialization_id AND subjects_mapping.subject_id=tbl_subject.subject_id AND subjects_mapping.users_id=tbl_user.users_id AND sumap_id='" . $_GET['sumap_id'] . "'";
$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result);

if(isset($_POST['add'])){
$faculty=0;
//$faculty=4;


   $sql2 = "SELECT * FROM `subjects_mapping` WHERE `assign_status`=1 AND `sumap_id`='" . $_GET['sumap_id'] . "'";
   $result2= mysqli_query($conn, $sql2);
    if($result2)
    {   
        
          $sql1 = "UPDATE `subjects_mapping` SET `users_id`=$faculty,`assign_status`=0 WHERE `sumap_id`='" . $_GET['sumap_id'] . "'";
          $result1= mysqli_query($conn, $sql1);
          if($result1){
              //header("location :viewsubjectnotassign.php");
              echo "Removed Faculty Assign Succesfully.";
          }else{
              echo "Not Removed Faculty Assign.";
          }
             
     }
     else
     {
         echo "JHAND";
     }
     
}

?>

    <div class="container">

      <header>Assign Faculty To Subject</header>

     <div class="content">

      <form action="" class="form" method="post" enctype="multipart/form-data">

      <div class="user_details">
          
          <div class="input-box">

            <label>Program Name: </label>

            <span class><?php echo $row['program_name']; ?></span>

        </div>
        
        <div class="input-box">

            <label>Specialization Name: </label>

            <span class><?php echo $row['specialization_name']; ?></span>

        </div>
        
        <div class="input-box">

            <label>Semester: </label>

            <span class><?php echo $row['semester_id']; ?></span>

        </div>
        

        <div class="input-box">

            <label>Subject Name: </label>

            <span class><?php echo $row['subject_name']; ?></span>

        </div>

                <div class="input-box">

            <label>Assigned Faculty: </label>
                <span class><?php echo $row['fullname']; ?></span>

        </div>

        <div class="input-box">
            <input type="submit" name= "add" value="Remove">
            </div>

    </div>

      </form>

    </div>

    </div>

</section>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/>
<script>
    $('#faculty').chosen();
</script>
 <link rel="stylesheet" href="addprogram.css" />

  </body>

</html>

