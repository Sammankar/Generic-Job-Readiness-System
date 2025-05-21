<?php
include 'header.php';
?>
<?php
    include 'connection.php';
            if(isset($_POST['update'])){
                $fullname = $_POST['fullname'];
                $username=$_SESSION['username'];
                $email_id = $_POST['email_id'];
                $phone_no = $_POST['phone_no'];
                $password = $_POST['password'];
                $gender = $_POST['gender'];
                $age = $_POST['age'];
                $address = $_POST['address'];
            
            $profile_photo= $_FILES['profile_photo']['name'];
            $tmp_name= $_FILES['profile_photo']['tmp_name'];
            $old_profile_photo= $_POST['old_profile_photo'];
            
            
            if($profile_photo !=''){
                $update_filename= $_FILES['profile_photo']['name'];
                $t=time();
                $allowed_exs = array('jpg', 'jpeg', 'png');
                $img_ex = pathinfo($update_filename, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);
                $new_img_name = $t.'.'.$img_ex_to_lc;
                $img_upload_path = '../images/allprofilephoto/'.$new_img_name;
                $old_img_upload_path='../images/allprofilephoto/'.$old_profile_photo;
                if(in_array($img_ex_to_lc, $allowed_exs))
                {
                     $update_filename=$new_img_name;
                     $sql="UPDATE tbl_user SET fullname = '$fullname', username = '$username', email_id='$email_id', phone_no='$phone_no', profile_photo='$update_filename',gender='$gender', age='$age',address='$address' WHERE username= '$username'";
                        $result1=mysqli_query($conn, $sql);
                        if($result1)
                        {
                            if($profile_photo !='')
                            {
                              move_uploaded_file($tmp_name, $img_upload_path);
                              if(file_exists($old_img_upload_path))
                              {
                                  unlink($old_img_upload_path);
                              }
                            }
                             echo "Profile Updated Succesfully";
                        }
                        else
                        {
                            echo "Profile Not Updated Succesfully";
                            
                        }
                }else{
                     echo "Select Proper file type, You are allowed only jpg, jpeg, png Image";
                }
                
                
            }else{
                 $update_filename=$old_profile_photo;
                 $sql="UPDATE tbl_user SET fullname = '$fullname', username = '$username', email_id='$email_id', phone_no='$phone_no', profile_photo='$update_filename',gender='$gender', age='$age',address='$address' WHERE username= '$username'";
                $result1=mysqli_query($conn, $sql);
                if($result1)
                {
                    if($profile_photo !='')
                    {
                      move_uploaded_file($tmp_name, $img_upload_path);
                      if(file_exists($old_img_upload_path))
                      {
                          unlink($old_img_upload_path);
                      }
                    }
                     echo "Profile Updated Succesfully";
                }
                else
                {
                    echo "Profile Not Updated Succesfully";
                    
                }
            }
                
            }
            ?>
        <div class="w-full overflow-x-hidden border-t flex flex-col">
                <?php
    include_once 'connection.php';
    $username=$_SESSION['username'];
    //$users_id=$_SESSION['users_id'];
    $sql = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
    $result= mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    ?>
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
                        
                              
                    </div>

                    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
                        <div class="w-full flex flex-col">
                            <div class="flex-1 bg-white rounded-md shadow-md p-8">
                                <form action="" method="POST" enctype="multipart/form-data">
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class="text-sm text-gray-600" for="name">Name</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="name" name="name" type="text"  placeholder="Name" value="<?php echo $row['fullname']; ?>">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class="text-sm text-gray-600" for="username">Username</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="username"  name="username" type="text"  placeholder="Username" value="<?php echo $row['username']; ?>">
                                </div>
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class="text-sm text-gray-600" for="phone">Phone</Pabel>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="phone" Pame="phone" Pype="tel"  placeholder="Phone" value="<?php echo $row['phone_no']; ?>">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class="text-sm text-gray-600" for="email">Email</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="email"  name="email" type="email"  placeholder="Email" value="<?php echo $row['email_id']; ?>">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class="text-sm text-gray-600" for="username">Gender</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="gender"  name="gender" type="text"  placeholder="gender" value="<?php echo $row['gender']; ?>">
                                </div>
                                 <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class="text-sm text-gray-600" for="username">Age</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="age"  name="age" type="text"  placeholder="age" value="<?php echo $row['age']; ?>">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class="text-sm text-gray-600" for="username">Address</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="address"  name="address" type="text"  placeholder="address" value="<?php echo $row['address']; ?>">
                                </div>
                                 <div class="w-80">
                            <label class="text-sm text-gray-600" for="email">To Update Photo...</label>
                                    <input class="w-full px-1 py-1 text-gray-700 bg-gray-200 rounded-md" id="profile_photo"  name="profile_photo" type="file" placeholder="profile_photo">
                                    <input type="hidden" name="old_profile_photo" value="<?php echo $row['profile_photo']?>">
                                    </div>
                        <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
                            <div class="flex items-center space-x-4 mt-2">
                                <button type="submit" name="update" class="flex items-center bg-indigo-600 hover:bg-indigo-500 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-200">
                                    <span> UPDATE PROFILE </span>
                                </button>
                            </div>
                        </div>
                                </form>
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
