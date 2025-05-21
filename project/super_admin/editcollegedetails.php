<?php
include 'header.php';
?>
 <div class="container">
    <header>Edit College Details</header>
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
                    $update_filename=$new_img_name;
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
                    
                }else{
                     echo "Select Proper file type, You are allowed only jpg, jpeg, png Image";
                }
                 
            }
            else
            {
                 $update_filename=$old_college_logo;
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
                
            }
            ?>
        <form action="" class="form" method="post" enctype="multipart/form-data">
        <div class="user_details">
            <div class="input-box">
                <label>College Logo</label>
            <div class="img-circle text-center mb-3">
                        <img src="../images/allcollegelogo/<?php echo $row['college_logo']?>" alt="Image" width="100px" height="100px" >
                      </div>
            </div>
  
          <div class="input-box">
  
              <label>Update College Logo</label>
  
              <div class="logo">
  
              <input type="file" id="college_logo" name="college_logo" placeholder="Enter College Logo" required />
              <input type="hidden" name="old_college_logo" value="<?php echo $row['college_logo']?>">
  
              </div>
  
          </div>
          <div class="input-box">
              <input type="submit" name= "update" value="update">
              </div>
  
      
          </div>
        </form>
      </div>





     <div class="content">
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

      <form action="" class="form" method="post" enctype="multipart/form-data">

      <div class="user_details">
        <div class="input-box">

            <label>College Name</label>

            <input type="text" id="college_name" name= "college_name" placeholder="Enter College Name" value="<?php echo $row1['college_name']; ?>"  required  />

        </div>

        <div class="input-box">

            <label>College Address</label>

            <input type="text" id="college_address" name= "college_address" placeholder="Enter College Address" value="<?php echo $row1['college_address']; ?>"  required  />

        </div>
        <div class="input-box">
            <input type="submit" name= "update_d" value="update">
            </div>

    
        </div>
      </form>
    </div>

    </div>
</div>
</section>

<Style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
.container {
position: relative;
max-width: 700px;
width: 100%;
background: #fff;
margin:80px;
margin-left: 300px;
padding: 25px;
border-radius: 8px;
box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container header {
font-size: 1.5rem;
color: #333;
font-weight: 500;
text-align: center;
}
.container .form {
margin-top: 30px;
}
.form .input-box {
width: 100%;
margin-top: 20px;
}
.input-box label {
color: #333;
}
.form :where(.input-box input, .select-box) {
position: relative;
height: 50px;
width: 100%;
outline: none;
font-size: 1rem;
color: #707070;
margin-top: 8px;
border: 1px solid #ddd;
border-radius: 6px;
padding: 0 15px;
}
.input-box input{
height: 45px;
width: 100%;
outline: none;
font-size: 16px;
border-radius: 5px;
padding-left: 15px;
border: 1px solid #ccc;
border-bottom-width: 2px;
transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
border-color: #2daff0;
}
.input-box .logo input{
height: 45px;
width: 100%;
outline: none;
font-size: 16px;
border-radius: 5px;
padding-top: 8px;
padding-left: 15px;
border: 1px solid #ccc;
border-bottom-width: 2px;
transition: all 0.3s ease;
}
.input-box .logo input:focus,
.input-box .logo input:valid{
border-color: #2daff0;
}
.form .column {
display: flex;
column-gap: 15px;
}
.form button {
height: 55px;
width: 100%;
color: #fff;
font-size: 1rem;
font-weight: 400;
margin-top: 30px;
border: none;
cursor: pointer;
transition: all 0.2s ease;
background: #22203c;;
}
.form button:hover {
background: #11101d;
}
/*Responsive*/
@media screen and (max-width: 500px) {
.form .column {
flex-wrap: wrap;
}
}
</Style>
  </body>
</html>
