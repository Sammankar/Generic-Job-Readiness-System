<?php
include_once 'facultyheader.php';
?>
<?php
include 'connection.php';
$objarray = array();
$objarray1 = array();
$sql= "SELECT tbl_program.program_name, tbl_user.fullname,tbl_subject.subject_name,tbl_specialization.specialization_name,subjects_mapping.semester_id FROM subjects_mapping,tbl_subject,tbl_program,tbl_specialization,tbl_user WHERE subjects_mapping.program_id=subjects_mapping.program_id AND subjects_mapping.specialization_id=tbl_specialization.specialization_id AND subjects_mapping.subject_id=tbl_subject.subject_id AND subjects_mapping.users_id=tbl_user.users_id AND sumap_id='" . $_GET['sumap_id'] . "'";
$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result);


$sumap_id=$_GET['sumap_id'];
if(isset($_POST['submit'])){
$topic_name = $_POST['topic_name'];



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
     
   $sql1 = "SELECT * FROM `subjects_mapping` WHERE `users_id`=$tusers_id AND `sumap_id`=$sumap_id";
        $result1= mysqli_query($conn, $sql1);
  if($result1){
       while($obj1=mysqli_fetch_object($result1))
                {
                    array_push($objarray1,$obj1);
                     
                }
             $college_id= $objarray1[0]->college_id;
             $program_id= $objarray1[0]->program_id;
             $specialization_id= $objarray1[0]->specialization_id;
             $semester_id= $objarray1[0]->semester_id;
             $subject_id= $objarray1[0]->subject_id;
             
  }else{
      echo "JHAND";
  }
    
 //echo "College Not RRRegister=".$username ." USER ID = ".$tusers_id;
$file= $_FILES['file']['name'];
$tmp_name= $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];
   

if($error ==0){
$doc_ex = pathinfo($file, PATHINFO_EXTENSION);
$doc_ex_to_lc = strtolower($doc_ex);
        $allowed_exs = array('pdf','txt');
        $t=time();
        if(in_array($doc_ex_to_lc, $allowed_exs)){
              $new_doc_name = $t.'.'.$doc_ex_to_lc;
              $doc_upload_path = '../images/studymateriald/'.$new_doc_name;
              move_uploaded_file($tmp_name, $doc_upload_path);
        
        $users_id=$tusers_id;
 $sql2="INSERT INTO `tbl_studymaterial`(`studymaterial_id`, `college_id`, `users_id`, `program_id`, `specialization_id`, `semester_id`, `subject_id`, `document_id`, `topic_name`, `file`, `upload_time`) VALUES (NULL,'$college_id','$users_id','$program_id','$specialization_id','$semester_id','$subject_id','1','$topic_name','$new_doc_name',CURRENT_TIMESTAMP)";
 $result2=mysqli_query($conn,$sql2);
if($result2){
   echo "Document Upload Succesfully";
}else{
   echo "Document Failed To Upload";
}
}else{
    echo "Select proper file type";
     }
}else{
  echo "unknown error occured";
}

}
?>
        <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post" enctype="multipart/form-data">
                                <p class="text-xl text-gray-800 font-medium pb-4">Upload Study Material(Document)</p>
                              
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
                                    <label class="block text-sm text-gray-600">Topic</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="topic_name"  name="topic_name" type="text"  required="" placeholder="Enter the Topic of the Study-Material">
                                </div>
                                    <div class="mt-4">
                                    <label class="block text-sm text-gray-600">To Upload Document...</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="file"  name="file" type="file"  required="" placeholder="">
                                </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Upload" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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

