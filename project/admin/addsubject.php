<?php
include_once 'adminheader.php';
?>

<?php
include 'connection.php';
$objarray1= array();
$objarray = array();
if(isset($_POST['submit'])){
$subject_name = $_POST['subject_name'];
$subject_code = $_POST['subject_code'];
$subject_description = $_POST['subject_description'];
$subject_credits=$_POST['subject_credits'];


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
     
   $sql1 = "SELECT * FROM `college_registration` WHERE `users_id`=$tusers_id";
        $result1= mysqli_query($conn, $sql1);
        
            if($result1)
            {
            while($obj1=mysqli_fetch_object($result1))
                {
                    array_push($objarray1,$obj1);
                     
                }
             $tcollege_id= $objarray1[0]->college_id;
             
             }
             else
             {
                 echo "JHAND";
             }
        
              $check= mysqli_num_rows($result1);
              if($check == 1){
               // echo "Let's add Subjects=".$tcollege_id;
                $college_id=$tcollege_id;
                
                
                $sql = "INSERT INTO `tbl_subject` (`college_id`, `subject_id`,`subject_name` , `subject_code`, `subject_description`, `subject_credits`) VALUES ('$college_id', NULL, '$subject_name' ,'$subject_code', '$subject_description','$subject_credits')";
                
               // $sql = "INSERT INTO `tbl_specilization` (`college_id`, `specilization_id`, `specilization_name`, `specilization_description`, `specilization_credits`) VALUES ('$college_id', NULL, '$specilization_name', '$specilization_description','$specilization_credits')";
                   $result2=mysqli_query($conn,$sql);
                if($result2){
                    echo "Subject added successfully";
                 }else{
                    echo "failed";
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
                            <form class="p-10 bg-white rounded-md shadow-md" method="post">
                                <p class="text-xl text-gray-800 font-medium pb-4">Add Subjects</p>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Subject Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="subject_name" name="subject_name" type="text" required="" placeholder="Subject Name" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Subject Code</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="subject_code" name="subject_code" type="text" required="" placeholder="Subject Descriptions" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Subject Descriptions</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="subject_description" name="subject_description" type="text" required="" placeholder="Subject Descriptions" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Subject Credits</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="subject_credits" name="subject_credits" type="text" required="" placeholder="Subject Credits" aria-label="Name">
                                </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Add Subject" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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