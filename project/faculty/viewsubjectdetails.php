<?php
include  'facultyheader.php';
?>
<?php
include 'connection.php';
$objarray = array();
$objarray1 = array();
$objarray2 = array();
$objarray3 = array();
$objarray4 = array();
$sql0="SELECT * FROM subjects_mapping WHERE sumap_id='" . $_GET['sumap_id'] . "'";
$result0=mysqli_query($conn, $sql0);

     
     
     $sql="SELECT * FROM `subjects_mapping` WHERE sumap_id='" . $_GET['sumap_id'] . "'";
     $result=mysqli_query($conn,$sql);
     if($result)
    {
            while($obj=mysqli_fetch_object($result))
                {
                    array_push($objarray,$obj);
                     
                }
             $college_id= $objarray[0]->college_id;
             
     }
     else
     {
         echo "JHAND";
     }
     //echo "hello=".$college_id;
     
     
     $sql1="SELECT * FROM `subjects_mapping` WHERE sumap_id='" . $_GET['sumap_id'] . "'";
     $result1=mysqli_query($conn,$sql1);
     if($result1)
    {
            while($obj2=mysqli_fetch_object($result1))
                {
                    array_push($objarray2,$obj2);
                     
                }
             $program_id= $objarray2[0]->program_id;
             
     }
     else
     {
         echo "JHAND";
     }
     //echo "hello=".$program_id;
     
     
     $sql2="SELECT * FROM `subjects_mapping` WHERE sumap_id='" . $_GET['sumap_id'] . "'";
     $result2=mysqli_query($conn,$sql2);
     if($result2)
    {
            while($obj3=mysqli_fetch_object($result2))
                {
                    array_push($objarray3,$obj3);
                     
                }
             $specialization_id= $objarray3[0]->specialization_id;
             
     }
     else
     {
         echo "JHAND";
     }
     //echo "hello=".$specialization_id;
     
     
     $sql3="SELECT * FROM `subjects_mapping` WHERE sumap_id='" . $_GET['sumap_id'] . "'";
     $result3=mysqli_query($conn,$sql3);
     if($result3)
    {
            while($obj4=mysqli_fetch_object($result3))
                {
                    array_push($objarray4,$obj4);
                     
                }
             $semester_id= $objarray4[0]->semester_id;
             
     }
     else
     {
         echo "JHAND";
     }
     //echo "hello=".$semester_id;
     
     $sql="SELECT * FROM `subjects_mapping` WHERE sumap_id='" . $_GET['sumap_id'] . "'";
     $result=mysqli_query($conn,$sql);
     if($result)
    {
            while($obj1=mysqli_fetch_object($result))
                {
                    array_push($objarray1,$obj1);
                     
                }
             $year_id= $objarray1[0]->year_id;
             
     }
     else
     {
         echo "JHAND";
     }
     
     
    
?>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-20">
                
                
    
                <div class="flex flex-wrap lg:flex-row overflow-auto">
                    <div class="w-full lg:w-1/4 pr-0 lg:pr-2 rounded-md m-2 lg:m-0 lg:mt-2">
                        <a href="viewstudentslist.php" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>

                                

                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">View Students</p>
                                </div>
                            </div>

                            <div class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-10 lg:mt-14">
                                <p class="font-medium sm:text-lg">View all Students</p>

                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 transition group-hover:translate-x-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                                />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="w-full lg:w-1/4 pr-0 lg:pr-2 rounded-md m-5 lg:m-0 lg:mt-2">
                        <a href="allactiveadmin.php" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>
 
                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">View Study-Material</p>
                                </div>
                            </div>

                            <div class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-10 lg:mt-14">
                                <p class="font-medium sm:text-lg">View Study-Material</p>

                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 transition group-hover:translate-x-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                                />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="w-full lg:w-1/4 pr-0 lg:pr-2 rounded-md m-2 lg:m-0 lg:mt-2">
                        <a href="allinactiveadmin.php" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>
    

                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">View Quiz</p>
                                </div>
                            </div>

                            <div class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-10 lg:mt-14">
                                <p class="font-medium sm:text-lg">View All Quiz</p>

                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 transition group-hover:translate-x-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                                />
                                </svg>
                            </div>
                        </a>
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
