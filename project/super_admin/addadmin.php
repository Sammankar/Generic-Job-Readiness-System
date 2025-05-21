<?php
include "header.php";
?>
<?php include "connection.php";  
if (isset($_POST['submit'])) {    
$fullname = $_POST['fullname'];    
$username = $_POST['username'];    
$email = $_POST['email_id'];    
$phone_no = $_POST['phone_no'];    
$password = $_POST['password'];
$sql = "INSERT INTO `tbl_user`(`users_id`, `role_id`, `college_id`, `fullname`, `username`, `email_id`, `phone_no`, `password`, `profile_photo`, `gender`, `age`, `address`, `dor`, `status`) VALUES (NULL,'1','0','$fullname','$username','$email','$phone_no',MD5('$password'),'','','','',CURRENT_TIMESTAMP(),'0')";
//$sql = "INSERT INTO `tbl_user` (`users_id`, `role_id`, `college_id`, `fullname`, `username`, `email_id`, `phone_no`, `password`, `profile_photo`, `gender`, `age`, `address`, `dor`, `status`) VALUES (NULL, '1', '', '$fullname', '$username', '$email', '$phone_no', MD5('$password'), '', '', '', '', current_timestamp(), '0')";    
$result = $conn->query($sql);    
if ($result == TRUE) {      
//header("location: dashboard.php");      
echo "New Admin Added successfully.";    
}else{      
echo "Error:". $sql . "<br>". $conn->error;   
}     
$conn->close();   
}
?> 
        <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post">
                                <p class="text-xl text-gray-800 font-medium pb-4">Add Admin</p>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">FullName</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="fullname" name="fullname" type="text" required="" placeholder="Full name" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Username</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="username" name="username" type="text" required="" placeholder="Username" aria-label="Name">
                                </div>
                                <div class="inline-block mt-4 w-1/2 pr-1">
                                    <label class="text-sm text-gray-600" for="username">Email</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="email_id" name="email_id"  type="email" required="" placeholder="Email_id">
                                </div>
                                <div class="inline-block mt-4 -mx-1 pl-1 w-1/2">
                                    <label class="text-sm text-gray-600" for="phone">Phone</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="phone_no" name="phone_no" type="tel" required="" placeholder="Phone">
                                </div>

                                <div class="inline-block mt-4 w-1/2 pr-1">
                                    <label class="text-sm text-gray-600" for="password1">Password</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="password" name="password" type="password" required="" placeholder="Password">
                                </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Add Admin" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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