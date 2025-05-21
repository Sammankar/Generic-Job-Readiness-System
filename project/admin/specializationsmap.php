<?php
include_once 'adminheader.php';
?>
<?php 
//session_start();
include 'connection.php';
include 'fetchusersid.php';
include 'fetchyears.php';
if(isset($_POST['add'])){
    
$program= $_POST['program'];
$specialization =$_POST['specialization'];
$year=$_POST['year'];
$semester=$_POST['semester'];

// echo "program=".$program;
// echo "specialization=".$specialization;
// echo "year=".$year;
// echo "semester=".$semester;
// echo "hell=".$college_id;
// echo "hii=".$users_id;

$sql12 = "SELECT * FROM `college_registration` WHERE `users_id`=$users_id";
$check= mysqli_num_rows($result1);

  if($check == 1){
      
      
      
      $query = "SELECT * FROM specializations_mapping WHERE program_id=$program AND specialization_id=$specialization";
      $query=mysqli_query($conn,$query);
      $query_row=mysqli_num_rows($query);
      if($query_row == 0){
          $sql = "INSERT INTO `specializations_mapping` (`smap_id`, `college_id`, `program_id`, `specialization_id`, `year_id`, `semester_id`, `specializationmap_status`) VALUES (NULL, '$college_id', '$program', '$specialization', '$year', '$semester', '1')";
        $result2=mysqli_query($conn,$sql);
        if($result2){
            echo "Specialization Mapped successfully";
        }else{
            echo "failed";
        }
      }else{
          echo "Already Specialization Mapped";
      }
      
  }else{
      echo "College Not Register Yet";
  }
}


?>

 <div class="container">

      <header>Map Specialization</header>

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
                       <select name="specialization" class="form-select">
                           <?php
                    include ('connection.php');
                    $specialization = mysqli_query($conn, "SELECT specialization_id, specialization_name FROM tbl_specialization WHERE college_id='$college_id'");
                    while($p = mysqli_fetch_array($specialization)) {  
                    ?>
                    <option value="<?php echo $p['specialization_id']?>" ><?php echo $p['specialization_name']?></option>
                    <?php } ?>
                </select>
          </div>
          
           <div class="input-box">
              <label>Semester</label> 
               <select  class="form-select"  name="semester" id="show3"></select>
       </div>
          <div class="input-box">
              <label>Years</label>  
                       <select  class="form-select"  name="year" id="show2"></select>
          </div>
          
         
 
        <div class="input-box">
            <input type="submit" name= "add" value="Map">
            </div>

    </div>

      </form>

    </div>

    </div>

</section>
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
 <link rel="stylesheet" href="addprogram.css" />

  </body>

</html>
