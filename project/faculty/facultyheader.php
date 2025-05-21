<?php 
session_start();
if($_SESSION['username']==""){
    
	header('location:index.php');
}

?>
<?php
include_once 'connection.php';
$objarray = array();
$username=$_SESSION['username'];



    //echo "hello=".$username;
    
    $sql = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
    $result= mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    
    $sql1 = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
    $result1= mysqli_query($conn,$sql1);
    if($result)
    {
            while($obj=mysqli_fetch_object($result1))
                {
                    array_push($objarray,$obj);
                     
                }
             $college_id= $objarray[0]->college_id;
              //echo "Hello=".$college_id;
     }
     else
     {
         echo "JHAND";
     }
     
      $sql2 = "SELECT * FROM `college_registration` WHERE `college_id`='$college_id'";
      $result2= mysqli_query($conn, $sql2);
      $row1=mysqli_fetch_array($result2);
    
    
    // if($row){
    //     echo "success";
    // }else{
    //     echo "fail";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap');
    </style>
</head>
<body class="bg-gray-100 flex">

    <aside class="relative h-screen w-72 hidden sm:block bg-gray-50 shadow-lg">
        <div class="p-6 flex">
            <img src="../images/allcollegelogo/<?php echo $row1['college_logo']; ?>" height="50px" width="50px">
            <a href="facultydashboard.php" class="font-semibold text-3xl text-indigo-500 tracking-wide px-3 py-2"><?php echo $row1['college_name']; ?></a>
        </div>
        <nav class="text-white font-semibold pt-3 p-4">
            <!--<a href="facultydashboard.php" class="flex items-center text-gray-700  mt-4 py-2 px-5 bg-indigo-100 rounded-md hover:shadow-md transition duration-200">-->
            <!--    <i class="fas fa-tachometer-alt mr-3"></i>-->
            <!--    DASHBOARD-->
            <!--</a>-->
            <a href="viewsubjects.php" class="flex items-center text-gray-700  mt-4 py-2 px-5 hover:bg-indigo-100 rounded-md hover:shadow-md transition duration-200">
                <i class="fa fa-user mr-3"></i>
                SUBJECTS
            </a>
            <!--<a href="viewstudymaterial.php" class="flex items-center text-gray-700  mt-4 py-2 px-5 hover:bg-indigo-100 rounded-md hover:shadow-md transition duration-200">-->
            <!--    <i class="fa fa-university mr-3"></i>-->
            <!--    STUDY MATERIAL-->
            <!--</a>-->
            <!--<a href="viewquiz.php" class="flex items-center text-gray-700  mt-4 py-2 px-5 hover:bg-indigo-100 rounded-md hover:shadow-md transition duration-200">-->
            <!--    <i class="fa fa-bell mr-3"></i>-->
            <!--    UPLOAD QUIZ-->
            <!--</a>-->
            <a href="allreports.php" class="flex items-center text-gray-700  mt-4 py-2 px-5 hover:bg-indigo-100 rounded-md hover:shadow-md transition duration-200">
                <i class="fa fa-bell mr-3"></i>
                REPORTS
            </a>
            <!--<a href="ranking.php" class="flex items-center text-gray-700  mt-4 py-2 px-5 hover:bg-indigo-100 rounded-md hover:shadow-md transition duration-200">-->
            <!--    <i class="fa fa-bell mr-3"></i>-->
            <!--    RANK-->
            <!--</a>-->
            <a href="markattendance.php" class="flex items-center text-gray-700  mt-4 py-2 px-5 hover:bg-indigo-100 rounded-md hover:shadow-md transition duration-200">
                <i class="fa fa-bell mr-3"></i>
                Mark Attendence
            </a>
                <a href="logout.php" class="flex items-center text-gray-700  mt-4 py-2 px-5 hover:bg-indigo-100 rounded-md hover:shadow-md transition duration-200">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Log Out
            </a>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>

            
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end gap-4">

                <!-- notification bell start -->
                <div>
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white w-10 h-10 p-3 focus:outline-none">
                            <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                            </svg>
                        </button>
    
                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
    
                        <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
                            <div class="py-2">
                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Sara Salah</span> replied on the <span class="font-bold text-indigo-500" href="#">Upload Image</span> artical . 2m
                                    </p>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Slick Net</span> start following you . 45m
                                    </p>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span class="font-bold text-indigo-500" href="#">Test with TDD</span> artical . 1h
                                    </p>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=398&q=80" alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h
                                    </p>
                                </a>
                            </div>
                            <a href="#" class="block bg-indigo-600 text-white text-center font-bold py-2">See all notifications</a>
                        </div>
                    </div>
                </div>
                <!-- notification bell end -->

                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="../images/allprofilephoto/<?php echo $row['profile_photo']; ?>">
                </button>
                 <span class="name"><?php echo $_SESSION['username']; ?></span>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="myprofile.php" class="block px-5 py-1 rounded-md hover:shadow-md mx-2 hover:bg-indigo-500 hover:text-white transition duration-200">Profile</a>
                    <a href="logout.php" class="block px-5 py-1 rounded-md hover:shadow-md mx-2 hover:bg-indigo-500 hover:text-white transition duration-200">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full py-5 px-6 sm:hidden bg-indigo-500">
            <div class="flex items-center justify-between">
                <a href="#" class="text-white text-xl font-semibold  tracking-wide px-5 py-2">LOGO</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="dashboard.php" class="flex items-center text-white px-5 py-2 hover:bg-indigo-50 hover:text-indigo-600 rounded-md hover:shadow-md transition duration-200">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    DASHBOARD
                </a>
                <a href="viewsubject.php" class="flex items-center text-white px-5 py-2 hover:bg-indigo-50 hover:text-indigo-600 rounded-md hover:shadow-md transition duration-200">
                    <i class="fa fa-user mr-3"></i>
                    SUBJECTS
                </a>
                <a href="viewstudymaterial.php" class="flex items-center text-white px-5 py-2 hover:bg-indigo-50 hover:text-indigo-600 rounded-md hover:shadow-md transition duration-200">
                    <i class="fa fa-university mr-3"></i>
                    STUDY MATERIAL
                </a>
                <a href="viewuploadquiz.php" class="flex items-center text-white px-5 py-2 hover:bg-indigo-50 hover:text-indigo-600 rounded-md hover:shadow-md transition duration-200">
                    <i class="fa fa-bell mr-3"></i>
                    UPLOAD QUIZ
                </a>
                <a href="allreports.php" class="flex items-center text-white px-5 py-2 hover:bg-indigo-50 hover:text-indigo-600 rounded-md hover:shadow-md transition duration-200">
                    <i class="fa fa-bell mr-3"></i>
                    REPORTS
                </a>
                <a href="ranking.php" class="flex items-center text-white px-5 py-2 hover:bg-indigo-50 hover:text-indigo-600 rounded-md hover:shadow-md transition duration-200">
                    <i class="fa fa-bell mr-3"></i>
                    RANK
                </a>
                <a href="myprofile.php" class="flex items-center text-white px-5 py-2 hover:bg-indigo-50 hover:text-indigo-600 rounded-md hover:shadow-md transition duration-200">
                    <i class="fas fa-user mr-3"></i>
                    Profile
                </a>
                <a href="logout.php" class="flex items-center text-white px-5 py-2 hover:bg-indigo-50 hover:text-indigo-600 rounded-md hover:shadow-md transition duration-200">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>