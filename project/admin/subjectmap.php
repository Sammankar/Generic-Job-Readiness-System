<?php
include_once 'adminheader.php';
?>
<?php 
//session_start();
include 'connection.php';
include 'fetchusersid.php';
//include 'fetchyears.php';
if(isset($_POST['submit'])){
    
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
 <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post" enctype="multipart/form-data">
                                <p class="text-xl text-gray-800 font-medium pb-4">Subject Map</p>
                                    <div class="mt-4">

                                        <label class="text-sm text-gray-600">Select Program</label>
                                        <select name="program" id="program" class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md form-select">
                                            <option>Select Option</option>
 
                                                <?php 
                                                $program  = mysqli_query($conn, "SELECT program_id, program_name FROM tbl_program WHERE program_status='1' AND college_id='$college_id'");
                                                            while($row = mysqli_fetch_array($program)) {  
                                                            ?>
                                                    <option value="<?php echo $row['program_id'] ?>"><?php echo $row['program_name'] ?></option>
                                                    <?php }  ?>
                                         
                                                </select>
                                        </select>
                                    </div>
                                    <div class="mt-4">

                                        <label class="text-sm text-gray-600">Select Specialization</label>
                                        <select name="specialization" id="show1" class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md form-select">
                                        </select>
                                    </div>
                                    <div class="mt-4">

                                        <label class="text-sm text-gray-600" >Years</label>
                                        <select name="year" id="show2"  class="px-2 py-2 rounded-md form-select w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md form-select">
                                        </select>
        
                                    </div>
                                    <div class="mt-4">

                                        <label class="text-sm text-gray-600">Semesters</label>
                                        <select name="semester" id="show3"  class="px-2 py-2 rounded-md form-select w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md form-select">
                                        </select>
                                    </div>
                                    <div class="mt-4">

                                        <label class="text-sm text-gray-600">Select Subject</label>
                                        <select name="subject" id="subject"   class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md form-select">
                                            <option selected>Select Subject</option>
                                                               <?php
                                        include ('connection.php');
                                        $subject  = mysqli_query($conn, "SELECT subject_id, subject_name FROM tbl_subject WHERE college_id='$college_id'");
                                        while($p = mysqli_fetch_array($subject)) {  
                                        ?>
                                        <option value="<?php echo $p['subject_id']?>" ><?php echo $p['subject_name']?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Specialization Map" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
                                </div>
                            </form>
                        </div>
                    </div>
            </main>
        </div>
    </div>
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
            $('#show2').html(data).chosen();
         }
        });
     });
  });
</script>
<script>
    $('#program').chosen();
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
            $('#show1').html(data).chosen();
         }
        });
     });
  });
</script> 
<script>
    $('#subject').chosen();
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
            $('#show3').html(data).chosen();
         }
        });
     });
  });
</script>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>
