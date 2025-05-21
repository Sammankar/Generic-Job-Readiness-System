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
$year=$_POST['year'];
$semester=$_POST['semester'];
$subject=$_POST['subject'];

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
      $query = "SELECT * FROM subjects_mapping WHERE `program_id`=$program AND `specialization_id`=$specialization AND subject_id=$subject";
      $query=mysqli_query($conn,$query);
      $query_row=mysqli_num_rows($query);
      if($query_row == 0){
         // echo "harish=".$query;
          $sql = "INSERT INTO `subjects_mapping` (`sumap_id`, `college_id`, `program_id`, `year_id`, `specialization_id`, `semester_id`, `subject_id`, `subjectmap_status`) VALUES (NULL, '$college_id', '$program', '$year', '$specialization', '$semester', '$subject', '1')";
        $result2=mysqli_query($conn,$sql);
        if($result2){
            echo "Subject Mapped successfully";
            $sql2="UPDATE tbl_subject SET subject_status='1' WHERE subject_id='$subject'";
                        $check1=mysqli_query($conn,$sql2);
                        if($check1){
                            //echo "subject status changed in tbl_subject";
                        }else{
                            //echo "Subject status not changed in tbl_subject";
                        }
        }else{
            echo "failed";
        }
      }else{
          echo "Subject is Already Mapped";
      }
      
  }else{
      echo "College Not Register Yet";
  }
}


?>
<div class="container">

      <header>Map Subjects</header>

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
              <label>Years</label>  
                       <select  class="form-select"  name="year" id="show2"></select>
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
                           <?php
                    include ('connection.php');
                    $subject  = mysqli_query($conn, "SELECT subject_id, subject_name FROM tbl_subject WHERE college_id='$college_id'");
                    while($p = mysqli_fetch_array($subject)) {  
                    ?>
                    <option value="<?php echo $p['subject_id']?>" ><?php echo $p['subject_name']?></option>
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
 
      $.ajax({
        type: 'POST',
        url: 'fetchyears.php',
        data: {id:Pid},  
        success: function(data)  
         {
            $('#show2').html(data);
         }
        });
     });
  });
</script>
<script>
  $(document).ready(function(){
     $('#program').change(function(){
      var Pid = $('#program').val(); 
 
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
     $('#program').change(function(){
      var Pid = $('#program').val(); 
 
      $.ajax({
        type: 'POST',
        url: 'fetchsemesters.php',
        data: {id:Pid},  
        success: function(data)  
         {
            $('#show3').html(data);
         }
        });
     });
  });
</script>
<script>
    $('#show4').chosen();
</script>
 <link rel="stylesheet" href="addprogram.css" />

  </body>

</html>
