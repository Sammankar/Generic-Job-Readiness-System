<?php
include "adminheader.php";
?>
<?php
include_once 'connection.php';
include_once 'fetchusersid.php';
$result = mysqli_query($conn,"SELECT * FROM `subjects_mapping` WHERE sumap_id='" . $_GET['sumap_id'] . "'");
if(mysqli_num_rows($result) > 0){
    $row= mysqli_fetch_array($result);
}else{
    echo "specialization map not found";
}
?>
<?php
include_once 'connection.php';
if(isset($_POST['update'])){
    
    $semester=$_POST['semester'];
    $subject=$_POST['subject'];

    
    $sql = "UPDATE `subjects_mapping` SET `semester_id`='$semester',`subject_id`='$subject'  WHERE sumap_id='" . $_GET['sumap_id'] . "'";
    $result1=mysqli_query($conn, $sql);
    if($result){
        echo "Subject Map Details are Update Succesfully";
        $sql2="UPDATE tbl_subject SET subject_status='1' WHERE subject_id='$subject'";
                        $check1=mysqli_query($conn,$sql2);
                        if($check1){
                            //echo "subject status changed in tbl_subject";
                        }else{
                            //echo "Subject status not changed in tbl_subject";
                        }
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
                        <input type="hidden" name="sumap_id" class="txtField" value="<?php echo $row['sumap_id']; ?>">
                                <div class="mt-4">

                                        <label class="text-sm text-gray-600">Semester</label>
                                        <select name="semester" id="semester"   class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md form-select">
                                             <?php
                    include ('connection.php');
                    $semester = mysqli_query($conn, "SELECT semester_id, semesters FROM tbl_semester");
                    if(mysqli_num_rows($semester)> 0) {  
                    foreach($semester as $p){
                    ?>
                    <option value="<?php echo $p['semester_id']?>" <?= $row['semester_id']== $p['semester_id']?'selected':''?>  ><?php echo $p['semesters']?></option>
                    <?php
                    }
                        
                    }else{
                        echo "No Semesters are Selected While Mapping Specialization";
                    }
                    ?>
                                        </select>
                                    </div>
                                    <div class="mt-4">

                                        <label class="text-sm text-gray-600">Subject</label>
                                        <select name="subject"id="show4" class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md form-select">
                                            <?php
                    include ('connection.php');
                    $subject = mysqli_query($conn, "SELECT subject_id, subject_name FROM tbl_subject WHERE college_id='$college_id'");
                    if(mysqli_num_rows($subject)> 0) {  
                    foreach($subject as $p){
                    ?>
                    <option value="<?php echo $p['subject_id']?>" <?= $row['subject_id']== $p['subject_id']?'selected':''?>  ><?php echo $p['subject_name']?></option>
                    <?php
                    }
                        
                    }else{
                        echo "No Subjects are Selected While Mapping Specialization";
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
    $('#show4').chosen();
</script>
<script>
    $('#semester').chosen();
</script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>














