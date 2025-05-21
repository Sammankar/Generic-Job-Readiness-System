<?php
include "adminheader.php";
?>
<?php
include_once 'connection.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE tbl_user set users_id='" . $_POST['users_id'] . "', fullname='" . $_POST['fullname'] . "', username='" . 
$_POST['username'] . "', email_id='" . $_POST['email_id'] . "' ,phone_no='" . $_POST['phone_no'] . "',status='" . $_POST['status'] . "' WHERE users_id='" . $_POST['users_id'] . "'");
header("location:viewstudent.php");
}
$result = mysqli_query($conn,"SELECT * FROM tbl_user WHERE users_id='" . $_GET['users_id'] . "'");
$row= mysqli_fetch_array($result);
?>


<div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post">
                                
                                <p class="text-xl text-gray-800 font-medium pb-4">Edit Students</p>
                                <div><?php if(isset($message)) { echo $message; } ?>
            </div>
                                <input type="hidden" name="users_id" class="txtField" value="<?php echo
                        $row['users_id']; ?>">
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Full Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="fullname" name="fullname" type="text" required="" placeholder="Full Name" value="<?php echo $row['fullname'];?>" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Username</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="username" name="username" type="text" required="" placeholder="Username" value="<?php echo $row['username'];?>" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Email Id</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="email_id"  name="email_id" type="text" required="" placeholder="Email Id" value="<?php echo $row['email_id'];?>" aria-label="Name">
                                </div>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Phone No</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="phone_no" name="phone_no" type="text" required="" placeholder="Phone No" value="<?php echo $row['phone_no'];?>" aria-label="Name">
                                </div>
                                <div class="mt-6">
                                    <button class="button button1 relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                                    
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