<?php
include_once 'adminheader.php';
?>
<?php
include 'connection.php';
$objarray = array();
$objarray1 = array();
if (isset($_POST['submit'])) {
    $fullname = $_POST['firstname'];
    $email = $_POST['email_id'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];
    $username1= $_POST['username1'];


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
        
  $check= mysqli_num_rows($result1);
  if($check == 1){
    //echo "Let's add Student=".$tcollege_id;
    $college_id=$tcollege_id;
    $query= "SELECT * FROM tbl_user WHERE username = '$username1'";
        $output = mysqli_query($conn, $query);
        $final=mysqli_num_rows($output);
        if($final == 0){
   $sql = "INSERT INTO `tbl_user`(`users_id`, `role_id`, `college_id`, `fullname`, `username`, `email_id`, `phone_no`, `password`, `profile_photo`, `gender`, `age`, `address`, `dor`, `status`) VALUES (NULL,'2','$college_id','$fullname','$username1','$email','$phone_no',MD5('$password'),'','','','',CURRENT_TIMESTAMP(),'0')";
   
     $result2=mysqli_query($conn,$sql);
    if($result2){
          echo "New Faculty Added successfully.";
     }else{
         echo "failed";
     }
        }else{
            echo "Username is Alerady Taken.";
        }
    
  }else{

   echo "College Not Register Yet";

    }
   
}



?>

        <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post">
                                <p class="text-xl text-gray-800 font-medium pb-4">Add Faculty</p>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Faculty Name: </label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="firstname" name="firstname" type="text" required="" placeholder="Faculty Full Name" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Faculty Username: </label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="username1" name="username1" type="text" required="" placeholder="Faculty Username" aria-label="Name">
                                </div>
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Faculty Phone_no: </label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="phone_no" name="phone_no" type="text" required="" placeholder="Faculty Phone No" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Faculty Email_id: </label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="email_id" name="email_id" type="text" required="" placeholder="Faculty Email Id" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Faculty Password: </label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="password" name="password" type="text" required="" placeholder="Faculty Password" aria-label="Name">
                                </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Add Faculty" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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