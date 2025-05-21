<?php
include_once 'adminheader.php';
?>

<?php
include 'connection.php';
$objarray = array();
$objarray1 = array();
if(isset($_POST['submit'])){

$program_name = $_POST['program_name'];
$program_description = $_POST['program_description'];
$year = $_POST['year'];
$semester= $_POST['semester'];


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
    //echo "Let's add Programs=".$tcollege_id;
    $college_id=$tcollege_id;
    
    $sql = "INSERT INTO `tbl_program` (`college_id`, `program_id`, `program_name`, `program_description`, `year_id`, `semester_id`, `program_status`) VALUES ('$college_id', NULL, '$program_name', '$program_description', '$year', '$semester', '1')";
    
   // $sql = "INSERT INTO `tbl_program` (`college_id`, `program_name`, `program_description`, `program_duration`, `program_totalcredits`, 'no_of_semesters') VALUES ('$college_id','$program_name','$program_description','$program_duration','$program_totalcredits', '$no_of_semesters')";
   
    $result2=mysqli_query($conn,$sql);
    if($result2){
        echo "program added successfully";
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
                                <p class="text-xl text-gray-800 font-medium pb-4">Add Program</p>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Program Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="program_name" name="program_name" type="text" required="" placeholder="Program Name" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Program Descriptions</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="program_description" name="program_description" type="text" required="" placeholder="Program Name" aria-label="Name">
                                </div>
                                <div class="mt-4">

                                        <label class="text-sm text-gray-600" for="email">Program Durations: In Years</label>
                                        <select name="year" data-te-select-init class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md">
                                            <option selected>Select Years</option>
                                            <?php
                                                include ('connection.php');
                                                $year  = mysqli_query($conn, "SELECT `year_id`, `years` FROM `years`");
                                                while($p = mysqli_fetch_array($year)) {  
                                                ?>
                                                <option value="<?php echo $p['year_id']?>" ><?php echo $p['years']?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mt-4">

                                        <label class="text-sm text-gray-600" for="email">Semesters</label>
                                        <select name="semester" data-te-select-init class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md">
                                            <option selected>Select Semesters</option>
                                            <?php
                                                    include ('connection.php');
                                                    $semester  = mysqli_query($conn, "SELECT `semester_id`, `semesters` FROM `tbl_semester`");
                                                    while($p = mysqli_fetch_array($semester)) {  
                                                    ?>
                                                    <option value="<?php echo $p['semester_id']?>" ><?php echo $p['semesters']?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Add Program" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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