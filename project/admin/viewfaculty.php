<?php

include_once 'adminheader.php';

?>
<?php
include 'connection.php';
$objarray = array();
$objarray1 = array();
                        
 $username=   $_SESSION['username'];
                       
$tat = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
$tresult1= mysqli_query($conn, $tat);
                      
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
            echo "JHAND1";
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
    $college_id=$tcollege_id;
?>

    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                
                
    
                <div class="flex flex-wrap lg:flex-row overflow-auto">
                    <div class="w-full lg:w-1/4 pr-0 lg:pr-2 rounded-md m-2 lg:m-0 lg:mt-2">
                        <a href="#" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>
                                <?php

                        require 'connection.php';

                        $query = "SELECT users_id FROM tbl_user WHERE role_id=2 AND college_id='$college_id'ORDER BY users_id";  

                        $query_run = mysqli_query($conn, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h3 class="text-3xl font-bold text-indigo-600 sm:text-5xl">'.$row.'</h3>';

                    ?>

                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">Total Faculties</p>
                                </div>
                            </div>

                            <div class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-10 lg:mt-14">
                                <p class="font-medium sm:text-lg">Faculties</p>

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
                </div>
                <div class="bg-white overflow-auto mt-4 mr-2 ml-2 lg:ml-0">
                    
                 <h1 class="mt-4 text-indigo-500 ml-2 text-2xl"><i class="fa fa-list text-indigo-500 mr-2"></i>Faculty List</h1>
                 <div class="mt-6 text-align-right ">
                    <button onclick="window.location.href = 'addfaculty.php';" class="text-align-right cursor display-inline-block cursor-pointer relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                		<b>+ ADD FACULTY</b>
                	</button> 
                  </div>
                    <table class="w-full leading-normal">
                            <tbody class>
                                <tr class="table-row">
                                    <?php
                                        include('facultydash.php');
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
