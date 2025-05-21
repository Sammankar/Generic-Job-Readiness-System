<?php
include 'facultyheader.php';
?>
<?php
    include_once 'connection.php';
    $username=$_SESSION['username'];
    //$users_id=$_SESSION['users_id'];
    $sql = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
    $result= mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
?> 
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
            <div class="h-full bg-indigo-50 p-8">
        <div class="bg-white rounded-md shadow-md pb-8">
            <div class="w-full h-48 bg-indigo-100 rounded-t-md">
                
            </div>
            <div class="flex flex-col items-center -mt-14">
                <img src="../images/allprofilephoto/<?php echo $row['profile_photo']; ?>" class="h-28 w-28 rounded-full border" alt="edit" width="15px" height="auto">
                <div class="flex items-center space-x-2 mt-2">
                    <p class="text-xl text-gray-700"><?php echo $row['username']; ?></p>
                </div>
            </div>
            <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
                <div class="flex items-center space-x-4 mt-2">
                    <a href="updateprofile.php">
                        <button class="flex items-center bg-indigo-600 hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-200">
                            <img src="{{ url('/icons/edit.png') }}" alt="edit" width="15px" height="auto">
                            <span> Edit Profile </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col">
                <div class="flex-1 bg-white rounded-md shadow-md p-8">
                    <h4 class="text-xl text-gray-700 font-bold">Personal Info</h4>
                    <ul class="mt-4 text-gray-700">
                        <li class="flex border-y py-4">
                            <span class="font-bold w-24">Full name:</span>
                            <span class="text-gray-700"><?php echo $row['fullname']; ?></span>
                        </li>
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">Username</span>
                            <span class="text-gray-700"><?php echo $row['username']; ?></span>
                        </li>
                        
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">Mobile:</span>
                            <span class="text-gray-700"><?php echo $row['phone_no']; ?></span>
                        </li>
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">Email:</span>
                            <span class="text-gray-700"><?php echo $row['email_id']; ?></span>
                        </li>
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">Gender:</span>
                            <span class="text-gray-700"><?php echo $row['gender']; ?></span>
                        </li>
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">Age:</span>
                            <span class="text-gray-700"><?php echo $row['age']; ?></span>
                        </li>
                        <li class="flex border-b py-4">
                            <span class="font-bold w-24">Address:</span>
                            <span class="text-gray-700"><?php echo $row['address']; ?></span>
                        </li>
                    </ul>
                </div>
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
