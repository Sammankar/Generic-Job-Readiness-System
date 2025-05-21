<?php
include_once 'adminheader.php';
?>

<?php
include 'connection.php';
$sql= "SELECT tbl_subject.subject_name FROM subjects_mapping,tbl_subject WHERE subjects_mapping.subject_id=tbl_subject.subject_id AND sumap_id='" . $_GET['sumap_id'] . "'";
$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result);

if(isset($_POST['add'])){
$faculty=$_POST['faculty'];
//$faculty=4;


   $sql2 = "SELECT * FROM `subjects_mapping` WHERE `assign_status`=0 AND `sumap_id`='" . $_GET['sumap_id'] . "'";
   $result2= mysqli_query($conn, $sql2);
    if($result2)
    {   
        
          $sql1 = "UPDATE `subjects_mapping` SET `users_id`=$faculty,`assign_status`=1 WHERE `sumap_id`='" . $_GET['sumap_id'] . "'";
          $result1= mysqli_query($conn, $sql1);
          if($result1){
              //header("location :viewsubjectnotassign.php");
              echo "Faculty Assign Succesfully.";
          }else{
              echo "Faculty Not Assign.";
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

            <label>Subject Name: </label>

            <span class><?php echo $row['subject_name']; ?></span>

        </div>

                <div class="input-box">

            <label>Assign Faculty </label>

                       <select id="faculty" name= "faculty">
                           <?php
                    include ('connection.php');
                    $faculty  = mysqli_query($conn, "SELECT `users_id`, `fullname` FROM `tbl_user` WHERE college_id=$college_id AND role_id=2");
                    while($p = mysqli_fetch_array($faculty)) {  
                    ?>
                    <option value="<?php echo $p['users_id']?>" ><?php echo $p['fullname']?></option>
                    <?php } ?>
                </select>

        </div>

        <div class="input-box">
            <input type="submit" name= "add" value="Assign">
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

