<?php
include "adminheader.php";
?>
<?php
include_once 'connection.php';
include 'fetchusersid.php';
$result = mysqli_query($conn,"SELECT * FROM student_mapping WHERE sm_id='" . $_GET['sm_id'] . "'");
if(mysqli_num_rows($result) > 0){
    $row= mysqli_fetch_array($result);
}else{
    echo "student not found";
}
?>
<?php
include_once 'connection.php';
if(isset($_POST['update'])){
  
    $program=$_POST['program'];
    $specialization=$_POST['specialization'];
    
    
    $sql = " UPDATE `student_mapping` SET  `program_id`= '$program', `specialization_id`='$specialization' WHERE sm_id='" . $_GET['sm_id'] . "'";
    $result1=mysqli_query($conn, $sql);
    if($result){
        echo "Student Map Details Updated Succesfully";
    }else{
        echo "Failed";
    }
    
}
?>

 <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post" enctype="multipart/form-data">
                                <p class="text-xl text-gray-800 font-medium pb-4">Edit Subject Map</p>
                                <div><?php if(isset($message)) { echo $message; } ?>
            </div>
                        <input type="hidden" name="sm_id" class="txtField" value="<?php echo $row['sm_id']; ?>">
                                <div class="mt-4">

                                        <label class="text-sm text-gray-600">Program</label>
                                        <select name="program" id="program"   class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md form-select">
                                             <option selected>Select Program</option>
                                                    <?php
                                                    include ('connection.php');
                                                    $program  = mysqli_query($conn, "SELECT `program_id`, `program_name` FROM `tbl_program` WHERE college_id=$college_id");
                                                    if(mysqli_num_rows($program)> 0) {  
                                                    foreach($program as $p){
                                                    ?>
                                                    <option value="<?php echo $p['program_id']?>" <?= $row['program_id']== $p['program_id']?'selected':''?>  ><?php echo $p['program_name']?></option>
                                                    <?php
                                                    }
                                                        
                                                    }else{
                                                        echo "No Programs are Selected While Mapping";
                                                    }
                                                    ?>
                                                </select>
                                    </div>
                                    <div class="mt-4">

                                        <label class="text-sm text-gray-600">Specialization</label>
                                        <select name="specialization"id="show4" class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md form-select">
                                             <option selected>Select Specialization</option>
                                                    <?php
                                                    include ('connection.php');
                                                    $specialization  = mysqli_query($conn, "SELECT `specialization_id`, `specialization_name` FROM `tbl_specialization` WHERE college_id=$college_id");
                                                    if(mysqli_num_rows($specialization)> 0) {  
                                                    foreach($specialization as $p){
                                                    ?>
                                                    <option value="<?php echo $p['specialization_id']?>" <?= $row['specialization_id']== $p['specialization_id']?'selected':''?>  ><?php echo $p['specialization_name']?></option>
                                                    <?php
                                                    }
                                                        
                                                    }else{
                                                        echo "No Specializations are Selected While Mapping";
                                                    }
                                                    ?>
                                                </select>
                                    </div>
                                <div class="mt-6">
                                    <button type="submit" class="button button1 relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" name="update">Update</button>
                                   
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
    $('#program').chosen();
</script>
<script>
    $('#show4').chosen();
</script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>

