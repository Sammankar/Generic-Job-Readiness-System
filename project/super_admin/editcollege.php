<?php
include 'header.php';
?>
 <div class="container">
    <div class="content">
        <?php
            include 'connection.php';
            $result = mysqli_query($conn,"SELECT * FROM college_registration WHERE college_id='" . $_GET['college_id'] . "'");
            $row= mysqli_fetch_array($result);
            ?>
            
        <?php
            include 'connection.php';
            if(isset($_POST['update'])){
            // $college_name = $_POST['college_name'];
            // $college_address = $_POST['college_address'];
            
            $college_logo= $_FILES['college_logo']['name'];
            $tmp_name= $_FILES['college_logo']['tmp_name'];
            $old_college_logo= $_POST['old_college_logo'];
            
            
            if($college_logo !=''){
                $update_filename= $_FILES['college_logo']['name'];
                $t=time();
                $allowed_exs = array('jpg', 'jpeg', 'png');
                $img_ex = pathinfo($update_filename, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);
                $new_img_name = $t.'.'.$img_ex_to_lc;
                $img_upload_path = '../images/allcollegelogo/'.$new_img_name;
                $old_img_upload_path='../images/allcollegelogo/'.$old_college_logo;
                if(in_array($img_ex_to_lc, $allowed_exs))
                {
                    echo "Select Proper file type, You are allowed only jpg, jpeg, png Image";
                }
                $update_filename=$new_img_name;
            }
            else
            {
                 $update_filename=$old_college_logo;
            }
                $sql="UPDATE college_registration SET college_logo='$update_filename' WHERE college_id='" . $_GET['college_id'] . "'";
                $result1=mysqli_query($conn, $sql);
                if($result1)
                {
                    if($college_logo !='')
                    {
                      move_uploaded_file($tmp_name, $img_upload_path);
                      if(file_exists($old_img_upload_path))
                      {
                          unlink($old_img_upload_path);
                      }
                    }
                     echo "College Logo Updated Succesfully";
                }
                else
                {
                    echo "College Logo Not Updated Succesfully";
                    
                }
            }
            ?>   
        <div class="w-full  border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="">
                            <div class="p-10  bg-white rounded-md shadow-md ">
                            <form class="" method="post" enctype="multipart/form-data">
                                <p class="text-xl text-gray-800 font-medium pb-4">Edit University</p>

                                <div>
                                    <p class="text-md text-gray-600">Current logo</p>
                                    <img src="../images/allcollegelogo/<?php echo $row['college_logo']?>" alt="logo" class="h-28 w-28 mt-2">
                                </div>
                                <div class="mt-4">
                                    <label class="text-sm text-gray-600" for="logo">University logo</label>
                                    <input class="w-full px-2 py-1 text-gray-400 rounded-md cursor-pointer bg-gray-200 focus:outline-none" id="college_logo" name="college_logo" type="file">
                                    <input type="hidden" name="old_college_logo" value="<?php echo $row['college_logo']?>">
                                </div>
                                <div class="mt-6">
                                    <input type="submit" name= "update" value="update" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                </div>
                            </form>
            
                            <form class="" method="post" enctype="multipart/form-data">
                            
                            
                            <?php
                                        include 'connection.php';
                                        $result3 = mysqli_query($conn,"SELECT * FROM college_registration WHERE college_id='" . $_GET['college_id'] . "'");
                                        $row1= mysqli_fetch_array($result3);
                                        ?>
                                        <?php
                                        include 'connection.php';
                                        if(isset($_POST['update_d'])){
                                        $college_name = $_POST['college_name'];
                                        $college_address = $_POST['college_address'];
                                        $sql1 = "UPDATE college_registration SET college_name = '$college_name', college_address = '$college_address' WHERE college_id='" . $_GET['college_id'] . "'";               
                                                      
                                        $result2=mysqli_query($conn,$sql1);
                                        if($result2){
                                           echo "College Details Updated Succesfully";
                                           // header("location: updateprofile.php");
                                        }else{
                                           echo "College Details Not Updated Succesfully";
                                        }
                                       }
                                ?>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="name">Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="college_name" name= "college_name" value="<?php echo $row1['college_name']; ?>" type="text" required="" placeholder="Full name" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class=" block text-sm text-gray-600" for="address">Address</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="college_address" name= "college_address" value="<?php echo $row1['college_address']; ?>" type="text" required="" placeholder="Street" aria-label="Email">
                                </div>
                                <div class="mt-6">
                                    <input type="submit" name= "update_d" value="update" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
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
