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
         echo "JHAND";
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
<?php
            include 'connection.php';
            $result = mysqli_query($conn,"SELECT * FROM college_registration WHERE college_id='$college_id'");
            $row= mysqli_fetch_array($result);
?>
<?php
    include 'connection.php';
            if(isset($_POST['submit'])){
            $college_name = $_POST['college_name'];
            $college_address = $_POST['college_address'];
            
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
                     $update_filename=$new_img_name;
                     $sql10="UPDATE college_registration SET  college_name = '$college_name', college_address = '$college_address',college_logo='$update_filename' WHERE college_id='$college_id'";
                        $result10=mysqli_query($conn, $sql10);
                        if($result10)
                        {
                            if($college_logo !='')
                            {
                              move_uploaded_file($tmp_name, $img_upload_path);
                              if(file_exists($old_img_upload_path))
                              {
                                  unlink($old_img_upload_path);
                              }
                            }
                             echo "College Details Updated Succesfully";
                        }
                        else
                        {
                            echo "College Details Not Updated Succesfully";
                            
                        }
                }else{
                     echo "Select Proper file type, You are allowed only jpg, jpeg, png Image";
                }
                
                
            }else{
                 $update_filename=$old_college_logo;
                 $sql12="UPDATE college_registration SET  college_name = '$college_name', college_address = '$college_address',college_logo='$update_filename' WHERE college_id='$college_id'";
                $result12=mysqli_query($conn, $sql12);
                if($result12)
                {
                    if($college_logo !='')
                    {
                      move_uploaded_file($tmp_name, $img_upload_path);
                      if(file_exists($old_img_upload_path))
                      {
                          unlink($old_img_upload_path);
                      }
                    }
                     echo "College Details Updated Succesfully";
                }
                else
                {
                    echo "College Details Not Updated Succesfully";
                    
                }
            }
                
            }
            ?>
        <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post" enctype="multipart/form-data">
                                <p class="text-xl text-gray-800 font-medium pb-4">Update College Registration</p>
                                <div>
                                    <p class="text-md text-gray-600">Current logo</p>
                                    <img src="../images/allcollegelogo/<?php echo $row['college_logo']?>" alt="logo" class="h-28 w-28 mt-2">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="name">College Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="college_name" name="college_name" type="text" required="" placeholder="College name" aria-label="Name" value="<?php echo $row['college_name']; ?>">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">College Address</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="college_address" name="college_address" type="text" required="" placeholder="College Address" aria-label="Name" value="<?php echo $row['college_address']; ?>">
                                </div>
                                <div class="inline-block mt-4 w-1/2 pr-1">
                                    <label class="text-sm text-gray-600" for="username">College Logo</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="college_logo" name="college_logo"  type="file" placeholder="photo">
                                    <input type="hidden" name="old_college_logo" value="<?php echo $row['college_logo']?>">
                                </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Update College" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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