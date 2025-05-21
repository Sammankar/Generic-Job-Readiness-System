<?php
include_once 'adminheader.php';
?>

<?php
include 'connection.php';
$objarray = array();
$objarray1 = array();
if(isset($_POST['add'])){

$domain_name = $_POST['domain_name'];
$domain_description= $_POST['domain_description'];


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
    //echo "Let's add Domain=".$tcollege_id;
    $college_id=$tcollege_id;
    
    $sql = "INSERT INTO `tbl_domain` (`college_id`, `domain_id`, `domain_name`, `domain_description`,`domain_status` ) VALUES ('$college_id', NULL, '$domain_name', '$domain_description', '0')";

   
    $result2=mysqli_query($conn,$sql);
    if($result2){
        echo "Domain added successfully";
    }else{
        echo "failed";
    }
    
  }else{

   echo "College Not Register Yet";

    }
   
}



?>

    <div class="container">

      <header>Add Domains</header>

     <div class="content">

      <form action="" class="form" method="post" enctype="multipart/form-data">

      <div class="user_details">

        <div class="input-box">

            <label>Domain Name</label>

            <input type="text" id="domain_name" name= "domain_name" placeholder="Enter Program Name" required />

        </div>

        <div class="input-box">

            <label>Domain Description</label>

            <input type="text" id="domain_description" name= "domain_description" placeholder="Enter Domain Description" required />

        </div>
        <div class="input-box">
            <input type="submit" name= "add" value="add">
            </div>

    </div>

      </form>

    </div>

    </div>

</section>

 <link rel="stylesheet" href="adddomain.css" />

  </body>

</html>

