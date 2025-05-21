<?php
include_once 'adminheader.php';
?>

<?php
include 'connection.php';
$sql= "SELECT tbl_program.program_name, tbl_user.fullname,tbl_subject.subject_name,tbl_specialization.specialization_name,subjects_mapping.semester_id FROM subjects_mapping,tbl_subject,tbl_program,tbl_specialization,tbl_user WHERE subjects_mapping.program_id=subjects_mapping.program_id AND subjects_mapping.specialization_id=tbl_specialization.specialization_id AND subjects_mapping.subject_id=tbl_subject.subject_id AND subjects_mapping.users_id=tbl_user.users_id AND sumap_id='" . $_GET['sumap_id'] . "'";
$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result);

if(isset($_POST['submit'])){
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
<div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post" enctype="multipart/form-data">
                                <p class="text-xl text-gray-800 font-medium pb-4">Faculty Assign</p>
                                <div class="mt-4">
                               
                               
                                    <span class="text-sm text-gray-600 w-24">Program Name: </span>
                                    <span class="text-gray-700"><?php echo $row['program_name']; ?></span>
                            
                            
                                </div>
                                <div class="mt-4">
                               
                               
                                    <span class="text-sm text-gray-600 w-24">Specialization Name: </span>
                                    <span class="text-gray-700"><?php echo $row['specialization_name']; ?></span>
                            
                            
                                </div>
                                <div class="mt-4">
                               
                               
                                    <span class="text-sm text-gray-600 w-24">Semester: </span>
                                    <span class="text-gray-700"><?php echo $row['semester_id']; ?></span>
                            
                            
                                </div>
                                <div class="mt-4">
                               
                               
                                    <span class="text-sm text-gray-600 w-24">Subject Name:</span>
                                    <span class="text-gray-700"><?php echo $row['subject_name']; ?></span>
                            
                            
                                </div>
                                <div class="mt-4">
                               
                               
                                    <span class="text-sm text-gray-600 w-24">Assigned Faculty: </span>
                                    <span class="text-gray-700"><?php echo $row['fullname']; ?></span>
                            
                            
                                </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Remove Assign" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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
    $('#faculty').chosen();
</script>


    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>














