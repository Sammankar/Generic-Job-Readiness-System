<?php
include "facultyheader.php";
if(isset($_POST['submit'])){
$name = $_POST['name'];
$total = $_POST['total'];
$sahi = $_POST['right'];
$wrong = $_POST['wrong'];
$time = $_POST['time'];
$tag = $_POST['tag'];
//$sql2=mysqli_query($conn,"INSERT INTO `tbl_quiz` (`quiz_id`, `college_id`, `program_id`, `specialization_id`, `semester_id`, `subject_id`, `users_id`, `title`, `sahi`, `wrong`, `total`, `time`, `tag`) VALUES (NULL, '$college_id', '$program_id', '$specialization_id', '$semester_id', '$subject_id', '$tusers_id', '$name', '$sahi', '$wrong', '$total', '$time', '$tag')");
// $result2=mysqli_query($conn,$sql2);
   header("location: https://genericworld.co.in/project/faculty/hello.php");
   
// if($result2){
//     //echo "hello=".$result2;
// //header("Location: addquestions.php?title=$name&subject_id=$subject_id&n=$total");
// }else{
//     echo "fail";
// }
}
?>
<?php
include 'connection.php';

$sql= "SELECT tbl_program.program_name,tbl_user.users_id, tbl_user.fullname,tbl_subject.subject_id,tbl_subject.subject_name,tbl_specialization.specialization_name,subjects_mapping.semester_id FROM subjects_mapping,tbl_subject,tbl_program,tbl_specialization,tbl_user WHERE subjects_mapping.program_id=subjects_mapping.program_id AND subjects_mapping.specialization_id=tbl_specialization.specialization_id AND subjects_mapping.subject_id=tbl_subject.subject_id AND subjects_mapping.users_id=tbl_user.users_id AND sumap_id='" . $_GET['sumap_id'] . "'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$objarray = array();
$objarray1 = array();

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
     //echo "hello=".$tusers_id;
     $sumap_id=$_GET['sumap_id'];
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
      echo "JHAND1";
  }

?>

 <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post">
                                <p class="text-xl text-gray-800 font-medium pb-4">Add Quiz</p>
                                                               
                                  <div class="">
                                    <span class="text-sm text-gray-600 w-24">Program Name: </span>
                                    <span class="text-gray-700"><?php echo $row['program_name']; ?></span>
                                    <span class="text-sm text-gray-600 w-24 ml-25">Specialization Name: </span>
                                    <span class="text-gray-700 ml-25"><?php echo $row['specialization_name']; ?></span>
                            
                                </div>
                                <div class="">
                                    <span class="text-sm text-gray-600 w-24">Semester: </span>
                                    <span class="text-gray-700"><?php echo $row['semester_id']; ?></span>
                                    <span class="text-sm text-gray-600 w-24 ml-25">Subject Name:</span>
                                    <span class="text-gray-700 ml-25"><?php echo $row['subject_name']; ?></span>
                            
                            
                                </div>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Topic Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="name" name="name" type="text" required="" placeholder="Enter Topic Name" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Total Question</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="total" name="total" type="text" required="" placeholder="Enter total number of questions" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Total Marks</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="right" name="right" type="text" required="" placeholder="Enter marks on right answer" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Total Marks For Wrong Answers</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="wrong" name="wrong" type="text" required="" placeholder="Enter marks on wrong answer" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Time</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="time" name="time" type="text" required="" placeholder="Enter time limit for test in minute" aria-label="Name">
                                </div>
                                                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Tag To search</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="tag" name="tag" type="text" required="" placeholder="Enter #tag which is used for searching" aria-label="Name">
                                </div>
                                <!--<a href="https://genericworld.co.in/project/faculty/addquestions.php">submit</a>-->
                                <div class="mt-6">
                                    <!--<input type="button" value="Say Hi!" onclick="location='https://genericworld.co.in/project/faculty/addquestions.php'" />-->
                                    <input name="submit" type="submit" value="Add Quiz" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
                                </div>
                            </form>
                        </div>
                    </div>
            </main>
        </div>
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
</html>