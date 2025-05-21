<?php
include 'header.php';
?>
<?php
include_once 'connection.php';
$result = mysqli_query($conn,"SELECT * FROM college_registration WHERE college_id='" . $_GET['college_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="flex-1 bg-white rounded-md shadow-md p-8">
                    <h4 class="text-xl text-gray-700 font-bold">College Information</h4>
                    <ul class="mt-4 text-gray-700">
                        <li class="flex border-y py-4">
                            <span class="font-bold w-24">College name:</span>
                            <span class="text-gray-700"><?php echo $row['college_name']?></span>
                        </li>
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">College Address:</span>
                            <span class="text-gray-700"><?php echo $row['college_address']?></span>
                        </li>
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">College Logo:</span>
                            <span class="text-gray-700"><img src="../images/allcollegelogo/<?php echo $row['college_logo']?>" alt="logo" class="h-28 w-28 mb-10 bg-white rounded-md"></span>
                        </li>
                    </ul>
                </div>
                

    <h1 class="mt-4 text-indigo-500 ml-2 text-2xl"><i class="fa fa-list text-indigo-500 mr-2"></i>Activity</h1>
                <div class="flex flex-wrap lg:flex-row overflow-auto">
                    <div class="w-full lg:w-1/4 pr-0 lg:pr-2 rounded-md m-2 lg:m-0 lg:mt-2">
                        <a href="#" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>
                                <?php
                                require 'connection.php';
                                $query1 = "SELECT users_id FROM tbl_user WHERE role_id=3 AND college_id='" . $_GET['college_id'] . "' ORDER BY users_id"; 
                                //$query = "SELECT users_id FROM tbl_user WHERE role_id=3  AND college_id='$college_id'  ORDER BY users_id"; 
                                $query_run1 = mysqli_query($conn, $query1);
                                $row1 = mysqli_num_rows($query_run1);
                                echo '<h3 class="text-3xl font-bold text-indigo-600 sm:text-5xl">'.$row1.'</h3>';
                                ?>

                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">Total Students</p>
                                </div>
                            </div>

                            <div class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-10 lg:mt-14">
                                <p class="font-medium sm:text-lg">Students</p>

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
                        <a href="#" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>
                                <?php
                                    require 'connection.php';
                                    $query2 = "SELECT users_id FROM tbl_user WHERE role_id=2 AND college_id='" . $_GET['college_id'] . "' ORDER BY users_id"; 
                                    //$query = "SELECT users_id FROM tbl_user WHERE college_id='$college_id' AND role_id=2 ORDER BY users_id";  
                                    $query_run2 = mysqli_query($conn, $query2);
                                    $row2 = mysqli_num_rows($query_run2);
                                    echo '<h3 class="text-3xl font-bold text-indigo-600 sm:text-5xl">'.$row2.'</h3>';
                                ?>

                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">Total faculties</p>
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
                    <div class="w-full lg:w-1/4 pr-0 lg:pr-2 rounded-md m-2 lg:m-0 lg:mt-2">
                        <a href="#" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>
                                 <?php
                                    require 'connection.php';
                                    //$query = "SELECT program_id FROM tbl_program WHERE college_id='$college_id' ORDER BY program_id";
                                    $query3 = "SELECT program_id FROM tbl_program WHERE college_id='" . $_GET['college_id'] . "'ORDER BY program_id";
                                    $query_run3 = mysqli_query($conn, $query3);
                                    $row3 = mysqli_num_rows($query_run3);
                                    echo '<h3 class="text-3xl font-bold text-indigo-600 sm:text-5xl">'.$row3.'</h3>';
                                ?>

                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">Total programs</p>
                                </div>
                            </div>

                            <div class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-10 lg:mt-14">
                                <p class="font-medium sm:text-lg">Programs</p>

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
                        <a href="#" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>
                            <?php
                            require 'connection.php';
                            //$query = "SELECT program_id FROM tbl_program WHERE college_id='$college_id' ORDER BY program_id";
                            $query4 = "SELECT domain_id FROM tbl_domain WHERE college_id='" . $_GET['college_id'] . "' ORDER BY domain_id";
                            $query_run4 = mysqli_query($conn, $query4);
                            $row4 = mysqli_num_rows($query_run4);
                            echo '<hh3 class="text-3xl font-bold text-indigo-600 sm:text-5xl">'.$row4.'</h3>';
                           ?>

                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">domains</p>
                                </div>
                            </div>

                            <div class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-10 lg:mt-14">
                                <p class="font-medium sm:text-lg">Domains</p>

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
                     <h1 class="mt-4 text-indigo-500 ml-2 text-2xl"><i class="fa fa-list text-indigo-500 mr-2"></i>Users List</h1>
                        <table class="w-full leading-normal">
                            <tbody class>
                            <tr class="table-row">
                                <?php
                                    include('collegedash.php');
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
