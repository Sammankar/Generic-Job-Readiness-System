<?php
include_once 'adminheader.php';
?>
<?php 
//session_start();
include 'connection.php';
include 'fetchusersid.php';
//include 'fetchyears.php';
if(isset($_POST['add'])){
    
$program= $_POST['program'];
$specialization =$_POST['specialization'];
//$year=$_POST['year'];
$semester=$_POST['semester'];
$subject=$_POST['subject'];
$faculty=$_POST['faculty'];

// echo "program=".$program;
// echo "specialization=".$specialization;
// echo "year=".$year;
// echo "semester=".$semester;
// echo "hell=".$college_id;
// echo "hii=".$users_id;

$sql12 = "SELECT * FROM `college_registration` WHERE `users_id`=$users_id";
$check= mysqli_num_rows($result1);

  if($check == 1){
      
      //echo "harish=".$check;
      $query = "SELECT * FROM `faculty_allocation`";
     // $query= "SELECT * FROM subjects_mapping";
      $query=mysqli_query($conn,$query);
      if($query == true){
         // echo "harish=".$query;
          $sql = "INSERT INTO `faculty_allocation`(`facultyallocation_id`, `users_id`, `college_id`, `program_id`, `semester_id`, `specialization_id`, `subject_id`, `facultyallocation_status`) VALUES (NULL,'$faculty', '$college_id', '$program', '$semester','$specialization' ,'$subject', '1')";
        $result2=mysqli_query($conn,$sql);
        if($result2){
            echo "Faculty Mapped successfully";
        }else{
            echo "failed";
        }
      }else{
          echo "jhand";
      }
      
  }else{
      echo "College Not Register Yet";
  }
}


?>
<div class="container">

      <header>Map Faculty</header>

     <div class="content">

      <form action="" class="form" method="post" enctype="multipart/form-data">

      <div class="user_details">

        <div class="input-box">
             <label>Select Program</label>
                       <select class="form-select" name="program" id="program">
        <option>Select Option</option>
 
        <?php 
        $program  = mysqli_query($conn, "SELECT program_id, program_name FROM tbl_program WHERE program_status='1' AND college_id='$college_id'");
                    while($row = mysqli_fetch_array($program)) {  
                    ?>
            <option value="<?php echo $row['program_id'] ?>"><?php echo $row['program_name'] ?></option>
            <?php }  ?>
 
        </select>

        </div>
        <div class="input-box">
              <label>Select Specialization</label>  
                       <select name="specialization" class="form-select" id="show1">
                </select>
          </div>
          
           <div class="input-box">
              <label>Semester</label> 
               <select  class="form-select"  name="semester" id="show3"></select>
       </div>
          <div class="input-box">  
           <label>Select Subject</label>
                       <select name="subject" class="form-select" id="show4">
                </select>
          </div>
          <div class="input-box">  
           <label>Select Faculty</label>
                       <select name="faculty" class="form-select" id="show5">
                           <?php
                    include ('connection.php');
                    $subject  = mysqli_query($conn, "SELECT `users_id`, `role_id`, `college_id`, `fullname`, `username`, `email_id`, `phone_no`, `password`, `profile_photo`, `gender`, `age`, `address`, `dor`, `status` FROM `tbl_user` WHERE role_id=2 AND `status`=1 AND college_id=$college_id");
                    while($p = mysqli_fetch_array($subject)) {  
                    ?>
                    <option value="<?php echo $p['users_id']?>" ><?php echo $p['fullname']?></option>
                    <?php } ?>
                </select>
          </div>
          
         
 
        <div class="input-box">
            <input type="submit" name= "add" value="Map">
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
  $(document).ready(function(){
     $('#program').change(function(){
      var Pid = $('#program').val(); 
     // alert("hello" +Pid);
 
      $.ajax({
        type: 'POST',
        url: 'fetchspecialization.php',
        data: {id:Pid},  
        success: function(data)  
         {
            $('#show1').html(data);
         }
        });
     });
  });
</script> 
<script>
  $(document).ready(function(){
     $('#show1').change(function(){
      var Sid = $('#show1').val(); 
      //alert("hello" +Sid);
 
      $.ajax({
        type: 'POST',
        url: 'fetchsemestersfaculty.php',
        data: {id:Sid},  
        success: function(data)  
         {
            $('#show3').html(data);
         }
        });
     });
  });
</script>
<script>
  $(document).ready(function(){
     $('#show3').change(function(){
      var Eid = $('#show3').val(); 
     alert("hello" +Eid);
 
      $.ajax({
        type: 'POST',
        url: 'fetchsubjectsfaculty.php',
        data: {id:Eid},  
        success: function(data)  
         {
            $('#show4').html(data);
         }
        });
     });
  });
</script>
<script>
    $('#show4').chosen();
</script>
<script>
    $('#show5').chosen();
</script>
 <link rel="stylesheet" href="addprogram.css" />

  </body>

</html>
