<?php
include  'studentheader.php';
include 'connection.php';
$objarray = array();
    $username=$_SESSION['username'];
    //$users_id=$_SESSION['users_id'];
    
    $sql1 = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
    $result1= mysqli_query($conn,$sql1);
    if($result1)
    {
            while($obj=mysqli_fetch_object($result1))
                {
                    array_push($objarray,$obj);
                     
                }
             $users_id= $objarray[0]->users_id;
              //echo "Hello=".$users_id;
     }
     else
     {
         echo "JHAND";
     }
     
    $sql2 = "SELECT `sm_id`, tbl_user.users_id, tbl_user.college_id, tbl_program.program_name, tbl_program.program_description , tbl_program.year_id,tbl_specialization.specialization_name, tbl_program.year_id, student_mapping.semester_id, `studentmap_status` FROM student_mapping,tbl_user,tbl_program,tbl_specialization WHERE student_mapping.users_id=tbl_user.users_id AND student_mapping.program_id=tbl_program.program_id AND student_mapping.specialization_id=tbl_specialization.specialization_id AND student_mapping.users_id=$users_id";
    $result2= mysqli_query($conn,$sql2);
    $row1=mysqli_fetch_array($result2);
?>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="flex-1 bg-white rounded-md shadow-md p-8">
                    <h4 class="text-xl text-gray-700 font-bold">Course Information</h4>
                    <ul class="mt-4 text-gray-700">
                        <li class="flex border-y py-4">
                            <span class="font-bold w-24">Program: </span>
                            <span class="text-gray-700"><?php echo $row1['program_name']?></span>
                            <span class="text-gray-700 ml-4"><?php echo htmlentities("(".$row1['program_description'].")")?></span>
                        </li>
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">Specialization: </span>
                            <span class="text-gray-700 ml-6"><?php echo $row1['specialization_name']?></span>
                        </li>
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">Semester: </span>
                            <span class="text-gray-700"><?php echo $row1['semester_id']?></span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white overflow-auto mt-4 mr-2 ml-2 lg:ml-0">

                 <h1 class="mt-4 text-indigo-500 ml-2 text-2xl"><i class="fa fa-list text-indigo-500 mr-2"></i>Study-Material List</h1>
                        <table class="w-full leading-normal">
                            <tbody class>
                            <tr class="table-row">
                                <?php
                                    include('studymaterialdash.php');
                                ?>
                            </tr>
                        </tbody>
                        </table>
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
