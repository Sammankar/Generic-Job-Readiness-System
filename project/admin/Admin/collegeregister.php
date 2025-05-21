<?php
include_once 'adminheader.php';
?>

<?php
include 'connection.php';
$objarray = array();
if(isset($_POST['submit'])){
$college_name = $_POST['college_name'];
$college_address = $_POST['college_address'];


    $username=   $_SESSION['username'];
   //$tat ="SELECT * FROM `tbl_user` WHERE `username`=$username";
   $tat = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
     $tresult1= mysqli_query($conn, $tat);
     //$tcheck= mysqli_num_rows($tresult1);
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
        $check= mysqli_num_rows($result1);
  if($check > 0){
    echo "College is already Register";
  }else{

 //echo "College Not RRRegister=".$username ." USER ID = ".$tusers_id;
$college_logo= $_FILES['college_logo']['name'];
$tmp_name= $_FILES['college_logo']['tmp_name'];
$error = $_FILES['college_logo']['error'];
   

if($error ==0){
$img_ex = pathinfo($college_logo, PATHINFO_EXTENSION);
$img_ex_to_lc = strtolower($img_ex);
        $allowed_exs = array('jpg', 'jpeg', 'png');
        $t=time();
        if(in_array($img_ex_to_lc, $allowed_exs)){
              $new_img_name = $t.'.'.$img_ex_to_lc;
              $img_upload_path = '../images/allcollegelogo/'.$new_img_name;
              move_uploaded_file($tmp_name, $img_upload_path);
        
        $users_id=$tusers_id;
 $sql="INSERT INTO college_registration(users_id,college_name, college_address, college_logo) VALUES( '$users_id','$college_name','$college_address','$new_img_name')";
 $result=mysqli_query($conn,$sql);
if($result){
   echo "College Register Succesfully";
}else{
   echo "College Not register";
}
}else{
    echo "Select proper file type";
     }
}else{
  echo "unknown error occured";
}
    }
   
}



?>
        <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post">
                                <p class="text-xl text-gray-800 font-medium pb-4">College Register</p>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">College Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="college_name" name="college_name" type="text" required="" placeholder="College name" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">College Address</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="college_address" name="college_address" type="text" required="" placeholder="College Address" aria-label="Name">
                                </div>
                                <div class="inline-block mt-4 w-1/2 pr-1">
                                    <label class="text-sm text-gray-600" for="username">College Logo</label>
                                    <input class="w-full px-2 py-1 text-gray-700 bg-gray-200 rounded-md" id="college_logo" name="college_logo"  type="file" required="" placeholder="photo">
                                </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Register College" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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