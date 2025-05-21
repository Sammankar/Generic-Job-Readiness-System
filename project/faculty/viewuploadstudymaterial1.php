<?php
include "facultyheader.php";
?>
<?php
include 'connection.php';
$objarray = array();
$sql= "SELECT `studymaterial_id`, tbl_studymaterial.college_id, tbl_user.users_id, tbl_program.program_name, tbl_specialization.specialization_name, tbl_studymaterial.semester_id, tbl_subject.subject_name,tbl_subject.subject_code ,tbl_subject.subject_credits,tbl_document.type, `topic_name`, `file`, `upload_time` FROM tbl_studymaterial,tbl_program,tbl_document,tbl_specialization,tbl_subject,tbl_user WHERE tbl_studymaterial.program_id=tbl_program.program_id AND tbl_studymaterial.document_id=tbl_document.document_id AND tbl_studymaterial.specialization_id=tbl_specialization.specialization_id AND tbl_studymaterial.subject_id=tbl_subject.subject_id AND tbl_studymaterial.users_id=tbl_user.users_id AND studymaterial_id='" . $_GET['studymaterial_id'] . "'";
$result=mysqli_query($conn,$sql);
    if($result)
    {
            while($obj=mysqli_fetch_object($result))
                {
                    array_push($objarray,$obj);
                     
                }
             $users_id= $objarray[0]->users_id;
             $pdf= $objarray[0]->file;
              //echo "Hello=".$users_id;
     }
     else
     {
         echo "JHAND";
     }
$sql1= "SELECT `studymaterial_id`, tbl_studymaterial.college_id, tbl_user.users_id, tbl_program.program_name, tbl_specialization.specialization_name, tbl_studymaterial.semester_id, tbl_subject.subject_name,tbl_subject.subject_code ,tbl_subject.subject_credits,tbl_document.type, `topic_name`, `file`, `upload_time` FROM tbl_studymaterial,tbl_program,tbl_document,tbl_specialization,tbl_subject,tbl_user WHERE tbl_studymaterial.program_id=tbl_program.program_id AND tbl_studymaterial.document_id=tbl_document.document_id AND tbl_studymaterial.specialization_id=tbl_specialization.specialization_id AND tbl_studymaterial.subject_id=tbl_subject.subject_id AND tbl_studymaterial.users_id=tbl_user.users_id AND studymaterial_id='" . $_GET['studymaterial_id'] . "'";
$result1=mysqli_query($conn,$sql1);
$row1= mysqli_fetch_array($result1);
?>
        <div class="w-full overflow-x-hidden border-t flex flex-col">

            
            
          
                <form class="p-10 bg-white rounded-md shadow-md" method="" enctype="multipart/form-data">


                <div class="video ml-8 mt-5">
                    <iframe src="../images/studymateriald/<?php echo $pdf; ?>" width="100%" height="1185px">
                    </iframe>
                </div>
            </form>
        
            
            
  
        </div>
            </script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>